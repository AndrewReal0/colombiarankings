<?php
/**
 * @package themely framework
 */
?>

<div class="wrapper" id="wrapper-featured">
        
        <div class="container">
            
            <div class="row">
            
                <div class="col-md-6 large">
    
                    <?php
                        $do_not_duplicate = array();
                        $my_query = new WP_Query( array(
                            'posts_per_page' => 1,
                            'category_name' => get_theme_mod('verb_lite_homepage_featured_posts')
                        ) );
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <span class="cat cat-title"><?php verb_lite_entry_categories(); ?></span>

                            <div class="hovereffect">

                                <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo get_the_post_thumbnail( $post->ID, 'verb-lite-featured1',array('class'=>'img-responsive')); ?></a>

                            </div>

                            <header class="entry-header">

                                <?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

                                <div class="entry-meta">

                                    <?php verb_lite_posted_on(); ?>

                                </div><!-- .entry-meta -->

                            </header><!-- .entry-header -->

                        </article><!-- #post-## -->
                        
                    <?php $do_not_duplicate[] = $post->ID; ?>
                    
                    <?php endwhile; ?>

                </div>

                <div class="col-md-6 margin-bottom-30">
    
                    <?php
                        $my_query = new WP_Query( array(
                            'posts_per_page' => 1,
                            'category_name' => get_theme_mod('verb_lite_homepage_featured_posts'),
                            'post__not_in' => $do_not_duplicate
                        ) );
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    
                                    <span class="cat cat-title"><?php verb_lite_entry_categories(); ?></span>
                                    <div class="hovereffect">
                                        <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo get_the_post_thumbnail( $post->ID, 'verb-lite-wide',array('class'=>'img-responsive')); ?></a>
                                    </div>
                                    <header class="entry-header">

                                        <?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

                                        <?php if ( 'post' == get_post_type() ) : ?>

                                        <?php endif; ?>

                                    </header><!-- .entry-header -->

                                </article><!-- #post-## -->

                                <?php $do_not_duplicate[] = $post->ID; ?>
                                
                    <?php endwhile; /* rewind or continue if all posts have been fetched */ ?>

                </div>
                
                <div class="col-md-6">
                    
                    <div class="row">
    
                        <div class="col-xs-12 col-sm-6 col-md-6 fourcol">

                            <?php
                            $my_query = new WP_Query( array(
                                'posts_per_page' => 1,
                                'category_name' => get_theme_mod('verb_lite_homepage_featured_posts'),
                                'post__not_in' => $do_not_duplicate
                            ) );
                            while ($my_query->have_posts()) : $my_query->the_post(); ?>

                                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <span class="cat cat-title"><?php verb_lite_entry_categories(); ?></span>
                                        <div class="hovereffect">
                                            <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo get_the_post_thumbnail( $post->ID, 'verb-lite-square',array('class'=>'img-responsive')); ?></a>
                                        </div>
                                        <header class="entry-header">

                                            <?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

                                            <?php if ( 'post' == get_post_type() ) : ?>

                                            <?php endif; ?>

                                        </header><!-- .entry-header -->
                                    </article><!-- #post-## -->

                                    <?php $do_not_duplicate[] = $post->ID; ?>

                            <?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
                            
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-6 fourcol">

                            <?php
                            $my_query = new WP_Query( array(
                                'posts_per_page' => 1,
                                'category_name' => get_theme_mod('verb_lite_homepage_featured_posts'),
                                'post__not_in' => $do_not_duplicate
                            ) );
                            while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                    
                                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <span class="cat cat-title"><?php verb_lite_entry_categories(); ?></span>
                                        <div class="hovereffect">
                                            <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo get_the_post_thumbnail( $post->ID, 'verb-lite-square',array('class'=>'img-responsive')); ?></a>
                                        </div>
                                        <header class="entry-header">

                                            <?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

                                            <?php if ( 'post' == get_post_type() ) : ?>

                                            <?php endif; ?>

                                        </header><!-- .entry-header -->
                                    </article><!-- #post-## -->

                                    <?php $do_not_duplicate[] = $post->ID; ?>

                            <?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
                            
                        </div>

                    </div>
                    
                </div>
                
            </div>
        
        </div>
        
    </div>