<?php
require_once(__DIR__.'/fields.php');

# mainly used to sanitize external values when we convert to class name
define('DOCTYPE_TO_CLASS_NAME_MAPPING', [
    'BOOK CHAPTERS' => 'BookChapters',
    'BOOKS' => 'Books',
    'CONFERENCE PAPERS' => 'ConferencePapers',
    'CONFERENCE PROCEEDINGS' => 'ConferenceProceedings',
    'JOURNAL ARTICLES' => 'JournalArticles',
    'REVIEWS' => 'JournalArticles',
    'PATENTS' => 'Patents',
    'POSTERS' => 'Posters',
    'REPORTS' => 'Reports',
    'STUDENT PROJECTS' => 'StudentProjects',
    'TALKS' => 'Talks',
    'THESES' => 'Theses',
    'WORKING PAPERS' => 'WorkingPapers',
]);

function get_render_class_for_publication_2018($publication, $format) {
    # by default, use one of this
    if ($format === "detailed") {
        $record_renderer_class_base = 'DetailedInfosciencePublication2018Render';
    } else {
        $record_renderer_class_base = 'ShortInfosciencePublication2018Render';
    }

    if (InfoscienceFieldRender::field_exists($publication['doctype'])) {
        # doctype determine the render, find it in the map
        $doctype_to_find = strtoupper($publication['doctype'][0]);

        if (array_key_exists($doctype_to_find, DOCTYPE_TO_CLASS_NAME_MAPPING)) {

            $record_renderer_class = DOCTYPE_TO_CLASS_NAME_MAPPING[$doctype_to_find] . $record_renderer_class_base;

            if (class_exists($record_renderer_class)) {
                return $record_renderer_class;
            }
        }
    }

    return $record_renderer_class_base;
}

/*
* Publication
*/
abstract Class InfosciencePublication2018Render {
    protected static $format="short";

    protected static function get_content($publication, $format, $summary) {
        return PublicationDateInfoscienceField2018Render::render($publication, static::$format);
    }

    public static function render($publication, $format, $summary) {
        $html_rendered = AuthorInfoscienceField2018Render::render($publication, $format, NULL, 'author');

        if ($summary) {
            $html_rendered .= SummaryInfoscienceField2018Render::render($publication, self::$format, false);
        }

        $html_rendered .= static::get_content($publication, $format, $summary);
        return $html_rendered;
    }

    public static function render_publication($publication, $format, $summary, $thumbnail) {
        $html_rendered = '<div class="list-group-item list-group-item-publication">';
        $html_rendered .= '  <div class="row">';
        $html_rendered .= '    <div class="col-md-10">';

        if ($thumbnail) {
            $html_rendered .= self::render_thumbnail($publication);
        }

        $html_rendered .= TitleInfoscienceField2018Render::render($publication, $format);
        $html_rendered .= static::render($publication, $format, $summary);
        $html_rendered .= "    </div>";
        $html_rendered .= self::render_links($publication);
        $html_rendered .= "  </div>";
        $html_rendered .= "</div>";

        return $html_rendered;
    }

    protected static function render_thumbnail($publication) {
        if (isset($publication['url']) &&
            isset($publication['url']['icon']) &&
            $publication['url']['icon'][0]) {
            return '      <a href="'. $publication['url']['icon'][0] .'"  target="_blank"><img style="max-width:80px;" src="' . $publication['url']['icon'][0] . '" class="float-left mr-3 infoscience_publication_illustration" alt="publication thumbnail"></a>';
        } else {
            return '';
        }
    }

    protected static function render_links($publication) {
        $links_html = '<div class="col-md-2 text-right mt-4 mt-md-0">';
        $links_html .= '  <p>';
        $links_html .= '    <a href="//infoscience.epfl.ch/record/' . $publication['record_id'][0] . '" class="btn btn-secondary btn-sm" target="_blank">' . esc_html__('Detailed record', 'epfl') . '</a>';
        $links_html .= '  </p>';

        $fulltext = '';
        if (isset($publication['url']['fulltext']) && $publication['url']['fulltext'][0]) {
            $fulltext = $publication['url']['fulltext'][0];
        }

        $doi = '';
        if (isset($publication['doi']) && $publication['doi']) {
            $doi = $publication['doi'];
        }

        if ($fulltext || $doi) {
            $links_html .= '  <p class="text-muted small mb-0">';

            if ($fulltext) {
                $links_html .= '<a class="text-muted" href="' . $fulltext . '" target="_blank">' .  esc_html__('Full text', 'epfl') . '</a>';

                if ($doi) {
                    $links_html .= ' - ';
                }
            }

            if ($doi) {
                $links_html .= '<a class="text-muted" href="https://dx.doi.org/' . $doi[0] . '" target="_blank">' .  esc_html__('View at publisher', 'epfl') . '</a>';
            }

            $links_html .= '  </p>';
        }

        $links_html .= '</div>';
        return $links_html;
    }
}

