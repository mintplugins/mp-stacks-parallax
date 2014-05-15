<?php 
/**
 * Parallax Scripts and Functions
 *
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package    Mp Stacks Parallax
 * @subpackage Functions
 *
 * @copyright   Copyright (c) 2014, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */
 
/**
 * Enqueue Parallax scripts
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      wp_enqueue_script()
 * @see      wp_enqueue_style()
 * @return   void
 */
function mp_stacks_parallax_scripts(){
		
	//Scripts
	wp_enqueue_script( 'mp_stacks_parallax_scripts', plugins_url( '/js/scripts.js', dirname( __FILE__ ) ), array( 'jquery' ), false, true );
	
	//css
	wp_enqueue_style( 'mp_stacks_parallax_css', plugins_url( '/css/style.css', dirname( __FILE__ ) ), array( 'mp_stacks_style' ) );
	
}
add_action( 'wp_enqueue_scripts', 'mp_stacks_parallax_scripts');

/**
 * Filter Function which returns class name for a brick
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @param    string $classes See link for description.
 * @param    string $post_id See link for description.
 * @return   void
 */
function mp_stacks_parallax_brick_class( $classes, $post_id ){
	
	//Get Parallax On setting
	$parallax_on = get_post_meta( $post_id, 'mp_stacks_parallax_on', true );	
	
	//If parallax is on for this brick
	if (!empty( $parallax_on ) ){
		
		//Add the parallax class name to the brick
		$classes .= ' mp-brick-parallax';
		
	}
	
	//Return CSS Output
	return $classes;
	
}
add_filter( 'mp_stacks_brick_class', 'mp_stacks_parallax_brick_class', 10, 2);

/**
 * Filter Function which returns the css style lines for a brick background
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param    string $css_output See link for description.
 * @param    string $post_id See link for description.
 * @return   void
 */
function mp_stacks_parallax_brick_bg_css( $css_output, $post_id ){
	
	//Get Parallax On setting
	$parallax_on = get_post_meta( $post_id, 'mp_stacks_parallax_on', true );	
	
	//If parallax is on for this brick
	if (!empty( $parallax_on ) ){
		
		//Get parallax bg size
		$brick_bg_height = get_post_meta($post_id, 'mp_stacks_parallax_bg_height', true);
		$brick_bg_height = empty($brick_bg_height) ? '200%' : $brick_bg_height . 'px';
		
		//Add style lines to css output
		$css_output .= 'height: ' . $brick_bg_height . ';';
		
	}
			
	//Return CSS Output
	return $css_output;
	
}
add_filter( 'mp_brick_bg_css', 'mp_stacks_parallax_brick_bg_css', 10, 2);

/**
 * Filter Function which returns custom attributes for a brick.
 * We use it here to control the speed of each section in a brick
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param    string $attribute_output See link for description.
 * @param    string $post_id See link for description.
 * @return   void
 */
function mp_stacks_parallax_brick_attributes( $attribute_output, $post_id ){
	
	//Get Parallax On setting
	$parallax_on = get_post_meta( $post_id, 'mp_stacks_parallax_on', true );	
	
	//If parallax is on for this brick
	if (!empty( $parallax_on ) ){
		
		//Get parallax bg speed
		$bg_speed = get_post_meta($post_id, 'mp_stacks_parallax_bg_speed', true);
		$bg_speed = empty( $bg_speed ) ? '1' : abs($bg_speed-101)/100;
		
		//Get parallax c1 speed
		$c1_speed = get_post_meta($post_id, 'mp_stacks_parallax_c1_speed', true);
		$c1_speed = empty( $c1_speed ) ? '1' : abs($c1_speed-101)/100;
		
		//Get parallax c2 speed
		$c2_speed = get_post_meta($post_id, 'mp_stacks_parallax_c2_speed', true);
		$c2_speed = empty( $c2_speed ) ? '1' : abs($c2_speed-101)/100;
		
		//Get Background Offset setting
		$bg_offset = get_post_meta( $post_id, 'mp_stacks_parallax_bg_offset', true );	
		$bg_offset = empty( $bg_offset ) ? '0' : $bg_offset;
	
		//Get parallax c1 offset
		$c1_offset = get_post_meta($post_id, 'mp_stacks_parallax_c1_offset', true);
		$c1_offset = empty( $c1_offset ) ? '0' : $c1_offset;
		
		//Get parallax c2 offset
		$c2_offset = get_post_meta($post_id, 'mp_stacks_parallax_c2_offset', true);
		$c2_offset = empty( $c2_offset ) ? '0' : $c2_offset;
		
		//Add bg speed attribute
		$attribute_output .= ' mp_brick_parallax_bg_speed="' . $bg_speed . '" ';
		
		//Add bg speed attribute
		$attribute_output .= ' mp_brick_parallax_bg_offset="' . $bg_offset . '" ';
		
		//Add bg offset attribute
		$attribute_output .= ' mp_brick_parallax_bg_speed="' . $bg_speed . '" ';
		
		//Add c1 speed attribute
		$attribute_output .= ' mp_brick_parallax_c1_speed="' . $c1_speed . '" ';
		
		//Add c2 speed attribute
		$attribute_output .= ' mp_brick_parallax_c2_speed="' . $c2_speed . '" ';
		
		//Add c1 offset attribute
		$attribute_output .= ' mp_brick_parallax_c1_offset="' . $c1_offset . '" ';
		
		//Add c2 offset attribute
		$attribute_output .= ' mp_brick_parallax_c2_offset="' . $c2_offset . '" ';
		
	}
			
	//Return Attribute Output
	return $attribute_output;
	
}
add_filter( 'mp_stacks_extra_brick_attributes', 'mp_stacks_parallax_brick_attributes', 10, 2);

/**
 * Filter Function which returns offset settings for a brick background.
 * We use it here to control the speed of each section in a brick
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param    string $background_position See link for description.
 * @param    int $post_id See link for description.
 * @return   void
 */
function mp_stacks_parallax_background_offset_css( $background_css_output, $post_id ){
	
	//Get Background Offset setting
	$background_offset = get_post_meta( $post_id, 'mp_stacks_parallax_bg_offset', true );	
	
	//If parallax is on for this brick
	if (!empty( $background_offset ) ){
		
		$background_css_output .= 'background-position-y:' . $background_offset . 'px;';
		
	}
			
	//Return Attribute Output
	return $background_css_output;
	
}
//add_filter( 'mp_brick_bg_after_css', 'mp_stacks_parallax_background_offset_css', 10, 2);

/**
 * Filter Function which returns offset settings for a brick content type 1.
 * We use it here to control the speed of each section in a brick
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param    string $background_position See link for description.
 * @param    int $post_id See link for description.
 * @return   void
 */
function mp_stacks_parallax_c1_offset_css( $background_css_output, $post_id ){
	
	//Get Background Offset setting
	$background_offset = get_post_meta( $post_id, 'mp_stacks_parallax_bg_offset', true );	
	
	//If parallax is on for this brick
	if (!empty( $background_offset ) ){
		
		$background_css_output .= 'background-position-y:' . $background_offset . ';';
		
	}
			
	//Return Attribute Output
	return $background_css_output;
	
}
//add_filter( 'mp_brick_bg_after_css', 'mp_stacks_parallax_background_offset_css', 10, 2);



