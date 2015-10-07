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

