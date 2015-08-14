<div class="top-bar">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-xs-12 col-sm-12">
				<?php if(of_get_option('thbusiness_telephone_text','') || of_get_option('thbusiness_telephone_num','')) { 
					$tp_text = of_get_option('thbusiness_telephone_text','');
					$tp_num = of_get_option('thbusiness_telephone_num','');
					?>
					<div class="topbar-icon"><i class="fa fa-phone"></i></div><?php echo esc_attr($tp_text) . ' ' . esc_attr($tp_num) ?>
				<?php } ?>
				<?php if(of_get_option('thbusiness_email_text','') || of_get_option('thbusiness_email_add','')) { 
					$email_text = of_get_option('thbusiness_email_text','');
					$email_add = of_get_option('thbusiness_email_add','');
					?>
					<div class="topbar-icon"><i class="fa fa-envelope"></i></div><?php echo esc_attr($email_text); ?><a href="mailto:<?php echo esc_attr($email_add); ?>" target="_top"> <?php echo esc_attr($email_add); ?></a>
				<?php } ?>
				<?php if(of_get_option('thbusiness_topbar_textarea','')) {
					echo '<div class="topbar-editor">' . esc_textarea(of_get_option('thbusiness_topbar_textarea','')) . '</div>';
				} ?>
			</div>
			<div class="col-md-6 col-xs-12 col-sm-12">

			<?php
			if (of_get_option('thbusiness_social_area','1') == '1' ) : ?>
				<div class="th-social-area">
				<?php 
					$social_text = of_get_option('thbusiness_social_text',''); 
					if(!empty($social_text)) { echo '<span class="social-text">' . $social_text . '</span>'; }
				?>
				<?php if (of_get_option('facebook','')) : ?>
					<a href="<?php echo esc_url(of_get_option('facebook','')) ?>" target="_blank"><div class="th-social-icon facebook"><i class="fa fa-facebook"></i></div></a>
				<?php endif; ?>
				<?php if (of_get_option('twitter','')) : ?>
					<a href="<?php echo esc_url(of_get_option('twitter','')) ?>" target="_blank"><div class="th-social-icon twitter"><i class="fa fa-twitter"></i></div></a>
				<?php endif; ?>
				<?php if (of_get_option('googleplus','')) : ?>
					<a href="<?php echo esc_url(of_get_option('googleplus','')) ?>" target="_blank"><div class="th-social-icon googleplus"><i class="fa fa-google-plus"></i></div></a>
				<?php endif; ?>
				<?php if (of_get_option('linkedin','')) : ?>
					<a href="<?php echo esc_url(of_get_option('linkedin','')) ?>" target="_blank"><div class="th-social-icon linkedin"><i class="fa fa-linkedin"></i></div></a>
				<?php endif; ?>
				<?php if (of_get_option('youtube','')) : ?>
					<a href="<?php echo esc_url(of_get_option('youtube','')) ?>" target="_blank"><div class="th-social-icon youtube"><i class="fa fa-youtube"></i></div></a>
				<?php endif; ?>
				<?php if (of_get_option('dribbble','')) : ?>
					<a href="<?php echo esc_url(of_get_option('dribbble','')) ?>" target="_blank"><div class="th-social-icon dribbble"><i class="fa fa-dribbble"></i></div></a>
				<?php endif; ?>
				<?php if (of_get_option('github','')) : ?>
					<a href="<?php echo esc_url(of_get_option('github','')) ?>" target="_blank"><div class="th-social-icon github"><i class="fa fa-github"></i></div></a>
				<?php endif; ?>
				<?php if (of_get_option('flickr','')) : ?>
					<a href="<?php echo esc_url(of_get_option('flickr','')) ?>" target="_blank"><div class="th-social-icon flickr"><i class="fa fa-flickr"></i></div></a>
				<?php endif; ?>
				</div>
				
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>