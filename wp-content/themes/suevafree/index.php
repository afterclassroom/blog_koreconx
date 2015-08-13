<?php 

	get_header();
	
	if ( have_posts() ) : 
	
?>

<div class="container">

	<div class="row" id="blog" >
    
	<?php if ( ( suevafree_template('sidebar') == "left-sidebar" ) || ( suevafree_template('sidebar') == "right-sidebar" ) ) : ?>
        
        <div class="<?php echo suevafree_template('span') .' '. suevafree_template('sidebar'); ?>"> 
        	
            <div class="row"> 
        
    <?php 
	
		endif;
		
		while ( have_posts() ) : the_post(); 
		
	?>

            <div <?php post_class(); ?> >
    
				<?php do_action('suevafree_postformat'); ?>
        
                <div style="clear:both"></div>
            
            </div>
		
		<?php endwhile; else:  ?>

            <div class="pin-article <?php echo suevafree_template('span'); ?>" >
    
                <article class="article category">
                    
                    <h1> Not found </h1>
                    <p><?php _e( 'Sorry, no posts found.',"suevafree" ) ?></p>
     
                </article>
    
            </div>
	
	<?php 
	
		endif;
		
		if ( ( suevafree_template('sidebar') == "left-sidebar" ) || ( suevafree_template('sidebar') == "right-sidebar" ) ) : ?>
        
            </div>
         
         </div>
        
    <?php 
	
		endif;
		
		if ( suevafree_template('span') == "span8" ) : 
	
	?>

    <!-- HOME WIDGET -->

    <section id="sidebar" class="pin-article span4">
    
    	<div class="sidebar-box">

			<?php if ( is_active_sidebar('home_sidebar_area') ) { 
            
				dynamic_sidebar('home_sidebar_area');
            
            } else { 
                
                the_widget( 'WP_Widget_Archives','',
				array('before_widget' => '<div class="widget-box">',
					  'after_widget'  => '</div>',
					  'before_title'  => '<h4 class="title">',
					  'after_title'   => '</h4>'
				));

                the_widget( 'WP_Widget_Calendar',
				array("title"=> __('Calendar','suevafree')),
				array('before_widget' => '<div class="widget-box">',
					  'after_widget'  => '</div>',
					  'before_title'  => '<h4 class="title">',
					  'after_title'   => '</h4>'
				));

                the_widget( 'WP_Widget_Categories','',
				array('before_widget' => '<div class="widget-box">',
					  'after_widget'  => '</div>',
					  'before_title'  => '<h4 class="title">',
					  'after_title'   => '</h4>'
				));
            
             } 
			 
			 ?>

            </div>
            
        </section>

	<!--  END HOME WIDGET -->

	<?php endif;?>

    </div>
    
</div>

<?php

	get_template_part('pagination');
	get_footer(); 

?>