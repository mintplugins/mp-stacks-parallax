<?php
/**
 * This page contains the functions to make a metabox for Parallax
 *
 * @link http://moveplugins.com/doc/metabox-class/
 * @since 1.0.0
 *
 * @package    MP Stacks Parallax
 * @subpackage Functions
 *
 * @copyright   Copyright (c) 2013, Move Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */
 
/**
 * Function which creates new Meta Box
 *
 * @since    1.0.0
 * @link     http://moveplugins.com/doc/metabox-class/
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
		'metabox_priority' => 'default' 
	);
	
	
	//Array which stores all info about the options within the metabox
	$mp_stacks_parallax_items_array = array(
		array(
			'field_id'  => 'mp_stacks_parallax_on',
			'field_title'  =>  __('Turn Parallax On?','mp_stacks_parallax' ),
			'field_description'  => __( 'Check this if you want to use Parallax for this brick','mp_stacks_parallax' ),
			'field_value'  => '',
			'field_type'  => 'checkbox',
		),
		array(
			'field_id'  => 'mp_stacks_parallax_bg_height',
			'field_title'  =>  __('Parallax Background Height','mp_stacks_parallax' ),
			'field_description'  => __( 'Recommended: Make this at least twice the height of your brick.','mp_stacks_parallax' ),
			'field_value'  => '',
			'field_type'  => 'number',
		),
		array(
			'field_id'  => 'mp_stacks_parallax_bg_speed',
			'field_title'  =>  __('Parallax Background Speed','mp_stacks_parallax' ),
			'field_description'  => __( 'Select the speed at which the background should move.','mp_stacks_parallax' ),
			'field_value'  => '',
			'field_type'  => 'select',
			'field_select_values'  => array( '.1' => 'Fast', '.5' => 'Medium', '.9' => 'Slow', '1' => 'None' ),
		),
		array(
			'field_id'  => 'mp_stacks_parallax_m1_speed',
			'field_title'  =>  __('Parallax Media Type 1\'s Speed','mp_stacks_parallax' ),
			'field_description'  => __( 'Select the speed at which Media Type 1 should move.','mp_stacks_parallax' ),
			'field_value'  => '',
			'field_type'  => 'select',
			'field_select_values'  => array( '.1' => 'Fast', '.5' => 'Medium', '.9' => 'Slow', '1' => 'None' ),
		),
		array(
			'field_id'  => 'mp_stacks_parallax_m2_speed',
			'field_title'  =>  __('Parallax Media Type 2\'s Speed','mp_stacks_parallax' ),
			'field_description'  => __( 'Select the speed at which Media Type 2 should move.','mp_stacks_parallax' ),
			'field_value'  => '',
			'field_type'  => 'select',
			'field_select_values'  => array( '.1' => 'Fast', '.5' => 'Medium', '.9' => 'Slow', '1' => 'None' ),
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
add_action('plugins_loaded', 'mp_stacks_parallax_create_meta_box');