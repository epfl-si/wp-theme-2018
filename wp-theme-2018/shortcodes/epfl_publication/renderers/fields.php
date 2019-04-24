<?php
/* 
* Fields
*/ 
Class InfoscienceField2018Render {
    /*
    * Check if the filed exist and is not empty, including subfield if provided
    */
    public static function field_exists($field, $subfield=null) {
        $exists = isset($field) && is_array($field) && !empty($field[0]);

        if ($subfield) {
            $exists = $exists && isset($field[0][$subfield]) && !empty($field[0][$subfield]);
        }

        return  $exists;
    }

    # to be overriden
    public static function render($publication, $format, $has_next=false) {
    }

    # when we don'have any special logic
    public static function direct_value_render($value, $format, $has_next=false) {
        $html_rendered = "";

        if ($format === 'detailed') {
            $html_rendered .= '<span">' . $value .'</span>';
            if ($has_next) {
                $html_rendered .= '<span>: </span>';
            }


        } else {
            $html_rendered .= "<span><strong>" . $publication['title'][0] . "</strong></span>";
            if ($has_next) {
                $html_rendered .= "<span> ; </span>";
            } else {
                $html_rendered .= "<span>. </span>";
            }
        }        
    }
}

Class AuthorInfoscienceField2018Render extends InfoscienceField2018Render {
    protected static function pre_render() {
        return '<p class="text-muted small mb-2 infoscience_authors">';
    }

    protected static function post_render() {
        return '&nbsp;</p>';
    }

    protected static function  render_author($author_name, $author_url) {
        $html_rendered = '<a class="text-muted infoscience_author" href="' . $author_url . '" target="_blank">';
        $html_rendered .= $author_name;
        $html_rendered .= '</a>';

        return $html_rendered;
    }


    protected static function render_authors($authors) {
        $html_rendered = '';

        foreach($authors as $index => $author) {
            if ($index == 5) {
                $html_rendered .= ' <span class="infoscience_more_authors_element">et al.</span>';
                break;
            } else {
                if ($index != 0) {
                    $html_rendered .= "; ";
                }

                $html_rendered .= self::render_author($author['initial_name'], $author['search_url']);
            }
        }

        return $html_rendered;
    }


    public static function render($publication, $format, $has_next=false, $field_name='author') {
        $html_rendered = self::pre_render();

        $html_rendered .= self::render_authors($publication[$field_name]);

        $html_rendered .= self::post_render();

        return $html_rendered;
    }
}

Class DirectorAuthorInfoscienceField2018Render extends AuthorInfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false, $field_name='author') {
        if (!self::field_exists($publication['author']) && !self::field_exists($publication['director'])) {
            return '';
        }

        $html_rendered = self::pre_render();

        if (self::field_exists($publication['author'])) {
            $html_rendered .= self::render_authors($publication['author']);
        }

        if (self::field_exists($publication['author']) && self::field_exists($publication['director'])) {
            $html_rendered .= " / ";
        }

        if (self::field_exists($publication['director'])) {
            $html_rendered .= self::render_authors($publication['director']);
            $html_rendered .= " (" . __('Dir.', 'epfl-infoscience-search') . ") ";
        }

        $html_rendered .= self::post_render();
        return $html_rendered;
    }
}


Class TitleInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        return '<h4 class="h5 tex2jax_process infoscience_title">' . $publication['title'][0] .'</h4>';
    }
}