Class DetailedInfosciencePublication2018Render extends InfosciencePublication2018Render {
    protected static $format="detailed";
}

Class ShortInfosciencePublication2018Render extends InfosciencePublication2018Render {
    protected static $format="short";
}

/*
* Doctypes specific render
*/

Class BookChaptersDetailedInfosciencePublication2018Render extends DetailedInfosciencePublication2018Render {
    public static function render($publication, $format, $summary) {
        $html_rendered = '<span class="text-muted small mb-0 infoscience_host">';

        $html_rendered .= AuthorInfoscienceField2018Render::render($publication, $format, NULL, 'author');


        $has_next = InfoscienceField2018Render::field_exists($publication['journal'], 'publisher') ||
            InfoscienceField2018Render::field_exists($publication['publication_location']) ||
            InfoscienceField2018Render::field_exists($publication['publication_institution']) ||
            InfoscienceField2018Render::field_exists($publication['publication_date']);

        $has_next = InfoscienceField2018Render::field_exists($publication['publication_location']) ||
            InfoscienceField2018Render::field_exists($publication['publication_institution']) ||
            InfoscienceField2018Render::field_exists($publication['publication_date']);

        if ($summary) {
            $html_rendered .= SummaryInfoscienceField2018Render::render($publication, self::$format, false);
        }

        $html_rendered .= JournalPublisherInfoscienceField2018Render::render($publication, 'short', $has_next);
        $html_rendered .= BooksChaptersPublicationLocationInsitutionDateInfoscienceField2018Render::render($publication, 'short');
        $html_rendered .= JournalPageInfoscienceField2018Render::render($publication, 'short');
        $html_rendered .= '</span>';
        $html_rendered .= ISBNInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= DOIInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class BookChaptersShortInfosciencePublication2018Render extends ShortInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $has_next = InfoscienceField2018Render::field_exists($publication['journal'], 'publisher') ||
            InfoscienceField2018Render::field_exists($publication['publication_location']) ||
            InfoscienceField2018Render::field_exists($publication['publication_institution']) ||
            InfoscienceField2018Render::field_exists($publication['publication_date']);

        $has_next = InfoscienceField2018Render::field_exists($publication['publication_location']) ||
            InfoscienceField2018Render::field_exists($publication['publication_institution']) ||
            InfoscienceField2018Render::field_exists($publication['publication_date']);

        $html_rendered = '';
        $html_rendered .= JournalPublisherInfoscienceField2018Render::render($publication, self::$format, $has_next);

        $html_rendered .= BooksChaptersPublicationLocationInsitutionDateInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= JournalPageInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class BooksDetailedInfosciencePublication2018Render extends DetailedInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '<span class="text-muted small mb-0 infoscience_host">';
        $html_rendered .= BooksPublicationLocationInsitutionDateInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= '</span>';
        $html_rendered .= ISBNInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= DOIInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class BooksShortInfosciencePublication2018Render extends ShortInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $has_next = InfoscienceField2018Render::field_exists($publication['publication_location']) ||
                    InfoscienceField2018Render::field_exists($publication['publication_institution']);
        $html_rendered = '';
        $html_rendered .= BooksPublicationLocationInsitutionDateInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}


Class ConferencePapersDetailedInfosciencePublication2018Render extends DetailedInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '<span class="text-muted small mb-0 infoscience_host">';

        $html_rendered .= JournalPublisherInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, self::$format);

        $html_rendered .= ConferenceDataInfoscienceField2018Render::render($publication, self::$format);

        $html_rendered .= JournalPageInfoscienceField2018Render::render($publication, self::$format);

        $html_rendered .= '</span>';
        $html_rendered .= DOIInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class ConferencePapersShortInfosciencePublication2018Render extends ShortInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '';
        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, self::$format);
        if (InfoscienceField2018Render::field_exists($publication['publication_date'])) {
            $html_rendered .= '&nbsp;';
        }
        $html_rendered .= ConferenceDataInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= JournalPageInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= DOIInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class ConferenceProceedingsDetailedInfosciencePublication2018Render extends DetailedInfosciencePublication2018Render {
    public static function render($publication, $format, $summary) {
        $html_rendered = '';

        if (InfoscienceField2018Render::field_exists($publication['author_1'])) {
            $html_rendered .= AuthorInfoscienceField2018Render::render($publication, $format, NULL, 'author_1');
        } elseif (InfoscienceField2018Render::field_exists($publication['author_3'])) {
            $html_rendered .= AuthorInfoscienceField2018Render::render($publication, $format, NULL, 'author_3');
        }


        if ($summary) {
            $html_rendered .= SummaryInfoscienceField2018Render::render($publication, self::$format, false);
        }

        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, self::$format);

        $html_rendered .= '<span class="text-muted small mb-0 infoscience_host">';
        $html_rendered .= ConferenceDataInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= '</span>';

        return $html_rendered;
    }
}

