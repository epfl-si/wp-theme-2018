<?php
/**
 * Manage the markup of the media gallery in the content
 *
 * @package epfl
 */

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

    # build a keyed dict, so we can easily find values next
    $data_from_content = [];

    foreach ($dom->getElementsByTagName('li') as $li_gallery_item) {
        $id = $li_gallery_item->getElementsByTagName('img')[0]->getAttribute('data-id');
        if(!empty($id)) {  # get the id as key, or nothing
            $figcaption_element = $li_gallery_item->getElementsByTagName('figcaption')[0];

            $image_caption = "";
            foreach($figcaption_element->childNodes as $childNode) {
                $image_caption .= $dom->saveHTML($childNode);
            }

            $data_from_content[$id] = array (
                'image_caption' => $image_caption
            );
        }
    }

    $images_info = [];

    foreach($attr['ids'] as $post_id) {
        $image_info = array (
            'id' => $post_id,
            'image_src' => wp_get_attachment_image_src($post_id, 'large')[0],
            'image_thumbnail' => wp_get_attachment_image_src($post_id, 'thumbnail')[0],
            'image_alt' => get_post_meta($post_id, '_wp_attachment_image_alt', TRUE )
        );

        # image_caption, get the custom from gallery if any, or the default from media gallery
        if (array_key_exists($post_id, $data_from_content) && isset($data_from_content[$post_id]['image_caption'])) {
            $image_info['image_caption'] = $data_from_content[$post_id]['image_caption'];
        }

        $images_info[] = $image_info;
    }

    return $images_info;
}

function epfl_gallery_block($attr, $content) {
    /* If a gallery block is added but never configured, this function will be called with $attr equal to an empty array...
        so there are PHP Warnings in the logs because we are trying to access 'ids' key. */
    if(!array_key_exists('ids', $attr)) return '';

    $images_info = merge_info_from_attr_and_content($attr, $content);

    $instance=md5(implode(',', $attr) . rand());  // make it uniq for attribute id

    $output = '<div id="my-gallery-' . $instance . '" class="gallery gallery-main mt-4">';

    /* We go through given image order */
    foreach($images_info as $image_info)
    {
        $output .= '<figure class="gallery-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
        $output .= '<div class="gallery-item-inner">';
        $output .= '<div class="img-wrapper">';
        $output .= '<img src="'.$image_info['image_src'].'" alt="'.$image_info['image_alt'].'" class="img-fluid">';
        $output .= '</div>';
        $output .= '</div>';

        if (!isset($image_info['image_caption'])) {
            $image_info['image_caption'] = '';  // should exist, as it is needed by the gallery counter
        }
        $output .= '<figcaption><span>' . $image_info['image_caption'] . '</span></figcaption>';
        $output .= '</figure>';
    }

    $output .= "</div>";

    /* Navigation with thumbnails */
    $output .= '<div class="gallery-nav mb-3" data-gallery="my-gallery-'.$instance.'" aria-hidden="true">';

    /* We go through given image order */
    foreach($images_info as $image_info)
    {
        $output .= '<figure class="gallery-nav-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
        $output .= '<img src="'.$image_info['image_thumbnail'].'" alt="'.$image_info['image_alt'].'" class="img-fluid">';

        if (!isset($image_info['image_caption'])) {
            $image_info['image_caption'] = '';  // should exist, as it is needed by the gallery counter
        }
        $output .= '<figcaption><span>' . $image_info['image_caption'] . '</span></figcaption>';
        $output .= '</figure>';
    }

    $output .= "</div>";

    return $output;
}

function register_epfl_gallery() {
    register_block_type( 'core/gallery', array(
        'render_callback' => 'epfl_gallery_block',
    ));
}

add_action( 'init', 'register_epfl_gallery' );
