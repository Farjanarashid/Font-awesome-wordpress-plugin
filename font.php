<?php
/**
Plugin Name: Font Awesome WP
Plugin URI: http://freelancezonebd.com/font-awesome-plugin/
Description: This plugin is used for font awesome updated version.You can use various fonts from font awesome using shortcodes.You can use these shortcodes in your pages,posts and widgets.You can change fonts colors,size,border color,padding,hover color,hover background and so on.
Author: Farjana Rashid
Version: 1.0
Author URI: http://farjana-rashid.com
*/

function font_awesome_files_included() {
    wp_enqueue_style( 'font-awesome-css', plugins_url( '/css/font-awesome.min.css', __FILE__ ));
}
add_action('init','font_awesome_files_included');

add_filter('widget_text', 'do_shortcode');

function font_awesome_styles($atts){
	extract ( shortcode_atts ( array (
		'color' => '#555',
		'border_color' => '#555',
		'icon' => '',
		'font' => '14px',
		'width' => '12px',
		'padding' => '5px',
	), $atts, 'font') );

	return '<i style="font-size: '.$font.'; color:'.$color.';border: 1px solid '.$border_color.';padding: '.$padding.';border-radius: 50%;margin: 2px;text-align:center;width:'.$width.';height:'.$width.'"  class="fa '.$icon.'"></i>';

}
add_shortcode('font','font_awesome_styles');

function font_awesome_styles_with_link($atts){
	extract ( shortcode_atts ( array (
		'color' => '#555',
		'border_color' => '#555',
		'icon' => '',
		'font' => '14px',
		'href' => '#',
		'hover_color' => '#fff',
		'hover_bg' => '#555',
		'width' => '12px',
		'padding' => '5px',
	), $atts, 'font_link') );

	return '<a href="'.$href.'" class="font_awesome_link" style="color:'.$color.';margin: 2px;outline: medium none;text-decoration:none"><i style="text-align:center;width:'.$width.';height:'.$width.';border: 1px solid '.$border_color.';border-radius: 50%;font-size: '.$font.';padding: '.$padding.';"  class="fa '.$icon.'"></i></a><style>a.font_awesome_link:hover{color:'.$hover_color.' !important;}a.font_awesome_link:hover i{border:1px solid '.$hover_bg.' !important;background:'.$hover_bg.' }</style>';

}
add_shortcode('font_link','font_awesome_styles_with_link');
?>