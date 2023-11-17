<?php
/**
 *	EventON conditional functions
 *
 * 	@since 4.1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( !function_exists('is_event_type')){

	function is_event_type(){
		return is_tax( get_object_taxonomies( 'ajde_events' ) );
	}
}

if( !function_exists('is_event_taxonomy')){

	function is_event_taxonomy(){
		return is_tax( get_object_taxonomies( 'ajde_events' ) );
	}
}

if( !function_exists('is_event_tag')){

	function is_event_tag($term = ''){
		return is_tax( 'post_tag', $term );
	}
}
if( !function_exists('is_event')){

	function is_event($term = ''){
		return is_singular( array( 'ajde_events' ) );
	}
}

/*
 * check if the current theme support block
 * @since 4.1.2
 */
function evo_current_theme_is_fse_theme(){
	if ( function_exists( 'wp_is_block_theme' ) ) {
		return (bool) wp_is_block_theme();
	}
	if ( function_exists( 'gutenberg_is_fse_theme' ) ) {
		return (bool) gutenberg_is_fse_theme();
	}

	return false;
}

/* check if hex color is dark or white
* @since 4.2 */
function eventon_is_hex_dark($hex){
	$red = hexdec(substr($hex, 1, 2));
	$green = hexdec(substr($hex, 3, 2));
	$blue = hexdec(substr($hex, 5, 2));
	$result = (($red * 299) + ($green * 587) + ($blue * 114)) / 1000;
	echo $result;

	return $result < 128 ? true: false;

}