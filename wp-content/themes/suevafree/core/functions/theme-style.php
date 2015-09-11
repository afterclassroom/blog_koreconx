<?php function suevafree_custom_css() { ?>

<style type="text/css">

<?php

/* =================== BODY STYLE =================== */

	if ( get_theme_mod('suevafree_full_image_background') == "on" )
		echo "body {  -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}"; 

/* =================== BEGIN LOGO STYLE =================== */

	$logostyle = '';
	/* Logo Font Size */
	if (suevafree_setting('suevafree_logo_font_size')) 
		$logostyle .= "font-size:".suevafree_setting('suevafree_logo_font_size').";"; 
	
	if ($logostyle)
		echo '#logo a { '.$logostyle.' } ';

	$logospanstyle = '';

	/* Logo Font Size */
	if (suevafree_setting('suevafree_logo_description_font_size')) 
		$logospanstyle .= "font-size:".suevafree_setting('suevafree_logo_description_font_size').";"; 
	
	if ($logospanstyle)
		echo '#logo a span{ '.$logospanstyle.' } ';


/* =================== END LOGO STYLE =================== */

/* =================== BEGIN NAV STYLE =================== */

	$navstyle = '';

	/* Nav  Font Size */
	if (suevafree_setting('suevafree_menu_font_size')) 
		$navstyle .= "font-size:".suevafree_setting('suevafree_menu_font_size').";"; 
	
	/* Nav  Font Color */
	if (suevafree_setting('suevafree_menu_font_color')) 
		$navstyle .= "color:".suevafree_setting('suevafree_menu_font_color').";"; 
	
	if ($navstyle)
		echo 'nav#mainmenu ul li a { '.$navstyle.' } ';
		
/* =================== END NAV STYLE =================== */

/* =================== BEGIN CONTENT STYLE =================== */

	if (suevafree_setting('suevafree_content_font_size')) 
		echo ".article p, .article li, .article address, .article dd, .article blockquote, .article td, .article th { font-size:".suevafree_setting('suevafree_content_font_size')."}"; 

/* =================== END NAV STYLE =================== */

/* =================== START TITLE STYLE =================== */

	if (suevafree_setting('suevafree_h1_font_size')) 
		echo "h1 {font-size:".suevafree_setting('suevafree_h1_font_size')."; }"; 
	if (suevafree_setting('suevafree_h2_font_size')) 
		echo "h2 { font-size:".suevafree_setting('suevafree_h2_font_size')."; }"; 
	if (suevafree_setting('suevafree_h3_font_size')) 
		echo "h3 { font-size:".suevafree_setting('suevafree_h3_font_size')."; }"; 
	if (suevafree_setting('suevafree_h4_font_size')) 
		echo "h4 { font-size:".suevafree_setting('suevafree_h4_font_size')."; }"; 
	if (suevafree_setting('suevafree_h5_font_size')) 
		echo "h5 { font-size:".suevafree_setting('suevafree_h5_font_size')."; }"; 
	if (suevafree_setting('suevafree_h6_font_size')) 
		echo "h6 { font-size:".suevafree_setting('suevafree_h6_font_size')."; }"; 


/* =================== END TITLE STYLE =================== */

	if (suevafree_setting('suevafree_custom_css_code'))
		
		echo suevafree_setting('suevafree_custom_css_code'); 

?>

</style>
    
<?php }

add_action('wp_head', 'suevafree_custom_css');

?>