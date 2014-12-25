<?php
/**
 * This page contains the functions to make a metabox for Parallax
 *
 * @link http://mintplugins.com/doc/metabox-class/
 * @since 1.0.0
 *
 * @package    MP Stacks Parallax
 * @subpackage Functions
 *
 * @copyright   Copyright (c) 2014, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */
 
/**
 * Function which creates new Meta Box
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/metabox-class/
 * @see      MP_CORE_Metabox
 * @return   void
 */
function mp_stacks_parallax_create_meta_box(){	

	//Array which stores all info about the new metabox
	$mp_stacks_parallax_add_meta_box = array(
		'metabox_id' => 'mp_stacks_parallax_metabox', 
		'metabox_title' => __( 'Parallax Settings', 'mp_stacks'), 
		'metabox_posttype' => 'mp_brick', 
		'metabox_context' => 'side', 
		'metabox_priority' => 'low' 
	);
	
	
	//Array which stores all info about the options within the metabox
	$mp_stacks_parallax_items_array = array(
		array(
			'field_id'  => 'mp_stacks_parallax_on',
			'field_title'  =>  __('Turn Parallax On?','mp_stacks_parallax' ),
			'field_description'  => __( 'Check this if you want to use Parallax for this brick.','mp_stacks_parallax' ),
			'field_value'  => '',
			'field_type'  => 'checkbox',
		),
		array(
			'field_id'  => 'mp_stacks_parallax_bg_height',
			'field_title'  =>  __('Parallax Background Height','mp_stacks_parallax' ),
			'field_description'  => __( '<br />Recommended: Make this twice the height of your brick. ','mp_stacks_parallax' ),
			'field_value'  => '',
			'field_type'  => 'number',
		),
		array(
			'field_id'  => 'mp_stacks_parallax_speed_settings',
			'field_title'  =>  __('Speed Settings','mp_stacks_parallax' ),
			'field_description'  => __( '<br />Click to open the speed settings dialog. ','mp_stacks_parallax' ),
			'field_value'  => '',
			'field_type'  => 'showhider',
		),
		array(
			'field_id'  => 'mp_stacks_parallax_bg_speed',
			'field_title'  =>  __('Background Speed','mp_stacks_parallax' ),
			'field_description'  => __( 'Select the speed at which the background should move.<br /><br />Slowest to Fastest','mp_stacks_parallax' ),
			'field_value'  => '30',
			'field_type'  => 'input_range',
			'field_showhider'  => 'mp_stacks_parallax_speed_settings',
		),
		array(
			'field_id'  => 'mp_stacks_parallax_c1_speed',
			'field_title'  =>  __('Content-Type 1\'s Speed','mp_stacks_parallax' ),
			'field_description'  => __( 'Select the speed at which Media Type 1 should move.<br /><br />Slowest to Fastest','mp_stacks_parallax' ),
			'field_value'  => '1',
			'field_type'  => 'input_range',
			'field_showhider'  => 'mp_stacks_parallax_speed_settings',
		),
		array(
			'field_id'  => 'mp_stacks_parallax_c2_speed',
			'field_title'  =>  __('Content-Type 2\'s Speed','mp_stacks_parallax' ),
			'field_description'  => __( 'Select the speed at which Media Type 2 should move.<br /><br />Slowest to Fastest','mp_stacks_parallax' ),
			'field_value'  => '1',
			'field_type'  => 'input_range',
			'field_showhider'  => 'mp_stacks_parallax_speed_settings',
		),
		array(
			'field_id'  => 'mp_stacks_parallax_offset_settings',
			'field_title'  =>  __('Offset Settings','mp_stacks_parallax' ),
			'field_description'  => '',
			'field_value'  => '',
			'field_type'  => 'showhider',
		),
		array(
			'field_id'  => 'mp_stacks_parallax_bg_offset',
			'field_title'  =>  __('Background Offset','mp_stacks_parallax' ),
			'field_description'  => __( 'Enter the number of pixels to offset.','mp_stacks_parallax' ),
			'field_value'  => '0',
			'field_type'  => 'number',
			'field_showhider'  => 'mp_stacks_parallax_offset_settings',
		),
		array(
			'field_id'  => 'mp_stacks_parallax_c1_offset',
			'field_title'  =>  __('Content-Type 1\'s Offset','mp_stacks_parallax' ),
			'field_description'  => __( 'Enter the number of pixels to offset.','mp_stacks_parallax' ),
			'field_value'  => '0',
			'field_type'  => 'number',
			'field_showhider'  => 'mp_stacks_parallax_offset_settings',
		),
		array(
			'field_id'  => 'mp_stacks_parallax_c2_offset',
			'field_title'  =>  __('Content-Type 2\'s Offset','mp_stacks_parallax' ),
			'field_description'  => __( 'Enter the number of pixels to offset.','mp_stacks_parallax' ),
			'field_value'  => '0',
			'field_type'  => 'number',
			'field_showhider'  => 'mp_stacks_parallax_offset_settings',
		)
		
		
	);
	
	
	//Custom filter to allow for add-on plugins to hook in their own data for add_meta_box array
	$mp_stacks_parallax_add_meta_box = has_filter('mp_stacks_parallax_meta_box_array') ? apply_filters( 'mp_stacks_parallax_meta_box_array', $mp_stacks_parallax_add_meta_box) : $mp_stacks_parallax_add_meta_box;
	
	//Custom filter to allow for add on plugins to hook in their own extra fields 
	$mp_stacks_parallax_items_array = has_filter('mp_stacks_parallax_items_array') ? apply_filters( 'mp_stacks_parallax_items_array', $mp_stacks_parallax_items_array) : $mp_stacks_parallax_items_array;
	
	//Create Metabox class
	global $mp_stacks_parallax_meta_box;
	$mp_stacks_parallax_meta_box = new MP_CORE_Metabox($mp_stacks_parallax_add_meta_box, $mp_stacks_parallax_items_array);
}
add_action('mp_brick_metabox', 'mp_stacks_parallax_create_meta_box');