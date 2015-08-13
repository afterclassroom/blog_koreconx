<?php get_header(); ?>

<div class="container">
	
    <div class="row" id="blog">

        <div class="<?php echo suevafree_template('span')." ".suevafree_template('sidebar'); ?>"> 

            <div class="row">
            
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
                    <div <?php post_class(); ?> >
                
                        <?php do_action('suevafree_postformat'); ?>
                    
                        <div style="clear:both"></div>
                        
                    </div>
                    
                <?php endwhile; else:  ?>
            
                    <div <?php post_class(); ?> >
                        
                        <article class="article">
        
                            <h1 class="title"><?php _e( 'Not found',"wip" ) ?></h1>           
                            <p><?php _e( 'Sorry, no posts matched found ',"wip" ) ?></p>
                         
                        </article>
                        
                    </div>
                        
                <?php endif; ?>
                
            </div>
            
			<?php get_template_part('pagination'); ?>
            
        </div>
        
		<?php if ( suevafree_template('span') == "span8" ) : ?>
    
                <section id="sidebar" class="span4">
                    <div class="row">
                    
					<?php if ( is_active_sidebar('home_sidebar_area') ) { 
                    
                        dynamic_sidebar('home_sidebar_area');
                    
                    } else { 
                        
                        the_widget( 'WP_Widget_Archives','',
                        array('before_widget' => '<div class="pin-article span4"><div class="widget-box">',
                              'after_widget'  => '</div></div>',
                              'before_title'  => '<h4 class="title">',
                              'after_title'   => '</h4>'
                        ));
        
                        the_widget( 'WP_Widget_Calendar',
						array("title"=> __('Calendar','wip')),
                        array('before_widget' => '<div class="pin-article span4"><div class="widget-box">',
                              'after_widget'  => '</div></div>',
                              'before_title'  => '<h4 class="title">',
                              'after_title'   => '</h4>'
                        ));
        
                        the_widget( 'WP_Widget_Categories','',
                        array('before_widget' => '<div class="pin-article span4"><div class="widget-box">',
                              'after_widget'  => '</div></div>',
                              'before_title'  => '<h4 class="title">',
                              'after_title'   => '</h4>'
                        ));
                    
                     } 
                     
                     ?>

                    </div>
                </section>
        
		<?php endif; ?>
           
    </div>
</div>

<?php get_footer(); ?>