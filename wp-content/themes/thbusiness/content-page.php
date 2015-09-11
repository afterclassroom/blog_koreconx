<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package thbusiness
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .page-header -->


	<div class='banner-img'<?php if (has_post_thumbnail( $post->ID ) ): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );?> style="background-image: url('<?php echo $image[0]; ?>')"<?php endif; ?>></div>
        <div class="content content-part">
            <?php the_excerpt();?>
        </div>
         <?php if ( is_active_sidebar( 'certified-expert' ) ) : ?>
        <div class="sidebar">
            <?php dynamic_sidebar( 'certified-expert' ); ?>
        </div>
        <?php endif; ?>
        <div class='clearfix'></div>

	<div class="entry-content vkoreconx">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'thbusiness' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer-insinglepost">
		<?php edit_post_link( __( 'Edit', 'thbusiness' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->


<?php
/**
 * Template Name: Certified Expert Page Template
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
//* This file handles pages, but only exists for the sake of child theme forward compatibility.
remove_filter( 'the_content', 'wpautop' );

add_filter ( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
get_header();
?>
 <div class='content-wrap'>
    <div class="content-sidebar-wrap">
        <div class='banner-img'<?php if (has_post_thumbnail( $post->ID ) ): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );?> style="background-image: url('<?php echo $image[0]; ?>')"<?php endif; ?>></div>
        <div class="content content-part">
            <?php the_excerpt();?>
        </div>
         <?php if ( is_active_sidebar( 'certified-expert' ) ) : ?>
        <div class="sidebar">
            <?php dynamic_sidebar( 'certified-expert' ); ?>
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

//genesis();