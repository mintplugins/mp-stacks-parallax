<?php
/**
 * This file contains the function keeps the MP Stacks Parallax plugin up to date.
 *
 * @since 1.0.0
 *
 * @package    MP Stacks Parallax
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2013, Move Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
 * Check for updates for the MP Stacks Parallax Plugin by creating a new instance of the MP_CORE_Plugin_Updater class.
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */
 if (!function_exists('mp_stacks_parallax_update')){
	function mp_stacks_parallax_update() {
		$args = array(
			'software_name' => 'MP Stacks Parallax', //<- The exact name of this Plugin. Make sure it matches the title in your mp_stacks-parallax, parallax, and the WP.org stacks-parallax
			'software_api_url' => 'http://moveplugins.com',//The URL where Parallax and mp_stacks-parallax are installed and checked
			'software_filename' => 'mp-stacks-parallax.php',
			'software_licensed' => false, //<-Boolean
		);
		
		//Since this is a plugin, call the Plugin Updater class
		$mp_stacks_parallax_plugin_updater = new MP_CORE_Plugin_Updater($args);
	}
 }
add_action( 'init', 'mp_stacks_parallax_update' );
