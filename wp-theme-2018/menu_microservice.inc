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

		$menu_api_host = "menu-api";
		$menu_api_host_from_env = getenv('MENU_API_HOST');
		if ($menu_api_host_from_env !== false && $menu_api_host_from_env !== '') {
			$menu_api_host = $menu_api_host_from_env;
		}
    $url_api = 'http://' . $menu_api_host . ':3001/menus/' . $call_type . '/?lang=' . $lang
    . '&url=' . trailingslashit( $url_site ) . '&pageType=' . get_post_type() .
    ($main_post_page == 0 ? '' : ($main_post_page_name == '' ? '' : '&mainPostPageName=' . $main_post_page_name)) .
    ($main_post_page == 0 ? '' : ($main_post_page_url == '' ? '' : '&mainPostPageUrl=' . $main_post_page_url)) .
    '&postName=' . urlencode(get_the_title()) .
    '&homePageUrl=' . $home_page_url;

    $curl = curl_init($url_api);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        $error_text = curl_error($curl);
    }
    curl_close($curl);

    if (isset($error_text)) {
        error_log( "curl error: {$error_text} at {$url_api}" );
        return [];
    } elseif ($response === false) {
        error_log( 'Failed to retrieve data from the API.' );
        return [];
    } else {
        return json_decode($response, true);
    }
}

class CurrentSite {
    public $current_lang;
    public $home_page_url;
    public $current_url;

    public function __construct($post) {
        $this->current_lang = $this->_get_current_language();
        $this->current_url = $this->_get_current_url($post);
        $this->home_page_url = $this->_get_homepage();
    }

    private function _get_base_homepage() {
        $home_page_url = home_url();
        if (!str_ends_with($home_page_url, '/')) {
            $home_page_url = $home_page_url . '/';
        }
        return $home_page_url;
    }

    private function _get_current_language() {
        if (function_exists('pll_current_language')) {
            return pll_current_language();
        } else {
            return get_current_language();
        }
    }

    private function _get_current_url($post) {
        $home_page_url = $this->_get_base_homepage();
        $protocol = is_ssl() ? 'https://' : 'http://';
        $current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $index_of_query_string = strpos($current_url, '?');
        if ($index_of_query_string) {
            $current_url = substr($current_url, 0, $index_of_query_string);
        }
        if ((($home_page_url == $current_url) || ($home_page_url . $this->current_lang . '/') == $current_url) && !is_category()) {
            if (!str_contains($current_url, '/' . $this->current_lang . '/')) {
                $current_url = $current_url . $this->current_lang . '/';
            }
            if (isset($post) && $post->post_name !== null && !str_ends_with($current_url, $post->post_name . '/')) {
                $current_url = $current_url . $post->post_name . '/';
            }
        }
        return $current_url;
    }

    private function _get_homepage() {
        $home_page_url = $this->_get_base_homepage();
        if (!str_contains($home_page_url, '/' . $this->current_lang . '/')) {
            $home_page_url = $home_page_url . $this->current_lang . '/';
        } else {
            $language_information = '/' . $this->current_lang . '/';
            $home_page_url = substr($home_page_url, 0, strpos($home_page_url, $language_information) + strlen($language_information));
        }
        return $home_page_url;
    }

}
