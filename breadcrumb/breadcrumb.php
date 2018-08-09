<?php

require_once(__DIR__.'/breadcrumb_item.php');

// Breadcrumb
function generate_breadcrumb()
{

    // Settings
    $breadcrums_id    = '';
    $breadcrums_class = 'breadcrumb';
    $home_title       = '';
    
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy = '';
    
    // Get the query & post information
    global $post, $wp_query;

    // always display container to display grey bar
    echo '<nav aria-label="breadcrumb" class="breadcrumb-wrapper" id="breadcrumb-wrapper">';

    // Do not display breadcrumbs on the homepage or when no parent
    if (
        !is_front_page()
        && !is_home()
        && sizeof(get_post_ancestors($post->ID)) > 0
        ) {

        // Build the breadcrums
        echo '<ol id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
        
        // Home page
        echo '
        <li class="breadcrumb-item">
            <a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '"><svg class="icon"><use xlink:href="#icon-home"></use></svg>' . $home_title . '</a>
        </li>
        ';

        // Handle tags
        $tag = '
            <li class="breadcrumb-item breadcrumb-tags-wrapper">
                <a href="#" class="tag tag-primary">Tag</a>
            </li>
        ';
        
        if (is_archive() && !is_tax() && !is_category() && !is_tag()) {
            
            echo '<li class="breadcrumb-item"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
            
        } else if (is_archive() && is_tax() && !is_category() && !is_tag()) {
            
            // If post is a custom post type
            $post_type = get_post_type();
            
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
            
        } else if (is_single()) {
            
            // Get post category info
            $category = get_the_category();
            
            if (!empty($category)) {
                
                // Get last category post is in
                $last_category = end(array_values($category));
                
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
                $cat_parents     = explode(',', $get_cat_parents);
                
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach ($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">' . $parents . '</li>';
                }
                
            }
            
            // Check if the post is in a category
            if (!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                
            } else {
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            }
            
        } else if (is_category()) {
            
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
            
        } else if (is_page()) {
            
            // Standard page
            if ($post->post_parent) {
                
                // If child page, get parents 
                $anc = get_post_ancestors($post->ID);
                
                // Get parents in the right order
                $anc = array_reverse($anc);
                
                // Parent page loop
                if (!isset($parents))
                    $parents = null;
                foreach ($anc as $ancestor) {
                    renderBreadcrumbItem(get_the_title($ancestor), get_permalink($ancestor), false, false);
                }
                
                // Display parent pages
                echo $parents;
                
                // Current page
                renderBreadcrumbItem(get_the_title(), false, true, false);
                
            } else {
                
                // Just display current page if not parents
                renderBreadcrumbItem(get_the_title(), false, true, false);
                
            }
            
        } else if (is_tag()) {
            
            // Tag page
            
            // Get tag information
            $term_id       = get_query_var('tag_id');
            $taxonomy      = 'post_tag';
            $args          = 'include=' . $term_id;
            $terms         = get_terms($taxonomy, $args);
            $get_term_id   = $terms[0]->term_id;
            $get_term_slug = $terms[0]->slug;
            $get_term_name = $terms[0]->name;
            
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
            
        } elseif (is_day()) {
            
            // Day archive
            
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
            
        } else if (is_month()) {
            
            // Month Archive
            
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
            
        } else if (is_year()) {
            
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
            
        } else if (get_query_var('paged')) {
            
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">' . __('Page') . ' ' . get_query_var('paged') . '</strong></li>';
            
        } else if (is_search()) {
            
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
            
        } elseif (is_404()) {
            
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
        echo '</ol>';
    }
    echo '</nav>';
}