<?php
/**
 * Manage the markup of the media gallery in the content
 *
 * @package epfl
 */

function epfl_gallery_block($attr) {

    /* If a gallery block is added but never configured, this function will be called with $attr equal to an empty array...
        so there are PHP Warnings in the logs because we are trying to access 'ids' key. */
    if(!array_key_exists('ids', $attr)) return '';

    $output = '';
    $instance=md5(implode(',', $attr) . rand());

    /* We recover posts info but... not in the same order as the one given in parameters ($attr['ids'])*/
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    $output = '<div id="my-gallery-' . $instance . '" class="gallery gallery-main mt-4">';

    /* We go through given image order */
    foreach($attr['ids'] as $post_id)
    {
        /* We now look for returned matching image and add it to display */
        foreach($posts as $imagePost)
        {
            /* If the image matches */
            if($imagePost->ID == $post_id)
            {
                $image_src = wp_get_attachment_image_src($imagePost->ID, 'large')[0];
                $image_caption = wp_get_attachment_caption($imagePost->ID);
                $image_alt = get_post_meta($imagePost->ID , '_wp_attachment_image_alt', true);

                $output .= '<figure class="gallery-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
                $output .= '<div class="gallery-item-inner">';
                $output .= '<img src="'.$image_src.'" alt="'.$image_alt.'" class="img-fluid">';

                if ($image_caption)
                {
                    $output .= '<figcaption><span>'.$image_caption.'</span></figcaption>';
                }

                $output .= '</div>';
                $output .= '</figure>';

                /* To avoid looping through remaining images for nothing */
                break;
            }
        }
    }

    $output .= "</div>";

    $output .= '<div class="gallery-nav mb-3" data-gallery="my-gallery-'.$instance.'" aria-hidden="true">';

    /* We go through given image order */
    foreach($attr['ids'] as $post_id)
    {
        /* We now look for returned matching image and add it to display */
        foreach($posts as $imagePost)
        {
            /* If the image matches */
            if($imagePost->ID == $post_id)
            {
                $image_src = wp_get_attachment_image_src($imagePost->ID, 'thumbnail')[0];
                $image_caption = wp_get_attachment_caption($imagePost->ID);
                $image_alt = get_post_meta($imagePost->ID , '_wp_attachment_image_alt', true);

                $output .= '<figure class="gallery-nav-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
                $output .= '<img src="'.$image_src.'" alt="'.$image_alt.'" class="img-fluid">';
                if ($image_caption)
                {
                    $output .= '<figcaption><span>'.$image_caption.'</span></figcaption>';
                }
                $output .= '</figure>';

                /* To avoid looping through remaining images for nothing */
                break;
            }
        }
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
?>
