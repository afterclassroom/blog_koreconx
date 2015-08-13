<?php 
	
	if ( has_post_thumbnail() ) : ?>
        
		<div class="pin-container">
			<?php the_post_thumbnail('blog'); ?>
        </div>
        
<?php 

	endif; 
	
?>
    
<article class="article">

	<?php
	
		if (is_single()) :

			do_action("suevafree_title","single"); 

		else :

			do_action("suevafree_title","blog"); 

		endif;
	
	?>
    
    <div class="line"> 

        <div class="entry-info">
       
            <span class="entry-date"><i class="icon-time" ></i><?php echo get_the_date(); ?></span>
            
			<?php if (suevafree_setting('suevafree_view_comments') == "on" ): ?>
            
                <span class="entry-comments">
                    
                    <i class="icon-comments-alt" ></i>
                    <?php echo comments_number( '<a href="'.get_permalink($post->ID).'#respond">'.__( "No comments","suevafree").'</a>', '<a href="'.get_permalink($post->ID).'#comments">1 '.__( "comment","suevafree").'</a>', '<a href="'.get_permalink($post->ID).'#comments">% '.__( "comments","suevafree").'</a>' ); ?>
                
                </span>
            
			<?php endif; ?>
            
            <span class="entry-standard"><i class="icon-external-link"></i><?php _e( "Link","suevafree") ?></span>
        	
			<?php if (suevafree_setting('suevafree_view_author') == "on" ) : ?>

                <span class="entry-author"><i class="icon-user"></i><?php the_author(); ?></span>

            <?php endif; ?>
            
        </div>
    
    </div>

	<?php do_action('suevafree_after_content'); ?>

</article>