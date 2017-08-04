<?php
/**
 * @package themely framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
        
        <div class="entry-meta">
            <?php verb_lite_entry_categories(); ?>
        </div><!-- .entry-meta -->

		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		<div class="row">
        
            <div class="col-xs-8 col-sm-8 col-md-8">

                <div class="entry-meta">
                    <?php verb_lite_posted_on(); ?>
                </div><!-- .entry-meta -->

            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">

                <div class="entry-meta pull-right">
                    <?php verb_lite_entry_comments(); ?>
                </div><!-- .entry-meta -->

            </div>

        </div>

	</header><!-- .entry-header -->

    <div class="post-thumbnail">
        <?php echo get_the_post_thumbnail( $post->ID, 'verb-lite-rectangle' ); ?>
    </div>
    
	<div class="entry-content">

		<?php the_content(); ?>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'verb-lite' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php verb_lite_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
