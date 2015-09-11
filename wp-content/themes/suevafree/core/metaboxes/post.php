<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$suevafree_new_metaboxes = new suevafree_metaboxes ('post', array (

array( "type" => "navigation",  
       "item" => array( "setting" => __( "Setting","suevafree")),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => __( "Setting","suevafree"),
			   "type" => "title",
			  ),

		array( "name" => __( "Template","suevafree"),
			   "desc" => __( "Select a template for this page", "suevafree"),
			   "id" => "suevafree_template",
			   "type" => "select",
			   "options" => array(
				   "full" => __( "Full Width","suevafree"),
				   "left-sidebar" =>  __( "Left Sidebar","suevafree"),
				   "right-sidebar" => __( "Right Sidebar","suevafree"),
			  ),
			  ),
			  
),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>