Class ConferenceProceedingsShortInfosciencePublication2018Render extends ShortInfosciencePublication2018Render {
    public static function render($publication, $format, $summary) {
        $html_rendered = '';
        if (InfoscienceField2018Render::field_exists($publication['author_1'])) {
            $html_rendered .= AuthorInfoscienceField2018Render::render($publication, $format, NULL, 'author_1');
        } elseif (InfoscienceField2018Render::field_exists($publication['author_3'])) {
            $html_rendered .= AuthorInfoscienceField2018Render::render($publication, $format, NULL, 'author_3');
        }

        if ($summary) {
            $html_rendered .= SummaryInfoscienceField2018Render::render($publication, self::$format, false);
        }

        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, self::$format);

        if (InfoscienceField2018Render::field_exists($publication['publication_date'])) {
            $html_rendered .= '&nbsp;';
        }

        $html_rendered .= ConferenceProceedingsDataInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}


Class JournalArticlesDetailedInfosciencePublication2018Render extends DetailedInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '<span class="text-muted small mb-0 infoscience_host">';
        $html_rendered .= JournalPublisherInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= JournalDetailsInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= '</span>';
        $html_rendered .= DOIInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class JournalArticlesShortInfosciencePublication2018Render extends ShortInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '';
        $html_rendered .= JournalPublisherInfoscienceField2018Render::render($publication, self::$format);

        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, self::$format);

        if (InfoscienceField2018Render::field_exists($publication['publication_date'])) {
            $html_rendered .= '&nbsp;';
        }

        $html_rendered .= DOIInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class PatentsDetailedInfosciencePublication2018Render extends DetailedInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '';
        $html_rendered .= PatentsInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class PatentsShortInfosciencePublication2018Render extends ShortInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '';
        $html_rendered .= PatentsInfoscienceField2018Render::render($publication, self::$format);

        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= AuthorInfoscienceField2018Render::render($publication, self::$format, NULL, 'author');
        return $html_rendered;
    }
}

Class PostersDetailedInfosciencePublication2018Render extends DetailedInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '<p class="text-muted small mb-0 infoscience_host">';
        $html_rendered .= ConferenceDataInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= '</p>';

        return $html_rendered;
    }
}

