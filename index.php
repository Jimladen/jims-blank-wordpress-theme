<?php
/**
 * The main template file
 */

get_header(); ?>


<main>
<div class="row">
	<div class="large-12 medium-12 small-12 columns">
	<h1>Wordpress Setup</h1>
		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

				
				endwhile;
			
			endif;
		?>

		</div><!-- large-12 columns -->
        <?php
        get_sidebar();
		?>
	</div><!-- container -->
</main>

<?php
get_footer();
