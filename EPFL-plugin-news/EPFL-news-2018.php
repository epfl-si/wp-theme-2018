<?php
/**
 * Plugin Name: EPFL News shortcode
 * Description: provides a shortcode to display news feed
 * @version: 1.0
 * @copyright: Copyright (c) 2017 Ecole Polytechnique Federale de Lausanne, Switzerland
 */

declare(strict_types=1);

require_once('EPFL-news-utils.php');

define("NEWS_API_URL", "https://actu.epfl.ch/api/v1/channels/");
define("NEWS_API_URL_IFRAME", "https://actu.epfl.ch/webservice_iframe/");

/**
 * Returns the number of news according to the template
 * @param $template: id of template
 * @return the number of news to display
 */
function epfl_news_get_limit(string $template): int
{
    switch ($template):
        case "1":
        case "7":
            $limit = 1;
            break;
        case "3":
            $limit = 4;
            break;
        case "2":
        case "4":
        case "6":
            $limit = 3;
            break;
        case "8":
            $limit = 5;
            break;
        default:
            $limit = 3;
    endswitch;
    return $limit;
}

/**
 * Build api URL of news
 *
 * @param $channel: id of news channel
 * @param $template: id of template
 * @param $lang: lang of news
 * @param $category: id of news category
 * @param $themes: The list of news themes id. For example: 1,2,5
 * @return the api URL of news
 */
function epfl_news_build_api_url(
    string $channel,
    string $template,
    string $lang,
    string $category,
    string $themes
    ): string
{
    // returns the number of news according to the template
    $limit = epfl_news_get_limit($template);

    // define API URL
    $url = NEWS_API_URL . $channel . '/news/?format=json&lang=' . $lang . '&limit=' . $limit;

    // filter by category
    if ($category !== '') {
        $url .= '&category=' . $category;
    }

    // filter by themes
    if ($themes !== '') {
        $themes = explode(',', $themes);
        foreach ($themes as $theme) {
            $url .= '&themes=' . $theme;
        }
    }
    return $url;
}

/**
 * Check the required parameters
 *
 * @param $channel: id of channel
 * @param $lang: lang of news (fr or en)
 * @return True if the required parameters are right.
 */
function epfl_news_check_required_parameters(string $channel, string $lang): bool {

    // check lang
    if ($lang !==  "fr" && $lang !== "en" ) {
        return FALSE;
    }

    // check channel
    if ($channel === "") {
        return FALSE;
    }

    // check that the channel exists
    $url = NEWS_API_URL . $channel;
    $channel_response = NewsUtils::get_items($url);
    if ($channel_response->detail === "Not found.") {
        return FALSE;
    }
    return TRUE;

}

/**
 * Main function of shortcode
 *
 * @param $atts: attributes of the shortcode
 * @param $content: the content of the shortcode. Always empty in our case.
 * @param $tag: the name of shortcode. epfl_news in our case.
 */
function epfl_news_process_shortcode(
    array $atts,
    string $content = '',
    string $tag
    ): string {

        // extract shortcode paramepfl_newseter
        $atts = extract(shortcode_atts(array(
                'channel'  => '',
                'lang'     => '',
                'template' => '',
                'stickers' => '',
                'category' => '',
                'themes'   => '',
        ), $atts, $tag));

        $url = epfl_news_build_api_url(
            $channel,
            $template,
            $lang,
            $category,
            $themes
        );

        $actus = NewsUtils::get_items($url);
        //NewsUtils::debug($actus->results);

        ob_start();
        do_action('epfl_shortcode_news', $actus->results);
        //return the result of output buffering to display shortcode correctly
        return ob_get_clean();

}

add_action( 'init', function() {

    // define the shortcode
    add_shortcode('epfl_news_2018', 'epfl_news_process_shortcode');

    if ( function_exists( 'shortcode_ui_register_for_shortcode' ) ) :

        // FIXME: How get all channels without bad tips ?limit=500
        $url = "https://actu.epfl.ch/api/v1/channels/?limit=500";
        $channel_response = NewsUtils::get_items($url);

        $channel_options = array();
        foreach ($channel_response->results as $item) {
            $option = array(
                'value' => strval($item->id),
                'label' => esc_html__($item->name, 'epfl_infoscience_shortcode', 'epfl_infoscience_shortcode')
            );
            array_push($channel_options, $option);
        }

        $lang_options = array(
            array('value' => 'en', 'label' => esc_html__('English', 'epfl_infoscience_shortcode', 'epfl_infoscience_shortcode')),
            array('value' => 'fr', 'label' => esc_html__('Français', 'epfl_infoscience_shortcode', 'epfl_infoscience_shortcode')),
        );

        $template_options = array (
            array('value' => '1', 'label' => esc_html__('Template portal image top', 'epfl_infoscience_shortcode', 'epfl_infoscience_shortcode')),
            array('value' => '2', 'label' => esc_html__('Template text only', 'epfl_infoscience_shortcode', 'epfl_infoscience_shortcode')),
            array('value' => '3', 'label' => esc_html__('Template faculty with 4 news', 'epfl_infoscience_shortcode', 'epfl_infoscience_shortcode')),
            array('value' => '4', 'label' => esc_html__('Template labo with 3 news', 'epfl_infoscience_shortcode', 'epfl_infoscience_shortcode')),
            array('value' => '6', 'label' => esc_html__('Template faculty with 3 news', 'epfl_infoscience_shortcode', 'epfl_infoscience_shortcode')),
            array('value' => '7', 'label' => esc_html__('Template portal image left', 'epfl_infoscience_shortcode', 'epfl_infoscience_shortcode')),
            array('value' => '8', 'label' => esc_html__('Template labo with 5 news', 'epfl_infoscience_shortcode', 'epfl_infoscience_shortcode')),
            array('value' => '10', 'label' => esc_html__('Template all news with pagination', 'epfl_infoscience_shortcode', 'epfl_infoscience_shortcode')),
        );

        shortcode_ui_register_for_shortcode(

            'epfl_news_2018',

            array(
                'label' => 'Add News shortcode',
                'listItemImage' => 'dashicons-book',
                'attrs'         => array(
                        array(
                            'label'         => 'Channel name',
                            'attr'          => 'channel',
                            'type'          => 'select',
                            'options'       => $channel_options,
                            'description'   => "The channel of news",
                        ),
                        array(
                            'label'         => 'Template name',
                            'attr'          => 'template',
                            'type'          => 'select',
                            'options'       => $template_options,
                            'description'   => "The template",
                        ),
                        array(
                            'label'         => 'Language',
                            'attr'          => 'lang',
                            'type'          => 'select',
                            'options'       => $lang_options,
                            'description'   => 'The language used to render news results',
                        ),
                    ),

                'post_type'     => array( 'post', 'page' ),
            )
        );

    endif;

} );

?>