Class PostersShortInfosciencePublication2018Render extends ShortInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '';
        $html_rendered .= ConferenceDataInfoscienceField2018Render::render($publication, self::$format);
        return $html_rendered;
    }
}

Class ReportsDetailedInfosciencePublication2018Render extends DetailedInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '<span class="text-muted small mb-0 infoscience_host">';
        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= PublicationPageInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= '</span>';

        $html_rendered .= ReportUrlInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class ReportsShortInfosciencePublication2018Render extends ShortInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '';
        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, 'detailed');
        $html_rendered .= ReportUrlInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class StudentProjectsDetailedInfosciencePublication2018Render extends DetailedInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '<span class="text-muted small mb-0 infoscience_host">';
        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= '</span>';

        return $html_rendered;
    }
}

Class StudentProjectsShortInfosciencePublication2018Render extends ShortInfosciencePublication2018Render {
    public static function get_content($publication, $format, $summary) {
        $html_rendered = '';
        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class TalksDetailedInfosciencePublication2018Render extends DetailedInfosciencePublication2018Render {
    public static function render($publication, $format, $summary) {
        return PostersDetailedInfosciencePublication2018Render::render($publication, $format, $summary);
    }
}

Class TalksShortInfosciencePublication2018Render extends ShortInfosciencePublication2018Render {
    public static function render($publication, $format, $summary) {
        return PostersShortInfosciencePublication2018Render::render($publication, $format, $summary);
    }
}

Class ThesesDetailedInfosciencePublication2018Render extends DetailedInfosciencePublication2018Render {
    public static function render($publication, $format, $summary) {
        $html_rendered = '';
        $html_rendered .= DirectorAuthorInfoscienceField2018Render::render($publication, self::$format, NULL, NULL);

        if ($summary) {
            $html_rendered .= SummaryInfoscienceField2018Render::render($publication, self::$format, false);
        }

        $host_rendered = '';
        $host_rendered .= BooksChaptersPublicationLocationInsitutionDateInfoscienceField2018Render::render($publication, self::$format);

        # not sure about the need of this one
        # $host_rendered .= PublicationPageInfoscienceField2018Render::render($publication, self::$format);

        if ($host_rendered && !empty($host_rendered)) {
            $html_rendered .= '<span class="text-muted small mb-0 infoscience_host">';
            $html_rendered .= $host_rendered;
            $html_rendered .= '</span>';
        }

        $html_rendered .= DOIInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class ThesesShortInfosciencePublication2018Render extends ShortInfosciencePublication2018Render {
    public static function render($publication, $format, $summary) {
        $html_rendered = '';
        $html_rendered .= DirectorAuthorInfoscienceField2018Render::render($publication, self::$format, NULL, NULL);

        if ($summary) {
            $html_rendered .= SummaryInfoscienceField2018Render::render($publication, self::$format, false);
        }

        $html_rendered .= '<span class="text-muted small mb-0 infoscience_host">';
        $books_chapters_rendered = BooksChaptersPublicationLocationInsitutionDateInfoscienceField2018Render::render($publication, self::$format);

        if ($books_chapters_rendered) {
            $html_rendered .= $books_chapters_rendered . '&nbsp;';
        }

        # not sure about the need of this one
        # $html_rendered .= PublicationPageInfoscienceField2018Render::render($publication, self::$format);
        $html_rendered .= '</span>';

        $html_rendered .= DOIInfoscienceField2018Render::render($publication, self::$format);

        return $html_rendered;
    }
}

Class WorkingPapersDetailedInfosciencePublication2018Render extends DetailedInfosciencePublication2018Render {
    public static function render($publication, $format, $summary) {
        return ReportsDetailedInfosciencePublication2018Render::render($publication, $format, $summary);
    }
}

Class WorkingPapersShortInfosciencePublication2018Render extends ShortInfosciencePublication2018Render {
    public static function render($publication, $format, $summary) {
        return ReportsShortInfosciencePublication2018Render::render($publication, $format, $summary);
    }
}
?>