# for 
# - book chapters
# - books
# - theses
Class BooksChaptersPublicationLocationInsitutionDateInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";

        if ($format === 'detailed')
        {
            if (self::field_exists($publication['publication_location'])) {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_publication_location">' . $publication['publication_location'][0] . '</span>';
                if (self::field_exists($publication['publication_institution'])) {
                    $html_rendered .= ': ';
                }
            }

            if ($publication['publication_institution']) {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_publication_institution">' . $publication['publication_institution'][0] . "</span>";
            }
        } else {
            if (self::field_exists($publication['publication_location'])) {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_publication_location">' . $publication['publication_location'][0] . '</span>';
                if (self::field_exists($publication['publication_institution'])) {
                    $html_rendered .= ': ';
                } elseif (self::field_exists($publication['publication_date'])) {
                    $html_rendered .= ', ';
                } else {
                    $html_rendered .= '. ';
                }
            }

            if ($publication['publication_institution']) {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_publication_institution">' . $publication['publication_institution'][0] . "</span>";
                if (self::field_exists($publication['publication_date'])) {
                    $html_rendered .= ', ';
                } else {
                    $html_rendered .= '. ';
                }
            }
        }
        $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, $format, $has_next);

        return $html_rendered;
    }
}

# Add ISBN
Class BooksPublicationLocationInsitutionDateInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";
        if ($format === 'detailed') {
            $has_isbn = self::field_exists($publication['isbn']);

            if (self::field_exists($publication['publication_location'])) {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_publication_location">' . $publication['publication_location'][0] .'</span>';
                if (self::field_exists($publication['publication_institution']) ||
                    self::field_exists($publication['publication_date'])) {
                    $html_rendered .= ': ';
                } else {
                    $html_rendered .= '. ';
                }
            }

            if ($publication['publication_institution']) {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_publication_institution">' . $publication['publication_institution'][0] .'</span>';
                if (self::field_exists($publication['publication_date'])) {
                    $html_rendered .= ', ';
                } else {
                    $html_rendered .= '. ';
                }
            }

            if (self::field_exists($publication['publication_date'])) {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_publication_date">' . $publication['publication_date'][0] . '</span>';
                $html_rendered .= '. ';
            }
        } else {
            if (self::field_exists($publication['publication_location'])) {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_publication_location">' . $publication['publication_location'][0] . '</span>';
                if (self::field_exists($publication['publication_institution']) ||
                    self::field_exists($publication['publication_date'])) {
                    $html_rendered .= ': ';
                } else {
                    $html_rendered .= '. ';
                }
            }
            
            if ($publication['publication_institution']) {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_publication_institution">' . $publication['publication_institution'][0] . '</span>';
                if (self::field_exists($publication['publication_date'])) {
                    $html_rendered .= ', ';
                } else {
                    $html_rendered .= '. </span>';
                }
            }

            $html_rendered .= PublicationDateInfoscienceField2018Render::render($publication, $format, $has_next);
        }

        return $html_rendered;
    }
}

Class PublicationDateInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";

        if (self::field_exists($publication['publication_date'])) {
            if ($format === 'detailed') {
                $html_rendered .= '<p class="text-muted small mb-0 infoscience_publication_date">' . $publication['publication_date'][0] . '</p>';
            } else {
                $html_rendered .= '<span class="text-muted small infoscience_publication_date"><i>' . $publication['publication_date'][0] . '</i>.</span>';
            }
        }

        return $html_rendered;
    }
}

Class PublicationDateAsPInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";

        if (self::field_exists($publication['publication_date'])) {
            if ($format === 'detailed') {
                $html_rendered .= "<p>" . $publication['publication_date'][0] . ". </p>";
            } else {
                $html_rendered .= parent::render($publication, $format, $has_next);
            }
        }

        return $html_rendered;
    }
}

Class DOIInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";
        if (self::field_exists($publication['doi'])) {
            if ($format === 'detailed') {
                $html_rendered .= '<p class="text-muted small mb-0 infoscience_doi">DOI : ' . $publication['doi'][0] . '</p>';
            } else {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_doi">DOI : ' . $publication['doi'][0] . '.</span>';
            }
        }
        return $html_rendered;
    }
}

Class ISBNInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";
        if (self::field_exists($publication['isbn'])) {
            if ($format === 'detailed') {
                $html_rendered .= '<p class="text-muted small mb-0 infoscience_isbn">ISBN : ' . $publication['isbn'][0] . '</p>';
            } else {
                $html_rendered .= '<span class="infoscience_isbn">ISBN : ' . $publication['isbn'][0] . ". </span>";
            }
        }
        return $html_rendered;
    }
}


