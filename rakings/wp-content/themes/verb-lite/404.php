<?php
/**
 * The template for displaying 404 pages (not found).
 * @package themely framework
 */

get_header(); ?>

<div class="wrapper" id="404-wrapper">
    
    <div  id="content" class="container">

        <div class="row">
        
            <div id="primary" class="content-area col-md-12">

                <main id="main" class="site-main" role="main">

                    <section class="error-404 not-found">
                        
                        <header class="page-header">

                            <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'verb-lite' ); ?></h1>
                        
                        </header><!-- .page-header -->

                        <div class="page-content">

                            <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'verb-lite' ); ?></p>

                            <?php get_search_form(); ?>

                        </div><!-- .page-content -->
                        
                    </section><!-- .error-404 -->

                </main><!-- #main -->
                
            </div><!-- #primary -->

        </div> <!-- .row -->
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>