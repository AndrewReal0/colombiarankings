<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Themely
 */
?>

<div class="wrapper" id="wrapper-footer">
    
    <div class="container">

        <div class="row">
                
                <?php dynamic_sidebar( 'footer' ); ?>

        </div><!-- row end -->
        
    </div><!-- container end -->
    
</div><!-- wrapper end -->

<div class="wrapper" id="wrapper-footer-full">
    
    <div class="container">

        <div class="row">

            <div class="col-md-12">
    
                <footer id="colophon" class="site-footer" role="contentinfo">

                    <div class="site-info">

                        <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'verb-lite' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'verb-lite' ), 'WordPress' ); ?></a>

                        <span class="sep"> | </span>
                        
                        <?php printf( __( 'Made with love by %2$s', 'verb-lite' ), 'verb-lite', '<a href="https://www.themely.com/" rel="designer">Themely</a>' ); ?>

                    </div><!-- .site-info -->

                </footer><!-- #colophon -->
                
            </div><!--col end -->

        </div><!-- row end -->
        
    </div><!-- container end -->
    
</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
