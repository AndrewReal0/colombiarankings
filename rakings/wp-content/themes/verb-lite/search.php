<?php
/**
 * The template for displaying search results pages.
 *
 * @package themely framework
 */

get_header(); ?>

<div class="wrapper search-wrapper">
    
    <div class="container">

        <div class="row">
        
            <section id="primary" class="<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area">
                
                <main id="main" class="site-main" role="main">

                <?php if ( have_posts() ) : ?>

                    <header class="page-header">

                        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'verb-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                        
                    </header><!-- .page-header -->

                    <?php /* Start the Loop */ ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'loop-templates/content', 'search' ); ?>

                    <?php endwhile; ?>

                    <?php the_posts_navigation(); ?>

                <?php else : ?>

                    <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                <?php endif; ?>

                </main><!-- #main -->
                
            </section><!-- #primary -->

            <?php get_sidebar(); ?>

        </div><!-- .row -->
    
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>