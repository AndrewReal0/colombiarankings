<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package themely framework
 */
?>

	<?php the_content(); ?>

	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'verb-lite' ),
			'after'  => '</div>',
		) );
	?>

