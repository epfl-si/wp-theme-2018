<?php
/**
 * Manage the markup of the media gallery in the content, depending of the WP version, as there
 * as been some changes https://make.wordpress.org/core/2021/08/20/gallery-block-refactor-dev-note/
 *
 * @package epfl
 */

/**
 * We work with an array of images info, $id being the key
 *
 * @param $id current id we are working one
 * @param $caption add the provided caption, if any
 * @param $alt_text use it if provided, or fetch default saved in media galleries
 * @return dictionnary of the image infos
 */
function build_images_info($id, $caption, $alt_text) {
    $image_info= [
        'id' => $id,
        'image_src' => wp_get_attachment_image_src($id, 'large')[0] ?? '',
        'image_thumbnail' => wp_get_attachment_image_src($id, 'thumbnail_square_crop')[0] ?? '',
        'image_alt' => $alt_text ?? get_post_meta($id, '_wp_attachment_image_alt', TRUE ) ?? '',
    ];

    if (!empty($caption)) {
        $image_info['image_caption'] = $caption;
    } else {
        // look if the image as a caption directly linked to it, as a fallback
        $image_info['image_caption'] = get_post($id)->post_excerpt ?? '';
    }

    return $image_info;
}

/**
 * Here we do a little trick :
 * As $attr have the ids, but not the block settings (like custom captions or gallery caption), we have
 * to reverse the Wordpress built html found in $content to parse them
 * Trick found on https://wordpress.stackexchange.com/questions/317576/gutenberg-get-all-attributes-from-core-image-block
 */
function merge_info_from_attr_and_content($attr, $content) {
    // fetch dom's $content
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $dom->preserveWhiteSpace = false;
    $dom->loadHtml(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));

    $errors = libxml_get_errors();  // in case for the #oneday we may need to manage $error, so here it is
    # close the errors, or it will spread on other libxml components
    libxml_clear_errors();

    # build a keyed dict, so we can easily find values next
    $data_from_content = [];

    foreach ($dom->getElementsByTagName('li') as $li_gallery_item) {
        $id = $li_gallery_item->getElementsByTagName('img')[0]->getAttribute('data-id');
        if(!empty($id)) {  # get the id as key, or nothing
            $figcaption_element = $li_gallery_item->getElementsByTagName('figcaption')[0];

            if (isset($figcaption_element)) {
                $image_caption = "";
                foreach ($figcaption_element->childNodes as $childNode) {
                    $image_caption .= $dom->saveHTML($childNode);
                }

                $data_from_content[$id] = array(
                    'image_caption' => $image_caption
                );
            }
        }
    }

    $images_info = [];

    foreach($attr['ids'] as $post_id) {
        # image_caption, get the custom from gallery if any, or the default from media gallery
        $caption = $data_from_content[$post_id]['image_caption'] ?? null;
        $images_info[] = build_images_info($post_id, $caption, null);
    }

    return $images_info;
}

/**
 * Render the gallery, in compatibility with the Elements design
 *
 * @param array  $images_info the images, having an id, image_src, image_thumbnail, image_alt, image_caption
 * @param array  $md5_hash an unique md5
 */
function render_gallery_from_images_info($images_info, $md5_hash) {
    $output = '<div id="my-gallery-' . $md5_hash . '" class="gallery gallery-main mt-4">';

    /* We go through given image order */
    foreach($images_info as $image_info)
    {
        $output .= '<figure class="gallery-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
        $output .= '<div class="gallery-item-inner">';
        $output .= '<div class="img-wrapper">';
        $output .= '<img src="'.$image_info['image_src'].'" alt="'.$image_info['image_alt'].'" class="img-fluid">';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '<figcaption><span>' . $image_info['image_caption'] ?? '' . '</span></figcaption>';
        $output .= '</figure>';
    }

    $output .= "</div>";

    /* Navigation with thumbnails */
    $output .= '<div class="gallery-nav mb-3" data-gallery="my-gallery-'.$md5_hash.'" aria-hidden="true">';

    /* We go through given image order */
    foreach($images_info as $image_info)
    {
        $output .= '<figure class="gallery-nav-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
        $output .= '<img src="'.$image_info['image_thumbnail'].'" alt="'.$image_info['image_alt'].'" class="img-fluid">';
        $output .= '<figcaption><span>' . $image_info['image_caption'] ?? '' . '</span></figcaption>';
        $output .= '</figure>';
    }

    $output .= "</div>";

    return $output;
}

function epfl_gallery_block($attr, $content) {
    /* If a gallery block is added but never configured, this function will be called with $attr equal to an empty array...
        so there are PHP Warnings in the logs because we are trying to access 'ids' key. */
    if(!array_key_exists('ids', $attr)) return '';

    $images_info = merge_info_from_attr_and_content($attr, $content);

    // make it uniq for attribute id
    if (array_key_exists('ids', $attr)) {
        $md5_hash=md5(implode(',', $attr['ids']) . rand());
    } else {
        $md5_hash=md5(rand());
    }

    return render_gallery_from_images_info($images_info, $md5_hash);
}

function register_epfl_gallery_wp_lt_5_9() {
    global $wp_version;

    if (version_compare($wp_version, '5.9', '<')) {
        $block_type_registry = WP_Block_Type_Registry::get_instance();
        if ($block_type_registry->is_registered('core/gallery')) {
            $block_type_registry->unregister('core/gallery');
        }
        register_block_type('core/gallery', array(
            'render_callback' => 'epfl_gallery_block',
        ));
    }
}

add_action( 'init', 'register_epfl_gallery_wp_lt_5_9' );  // For WP <5.9

function epfl_gallery_block_gte_5_9($block_content, $block, $instance) {
    global $wp_version;

    if (version_compare($wp_version, '5.9', '>=')) {
        $images_info = [];  // take all image infos needed

        // do we have innerBlocks or some IDS in the attribute ?
        // innerBlocks -> new way of show galleries
        // IDS in the attribute -> old way, that need a conversion (aka "edit the page", click on "Attempt to fix the block"
        if (!empty($block["innerBlocks"])) {
            foreach ($block["innerBlocks"] as $core_image) {
                $id = $core_image["attrs"]["data-id"] ?? null;
                if (!empty($id)) {
                    $caption = null;
                    $alt_text = null;
                    preg_match('/<figcaption[^>]*>(.*)<\/figcaption>/', $core_image['innerHTML'], $caption);
                    preg_match('/<img .*? alt="([^"]*)".*?\>/', $core_image['innerHTML'], $alt_text);

                    $images_info[] = build_images_info($id, $caption[1] ?? null, $alt_text[1] ?? null );
                }
            }
        } else if (!empty($instance->parsed_block['attrs'])) {
            $images_info = merge_info_from_attr_and_content($instance->parsed_block['attrs'], $block["innerContent"]);
        }

        $ids = array_column($images_info, 'id');

        if (!empty($ids)) {  // take all ids, make it a hash
            $md5_hash = md5(implode(',', $ids) . rand());
        } else {
            $md5_hash=md5(rand());
        }

        return render_gallery_from_images_info($images_info, $md5_hash);
    } else {
        return $block_content;
    }
}

add_filter('render_block_core/gallery', 'epfl_gallery_block_gte_5_9', 10, 3); // For WP >=5.9
