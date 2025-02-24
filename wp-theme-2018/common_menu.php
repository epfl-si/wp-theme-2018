<?php

function call_menu_api_microservice($home_page_url, $url_site, $lang, $call_type)
{
    $main_post_page = get_option('page_for_posts');
    if (! function_exists("pll_get_post")) {
        # Menus and siblings require Polylang.
        return [];
    }
    $current_language_page_id = pll_get_post($main_post_page, $lang);
    $main_post_page_name = urlencode(get_the_title($current_language_page_id));
    $main_post_page_url = get_permalink($current_language_page_id);

    $urlApi = 'http://' . (getenv('MENU_API_HOST') ?? "menu-api") . ':3001/menus/' . $call_type . '/?lang=' . $lang
    . '&url=' . trailingslashit( $url_site ) . '&pageType=' . get_post_type() .
    ($main_post_page == 0 ? '' : ($main_post_page_name == '' ? '' : '&mainPostPageName=' . $main_post_page_name)) .
    ($main_post_page == 0 ? '' : ($main_post_page_url == '' ? '' : '&mainPostPageUrl=' . $main_post_page_url)) .
    '&postName=' . urlencode(get_the_title()) .
    '&homePageUrl=' . $home_page_url;

    $curl = curl_init($urlApi);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        $error_text = curl_error($curl);
    }
    curl_close($curl);

    if (isset($error_text)) {
        error_log( "curl error: {$error_text} at {$urlApi}" );
        return '';
    } elseif ($response === false) {
        error_log( 'Failed to retrieve data from the API.' );
        return '';
    } else {
        return $response;
    }
}

function get_current_url_and_homepage() {
    if (function_exists('pll_current_language')) {
        $current_lang = pll_current_language();
    } else {
        $current_lang = get_current_language();
    }
    $home_page_url = home_url();
    if (!str_ends_with($home_page_url, '/')) {
        $home_page_url = $home_page_url . '/';
    }
    $protocol = is_ssl() ? 'https://' : 'http://';
    $current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    $index_of_query_string = strpos($current_url, '?');
    if ($index_of_query_string) {
        $current_url = substr($current_url, 0, $index_of_query_string);
    }
    if ((($home_page_url == $current_url) || ($home_page_url . $current_lang . '/') == $current_url) && !is_category()) {
        if (!str_contains($current_url, '/' . $current_lang . '/')) {
            $current_url = $current_url . $current_lang . '/';
        }
        if (isset($post) && $post->post_name !== null && !str_ends_with($current_url, $post->post_name . '/')) {
            $current_url = $current_url . $post->post_name . '/';
        }
    }
    if (!str_contains($home_page_url, '/' . $current_lang . '/')) {
        $home_page_url = $home_page_url . $current_lang . '/';
    } else {
        $language_information = '/' . $current_lang . '/';
        $home_page_url = substr($home_page_url, 0, strpos($home_page_url, $language_information) + strlen($language_information));
    }
		return array(
			"home_page_url" => $home_page_url,
			"current_url" => $current_url,
			"current_lang" => $current_lang
		);
}
