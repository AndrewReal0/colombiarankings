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
        
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
        
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

		<?php endif; ?>
        
	</header><!-- .entry-header -->

        <div class="post-thumbnail">

            <div class="hovereffect">

                <?php echo get_the_post_thumbnail( $post->ID, 'verb-lite-rectangle' ); ?>

            </div>
            
        </div>
    
		<div class="entry-content">

            <?php
                the_excerpt();
            ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'verb-lite' ),
					'after'  => '</div>',
				) );
			?>
	        
		</div><!-- .entry-content -->
    
</article><!-- #post-## -->