<?php

/**
 * General Page Template
 */

get_header(); ?>

<main class="">
  <!-- <div class="row fullHeight collapse">
    <div class="large-12 medium-12 small-12 columns fullHeight"> -->
      <?php
if (have_posts()):
    while (have_posts()):
        the_post(); ?>
      <?php
        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
      
      <!-- 	<section class="full bg" style="background-image:url(<?php
        echo $url; ?>);">
       				<div class="table">
       					<div class="cell">
		       				<h2 class="white semiBold wow fadeInLeft text-center" data-wow-delay="1s"><?php
        the_title(); ?></h2>
				        </div>
				    </div>
       			</section>  --> 
      
      <!-- 	<section class="full white-bg">
	       				<div class="table">
	       					<div class="cell">
			       				<h2 class="white semiBold wow fadeInLeft text-center" data-wow-delay="1s"><?php
        the_title(); ?></h2>
					        </div>
					    </div>
	       			</section>  -->
      
      <?php
        if (get_field('section')) {
?>
      <?php
            while (has_sub_field('section')) {
                
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
                $class = $bg_class . ' ' . $row_class . ' ' . $padding . ' ' . $dark . ' ' . $full;
                

                if (get_sub_field('full_width') == true) {
                    $section_open = '<section class="wow fadeInUp ' . $class . '"' . $style . ' data-wow-offset="50"><div class="row">';
                    $section_close = '</div></section>';
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
                        case 'image':
                            $class = 'image';
                            $content = '<img src="' . get_sub_field($class) . '">';
                            break;

                        case 'general_content':
                            $class = 'general_content';
                            $content = get_sub_field($class);
                            break;
                         case 'post_type' :
                            $post_type_var = 'post_type_selector';
                            $post_type = get_sub_field( $post_type_var );
                            $class = 'post_type';
                            $post_title .= '';
                            $single_post .= '';
                            $news_all_posts = ''; // Define the variable
                            $section_title = 'Press Releases';
                            
                            $the_query = new WP_Query( array ( 'posts_per_page' => 3, 'post_type' => $post_type ) ); /*  */

                            while ($the_query->have_posts() ) : $the_query->the_post();

                            $post_title  = get_the_title();
                            $news_excerpt = get_the_content();
                            $files = '';
                            $file = '';
                            $post_id = $post->ID;
                            if (get_field('files', $post_id)) : 
                                while (has_sub_field('files', $post_id)) :
                                    $file = get_sub_field('file');
                                    $file_link = '<a class="fileBtn" href="' . $file["url"] . '">Open File</a>';
                                    $files .= '<div class="row file"><div class="left large-10 medium-10 small-12 columns"><p>' . get_sub_field('file_name') . '</p></div><div class="right large-2 medium-2 small-12 columns">' . $file_link . '</div><br class="clr"></div>';
                                    $test = 'test';
                                endwhile;
                            endif;
                            $single_post = '<article><h1 class="title">'.$post_title.'</h1><div class="press-release"><p>'.$news_excerpt.'</p></div>' . $files . '</article>';

                            $content .= $single_post; // Add each post to the variable


                            endwhile;
                            wp_reset_query();
                            break;
                        case 'widget_area' :
                            function get_widget_area() {
                                ob_start();
                                dynamic_sidebar( get_sub_field('widget_area') );
                                $sidebar = ob_get_contents();
                                ob_end_clean();
                                return $sidebar;
                            }
                            $content = get_widget_area();
                        break;

                    }
                    
                    //echo $box_text;
                    
                    echo '<div class="' . $large_columns . ' ' . $medium_columns . ' ' . $small_columns . ' ' . $padding . ' ' . $column_class . ' ' . $column_center . ' columns equalHeight fullHeight">';
                     // columns
                    
                    echo '<div class="content ' . $class . '"><div class="table"><div class="cell">';
                    
              
                        echo $content;

                       
                    
                    
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
endif; ?>
    <!-- </div> -->
    <!-- large-12 columns  -->
  <!-- </div> -->
  <!-- row --> 
</main>
<?php
get_footer();

