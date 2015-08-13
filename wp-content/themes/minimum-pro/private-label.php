<?php
/**
 * Template Name: Private Label Page Template
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
//* This file handles pages, but only exists for the sake of child theme forward compatibility.
remove_filter( 'the_content', 'wpautop' );

add_filter ( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
get_header();
?>
 <div class='content-wrap'>
    <div class="content-sidebar-wrap">
        <div class='banner-img'<?php if (has_post_thumbnail( $post->ID ) ): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );?> style="background-image: url('<?php echo $image[0]; ?>')"<?php endif; ?>><h1>Private Label for Law Firms</h1></div>
        <div class="content content-part">
            <?php the_excerpt();?>
        </div>
         <?php if ( is_active_sidebar( 'private-label' ) ) : ?>
        <div class="sidebar">
            <?php dynamic_sidebar( 'private-label' ); ?>
        </div>
        <?php endif; ?>
        <div class='clearfix'></div>
        <div class='content'>
            <?php the_content();?>
        </div>
    </div>
</div>
<div id="contact-form-app-form" class="contact lightbox">[contact-form-7 id="669" title="Application Form"]</div>
<?php 

genesis();