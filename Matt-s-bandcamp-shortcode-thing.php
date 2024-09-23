<?php
/*
 * Plugin Name:       Matt's Bandcamp Shortcode Thing
 * Plugin URI:        https://iamthedj.lordmatt.co.uk/about/matts-bandcamp-shortcode-thing/
 * Description:       The bandcamp shortcode did not work on selfhosted WordPress(.org) so I fixed that.
 * Version:           1.00.0
 * Author:            Matthew D. Brown.
 * Author URI:        https://lordmatt.co.uk/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */
add_action( 'init', 'matt_adds_custom_shortcode' );

function matt_adds_custom_shortcode() {
	add_shortcode( 'bandcamp', 'matts_bandcamp_shortcode' );
}

function matts_bandcamp_shortcode($atts,$content=null,$name){
	$atts = shortcode_atts( array(
		'width' => 350,
		'height' => 442,
		'track' => '2698499812',
		'size' => 'large',
		'bgcol' => 'ffffff',
		'linkcol' => '0687f5',
		'tracklist' => 'false'
	), $atts, $name );
	// code ref : https://developer.wordpress.org/reference/functions/add_shortcode/
	$html = '';
	$html .= "<iframe style='border: 0; width: {$atts['width']}px; height: {$atts['height']}px;'";
	$html .= "src='https://bandcamp.com/EmbeddedPlayer/track={$atts['track']}/size={$atts['size']}";
	$html .= "/bgcol={$atts['bgcol']}/linkcol={$atts['linkcol']}/tracklist={$atts['tracklist']}";
	$html .= "/transparent=true/' seamless></iframe>";
	return $html;
}