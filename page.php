<?php

/**
 * General Page Template
 */

get_header();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<main class="">
  <!-- <div class="row fullHeight collapse">
    <div class="large-12 medium-12 small-12 columns fullHeight"> -->
      <?php
if (have_posts()):
    while (have_posts()):
        the_post(); ?>
      
      <?php
        if (get_field('section')) {
?>
      <?php
            $section_count = 0;
            
            while (has_sub_field('section')) {
                $section_count++;
                $style = '';
                $bg_class = '';
                $row_class = '';
                $column_class = '';
                $padding = '';
                $dark = '';
                $full = '';
                $center_columns = '';
                $section_open = '';
                $section_close = '';
                $vertical_open = $vertical_close = '';
                $post_type = '';
                $post_title = '';
                $single_post = '';
                
                if (get_sub_field('section_padding') == false) {
                    $padding = 'noPadding';
                }
                if (get_sub_field('dark_background') == true) {
                    $dark = 'darkbg';
                }
                if (get_sub_field('full_background') == true) {
                    $full = 'full';
                }
                if (get_sub_field('row_collapse')) {
                    $row_collapse_field = get_sub_field('row_collapse');
                    switch (get_sub_field('row_collapse')) {
                        case in_array('large_collapse', $row_collapse_field):
                            $row_class.= ' large-collapse';
                        case in_array('medium_collapse', $row_collapse_field):
                            $row_class.= ' medium-collapse';
                        case in_array('small_collapse', $row_collapse_field):
                            $row_class.= ' small-collapse';
                    }
                }
                
                switch (get_sub_field('background')) {
                    case 'background_image':
                        $style = 'background-image:url(' . get_sub_field('background_image') . ')';
                        $bg_class = 'bg';
                        break;

                    case 'background_colour':
                        $style = 'background-color:' . get_sub_field('background_colour') . ';';
                        $bg_class = '';
                        break;
                }
                $style = 'style="' . $style . '" ';

                 if (get_sub_field('hide_row_mobile')) {
                    $row_class .= ' hide-for-small-only';
                }

                $class = $bg_class . ' ' . $row_class . ' ' . $padding . ' ' . $dark . ' ' . $full;
                
                $firstDivBoxStart = $firstDivBoxEnd = '';
                if ($section_count === 1) {
                    $class.= ' firstSection';
                    $firstDivBoxStart = '<div class="paddingAll mainBox"><div class="borderYellow">';
                    $firstDivBoxEnd = '</div></div>';
                }
                
                if (get_sub_field('full_width') == true) {
                    $section_open = '<section class="wow fadeInUp ' . $class . '"' . $style . ' data-wow-offset="50"><div class="row ' . $class . '" data-equalizer><div class="table"><div class="cell">' . $firstDivBoxStart . '';
                    $section_close = '<br class="clr"></div></div></div>' . $firstDivBoxEnd . '</section>';
                } 
                else {
                    $section_open = '<section class="wow fadeInUp row ' . $class . '"' . $style . ' data-wow-offset="50">';
                    $section_close = '</section>';
                }
                
                echo $section_open;
                
                // echo '<section class="wow fadeInUp row ' . $class . '"' . $style . ' data-wow-offset="50">';
                
                $box_count = 0;
                
                // while has sub field columns
                
                while (has_sub_field('column')) {
                    $column_center = '';
                    $padding = '';
                    
                    if (get_sub_field('center_columns')) {
                        $center_columns_field = get_sub_field('center_columns');
                        switch ($center_columns_field) {
                            case in_array('large', $center_columns_field):
                                $column_center.= ' large-centered';
                            case in_array('medium', $center_columns_field):
                                $column_center.= ' medium-centered';
                            case in_array('small', $center_columns_field):
                                $column_center.= ' small-centered';
                        }
                    }
                    
                    $box_count++;
                    if (get_sub_field('column_padding') == true) {
                        $padding = 'paddingTopBottom largePadding';
                    }
                    $large_columns_field = get_sub_field('large_columns');
                    $medium_columns_field = get_sub_field('medium_columns');
                    $small_columns_field = get_sub_field('small_columns');
                    for ($i = 0; $i <= 12; $i++) {
                        if ($large_columns_field == $i) {
                            $large_columns = 'large-' . $large_columns_field;
                        }
                        if ($medium_columns_field == $i) {
                            $medium_columns = 'medium-' . $medium_columns_field;
                        }
                        if ($small_columns_field == $i) {
                            $small_columns = 'small-' . $small_columns_field;
                        }
                    }
                    
                    $class = '';
                    $content = '';
                    
                    switch (get_sub_field('content_type')) {
                            
                            /******************
                             *
                             *   Image
                             *
                             *******************/
                        case 'image':
                            $class = 'image';
                            $content = '<img src="' . get_sub_field($class) . '">';
                            break;
                            
                            /******************
                             *
                             *   General Content
                             *
                             *******************/
                        case 'general_content':
                            $class = 'general_content';
                            $content = get_sub_field($class);
                            $found = array();
                            if (!is_home()) {
                                
                                if (preg_match("/(<h2>)[^.]+?(<\/h2>)/i", $content, $found)) {
                                    
                                    //$content .= ' TEXT CONTAINS H2 ' . $found[0];
                                    $content = preg_replace("/(<h2>)[^*]+?(<\/h2>)/i", "<div class='titleContainer wow fadeInUp'>" . $found[0] . "</div>", $content);
                                    
                                    // $content .= 'TESTING H2 THINGY';
                                    
                                }
                            }
                            $column_class = '';
                            if (get_sub_field('equal_height')):
                                $column_class .= ' equalHeight';
                            endif;
                            if (get_sub_field('arrow_link')):
                                $column_class.= ' arrow_link';
                                $content.= ' <div class="yellowArrowRight"><a href="' . get_sub_field('page_link') . '"><img src="' . get_template_directory_uri() . '/img/yellow-arrow-right.png"></a></div>';
                            endif;
                            if (get_sub_field('collapse_field_mobile')) :

                                $column_class .= ' collapse_field_mobile';

                                 
                            endif;
                            break;
                            
                            /******************
                             *
                             *   Post Type
                             *
                             *******************/
                        case 'post_type':
                            $post_type_var = 'post_type_selector';
                            $post_type = get_sub_field($post_type_var);
                            $class = 'post_type ' . $post_type;
                            $post_title.= '';
                            $single_post.= '';
                            $news_all_posts = '';
                             // Define the variable
                            $number_of_posts = '-1';
                            $post_count = 0;
                            $post_columns = 'large-3 medium-6 small-12';
                            
                            if (get_sub_field('number_of_posts')) {
                                $number_of_posts = get_sub_field('number_of_posts');
                            }
                            $content.= '<div class="row">';
                            ob_start();
                            
                            include (get_template_directory() . '/templates/post-type-' . $post_type . '.php');
                            
                            $content.= ob_get_contents();
                            
                            ob_end_clean();
                            
                            $content .= '</div>';
                            break;
                            
                            /******************
                             *
                             *   Widget Area
                             *
                             *******************/
                        case 'widget_area':
                            function get_widget_area() {
                                ob_start();
                                dynamic_sidebar(get_sub_field('widget_area'));
                                $sidebar = ob_get_contents();
                                ob_end_clean();
                                return $sidebar;
                            }
                            $content = get_widget_area();
                            break;
                            
                            /******************
                             *
                             *   History
                             *
                             *******************/
                        case 'history':
                            $class = 'history';
                            
                            $content.= '<div class="historyContainer"><div class="small-6 medium-6 large-6 columns yearContainer">';
                            
                            $year_count = $desc_count = '';
                            while (has_sub_field($class)) {
                                $year_count++;
                                $active = '';
                                if ($year_count == 1) {
                                    $active = 'active';
                                }
                                if (get_sub_field('year')) {
                                    $year = get_sub_field('year');
                                    $content.= '<div class="year"><a data-id="year' . $year_count . '" class="' . $active . '">' . $year . '</a></div>';
                                }
                            }
                            
                            $content.= '</div>';
                            
                            $content.= '<div class="small-6 medium-6 large-6 columns descContainer">';
                            
                            while (has_sub_field($class)) {
                                
                                if (get_sub_field('description')) {
                                    $desc_count++;
                                    $active = '';
                                    if ($desc_count == 1) {
                                        $active = 'active';
                                    }
                                    $description = get_sub_field('description');
                                    $content.= '<div class="description ' . $active . '" id="year' . $desc_count . '"><p>' . $description . '</p></div>';
                                }
                            }
                            
                            $content.= '</div><br class="clr"></div>';
                            
                            break;


                    }
                     // end column loop
                    
                    //echo $box_text;
                    
                    echo '<div class="' . $large_columns . ' ' . $medium_columns . ' ' . $small_columns . ' ' . $padding . ' ' . $column_class . ' ' . $column_center . ' columns">';
                    
                    // columns
                    
                    echo '<div class="content ' . $class . '"><div class="table"><div class="cell">';
                    
                    // echo '<h1>Box Count: ' . $box_count . '</h1>';
                    // echo $found[0];
                    
                    // if (get_sub_field('content_type') === 'post_type') {
                    //     include('templates/post-type-' . $post_type . '.php');
                    //    // echo pv(test);
                    // }
                    // else {
                    echo $content;
                    
                    // }
                    
                    // echo pv(get_sub_field('content_type'));
                    
                    // print_r($post_columns_array);
                    
                    // $theme_mod =  get_theme_mod('checkbox_setting');
                    
                    // if ($theme_mod) : echo $theme_mod; endif;
                    
                    echo '</div></div></div>';
                    
                    // content
                    
                    echo '</div>';
                    
                    //content columns
                    
                    
                }
                
                echo $section_close;
?>

      <?php
            }
            
            // while has_sub_field
            
            
        }
?>
      <?php
    endwhile; ?>
      <?php
endif;
function pv($var) {
    return '<h1>' . $var . '</h1>';
}
?>
    <!-- </div> -->
    <!-- large-12 columns  -->
  <!-- </div> -->
  <!-- row --> 
</main>
<?php
get_footer();