Class SummaryInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        if (self::field_exists($publication['summary'])) {
            return '<p class="text-muted small mb-1 infoscience_abstract tex2jax_process">' . $publication['summary'][0] . '</p>';
        } else {
            return "";
        }
    }
}

Class JournalPublisherInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";

        if (self::field_exists($publication['journal'], 'publisher')) {
            if ($format === 'detailed') {
                $html_rendered .= '<p class="text-muted small mb-0 infoscience_journal_publisher"><i>' . $publication['journal'][0]['publisher'] . "</i>";
                if ($has_next) {
                    $html_rendered .= "; ";
                }
            } else {
                $html_rendered .= ' <span class="text-muted small mb-0 infoscience_journal_publisher"><i>' . $publication['journal'][0]['publisher'] . '</i>';
                if ($has_next) {
                    $html_rendered .= "; ";
                } else {
                    $html_rendered .= ". ";
                }
            }

            if ($format === 'detailed') {
                $html_rendered .= '</p>';
            } else {
                $html_rendered .= "</span>";
            }

        return $html_rendered;
        }
    }
}

Class JournalPageInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";

        if (self::field_exists($publication['journal'], 'page')) {
            if ($format === 'detailed') {
                $html_rendered .= '<p class="text-muted small mb-0 infoscience_journal_page">' . __('p.', 'epfl-infoscience-search') . ' ' . $publication['journal'][0]['page'] .'</p>';
            } else {
                $html_rendered .= ' <span class="text-muted small mb-0 infoscience_journal_page">' . __('p.', 'epfl-infoscience-search') . ' ' . $publication['journal'][0]['page'] .'. </span>';
            }
        }
 
        return $html_rendered;
    }
}


Class JournalDetailsInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";

        if ($format === 'detailed') {
            if (self::field_exists($publication['journal'], 'volume')) {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_journal_volume">' . __('Vol.', 'epfl-infoscience-search') . ' ' . $publication['journal'][0]['volume'] .' ';

                if (self::field_exists($publication['journal'], 'number') || 
                    self::field_exists($publication['journal'], 'page')) {
                    $html_rendered .= '</span>, ';
                } else {
                    $html_rendered .= '</span>. ';
                }
            }

            if (self::field_exists($publication['journal'], 'number')) {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_journal_number">' . __('num.', 'epfl-infoscience-search') . ' ' . $publication['journal'][0]['number'] .'';
                if (self::field_exists($publication['journal'], 'page')) {
                    $html_rendered .= '</span>, ';
                } else {
                    $html_rendered .= '</span>. ';
                }
            }

            $html_rendered .= JournalPageInfoscienceField2018Render::render($publication, 'short', $has_next);
        } else {
        }
        return $html_rendered;
    }
}

Class ConferenceDataInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";

        if (self::field_exists($publication['conference'], 'name')) {
            $html_rendered .= '<span class="text-muted small mb-0 infoscience_conference_name">' . $publication['conference'][0]['name'];
            
            if (self::field_exists($publication['conference'], 'location') || 
                self::field_exists($publication['conference'], 'date')) {
                $html_rendered .= ", </span>";
            } else {
                $html_rendered .= ". </span>";
            }
        }

        if (self::field_exists($publication['conference'], 'location')) {
            $html_rendered .= '<span class="text-muted small mb-0 infoscience_conference_location">' . $publication['conference'][0]['location'];
            
            if (self::field_exists($publication['conference'], 'location')) {
                $html_rendered .= ", </span>";
            } else {
                $html_rendered .= ". </span>";
            }
        }

        if (self::field_exists($publication['conference'], 'date')) {
            $html_rendered .= '<span class="text-muted small mb-0 infoscience_conference_date">' . $publication['conference'][0]['date'] . ". </span>";
        }

        return $html_rendered;
    }
}

Class ConferenceProceedingsDataInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";

        if ($format === 'detailed') {
            ConferenceDataInfoscienceField2018Render::render($publication, $format, $has_next);
        } else {
            if (self::field_exists($publication['conference'], 'name')) {
                $html_rendered .= '<span class="text-muted small mb-0 infoscience_conference_name">' . $publication['conference'][0]['name'];
                $html_rendered .= ". </span>";
            }
        }

        return $html_rendered;
    }
}

Class CorporateNameInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";

        if (self::field_exists($publication['corporate_name'])) {
            $html_rendered .= "<span>" . $publication['corporate_name'][0] . "</span>";
    
            if ($has_next) {
                $html_rendered .= "<span> / </span>";
            } else {
                $html_rendered .= "<span>: </span>";
            }
        }
        
        return $html_rendered;
    }
}

Class CompanyNameInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";
        
        if (self::field_exists($publication['corporate_name'])) {
            if ($format === 'detailed') {
                $html_rendered .= "<span>" . $publication['company_name'][0] . "</span>";

                if ($has_next) {
                    $html_rendered .= "<span>: </span>";
                } else {
                    $html_rendered .= "<span>. </span>";
                }
            } else {
                $html_rendered .= "<span>" . $publication['company_name'][0] . "</span>";
                $html_rendered .= "<span>: </span>";
            }
        }
        
        return $html_rendered;
    }
}

Class PatentsInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";

        if (self::field_exists($publication['patent'])) {
            if ($format === 'detailed') {
                $html_rendered .= '<p class="text-muted small mt-2 mb-2 infoscience_patents_number">';
                $html_rendered .= __('Patent number(s)', 'epfl-infoscience-search') . " :<br />";
                $html_rendered .= '<ul class="text-muted small mt-2 mb-2 infoscience_patents_number_list">';

                foreach ($publication['patent'] as $patent) {
                    $html_rendered .= '<li class="infoscience_patents_number"><span class="">' . $patent['number'] . "</span> ";
        
                    if (array_key_exists('state', $patent) && $patent['state']) {
                        $html_rendered .= '(<span class="infoscience_patent_state">' . $patent['state'] . "</span>)";
                    }
        
                    $html_rendered .= "</li>";
                }
        
                $html_rendered .= '</ul></p>';
            } else {
                $len_patents = count($publication['patent']);

                if ($len_patents > 0) {
                    $html_rendered .= '<p class="text-muted small mt-0 mb-0">';

                    foreach ($publication['patent'] as $index => $patent) {
                        $html_rendered .=  $patent['number'];
                        # last ?
                        if ($index == $len_patents - 1) {
                            $html_rendered .= ". ";
                        } else {
                            $html_rendered .= "; ";
                        }
                    }
                    
                    $html_rendered .= '</p>';
    
                }

            }
        }

        return $html_rendered;
    }
}

Class PublicationPageInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";

        if (self::field_exists($publication['publication_page'])) {
            $html_rendered .= '<span class="text-muted small mt-2 mb-2 infoscience_publication_page">' . __('p.', 'epfl-infoscience-search') . ' ' . $publication['publication_page'][0] .'.</span> ';
        }
        return $html_rendered;
    }
}

Class ReportUrlInfoscienceField2018Render extends InfoscienceField2018Render {
    public static function render($publication, $format, $has_next=false) {
        $html_rendered = "";

        if (self::field_exists($publication['report_url'])) {
            if ($format === 'detailed') {
                $html_rendered .= '<p><a href="' . $publication['report_url'][0] . '" target="_blank">' . $publication['report_url'][0] . '</a>.</p>';
            } else {
                $html_rendered .= "<span>" . $publication['report_url'][0] . "</span>";
                $html_rendered .= "<span>. </span>";
                $html_rendered .= '<p><a href="' . $publication['report_url'][0] . '" target="_blank">' . $publication['report_url'][0] . '</a>.</p>';
            }
        } 

        return $html_rendered;
    }
}

?>
