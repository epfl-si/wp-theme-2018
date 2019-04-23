<?php
require_once(__DIR__.'/renderers/publications.php');

/*
 * Generic Render
 * $params : $publications is a two level array, in a fixed format. If label is empty, don't show any header
 *                      format :
                            $publications['group_by'] = [
                                        ['label' => null, # or string
                                        'values' => [
                                            'label' => null, # or string
                                            'values' => $array_of_publications,
                                        ],
                                        ];
 */
Class Infoscience2018Render {
    protected static function render_url($url) {
        return '<div style="border:2px solid black;padding:8px;word-wrap: break-word;">' . $url . '</div>' ;
    }

    protected static function pre_render() {
        return '<div class="list-group my-3">';
    }

    public static function render($publications, $url='', $format="", $summary=false, $thumbnail=false, $debug=false) {
        $html_rendered = self::pre_render();
        
        $html_rendered .= "";

        $html_rendered .= self::post_render();

        return $html_rendered;
    }

    protected static function post_render() {
        return "</div>";
    }
}

Class ClassesInfoscience2018Render extends Infoscience2018Render {
    protected static function render_header_1($value) {
        $translated_value = esc_html__($value, 'epfl-infoscience-search');
        return '<h1 class="h2 mt-3">'. $translated_value . '</h1>';
    }

    protected static function render_header_2($value) {
        $translated_value = esc_html__($value, 'epfl-infoscience-search');
        return '<h2 class="h3 mt-1 mb-2">'. $translated_value . '</h2>';
    }


    public static function render($publications, $url='', $format="short", $summary=false, $thumbnail=false, $debug=false) {
        $html_rendered = "";
        if ($debug) {
            $html_rendered .= self::render_url($url);
        }

        $html_rendered .= self::pre_render();

        foreach($publications['group_by'] as $grouped_by_publications) {
            if ($grouped_by_publications['label']) {
                $html_rendered .= self::render_header_1($grouped_by_publications['label']);
            }

            foreach($grouped_by_publications['values'] as $grouped_by2_publications) {
                if ($grouped_by2_publications['label'] && !$grouped_by_publications['label']) {
                    $html_rendered .= self::render_header_1($grouped_by2_publications['label']);
                } else {
                    $html_rendered .= self::render_header_2($grouped_by2_publications['label']);
                }
                
                foreach($grouped_by2_publications['values'] as $index3 => $publication) {
                    $record_renderer_class = get_render_class_for_publication_2018($publication, $format);

                    if ($debug) {
                        $html_rendered .= '<h3>'. $record_renderer_class .' - ' . $publication['doctype'][0] . '</h3>';
                    }

                    $html_rendered .= $record_renderer_class::render_publication($publication, $format, $summary, $thumbnail);
                }
            }
        }

        $html_rendered .= self::post_render();

        return $html_rendered;
    }
}
?>
