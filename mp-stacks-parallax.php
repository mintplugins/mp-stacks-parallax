<?php
/*
Plugin Name: MP Stacks + Parallax
Plugin URI: http://moveplugins.com
Description: This is an addon to the mp_stacks plugin which makes your stacks scroll using a parallax effect
Version: beta1.0.0.9
Author: Move Plugins
Author URI: http://moveplugins.com
Text Domain: mp_stacks_parallax
Domain Path: languages
License: GPL2
*/

/*  Copyright 2012  Phil Johnston  (email : phil@moveplugins.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Move Plugins Core.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Move Plugins Core, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/
// Plugin version
if( !defined( 'MP_STACKS_PARALLAX_VERSION' ) )
	define( 'MP_STACKS_PARALLAX_VERSION', '1.0.0.0' );

// Plugin Folder URL
if( !defined( 'MP_STACKS_PARALLAX_PLUGIN_URL' ) )
	define( 'MP_STACKS_PARALLAX_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Plugin Folder Path
if( !defined( 'MP_STACKS_PARALLAX_PLUGIN_DIR' ) )
	define( 'MP_STACKS_PARALLAX_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Plugin Root File
if( !defined( 'MP_STACKS_PARALLAX_PLUGIN_FILE' ) )
	define( 'MP_STACKS_PARALLAX_PLUGIN_FILE', __FILE__ );

/*
|--------------------------------------------------------------------------
| GLOBALS
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| INTERNATIONALIZATION
|--------------------------------------------------------------------------
*/

function mp_stacks_parallax_textdomain() {

	// Set filter for plugin's languages directory
	$mp_stacks_parallax_lang_dir = dirname( plugin_basename( MP_STACKS_PARALLAX_PLUGIN_FILE ) ) . '/languages/';
	$mp_stacks_parallax_lang_dir = apply_filters( 'mp_stacks_parallax_languages_directory', $mp_stacks_parallax_lang_dir );


	// Traditional WordPress plugin locale filter
	$locale        = apply_filters( 'plugin_locale',  get_locale(), 'mp-stacks-parallax' );
	$mofile        = sprintf( '%1$s-%2$s.mo', 'mp-stacks-parallax', $locale );

	// Setup paths to current locale file
	$mofile_local  = $mp_stacks_parallax_lang_dir . $mofile;
	$mofile_global = WP_LANG_DIR . '/mp-stacks-parallax/' . $mofile;

	if ( file_exists( $mofile_global ) ) {
		// Look in global /wp-content/languages/mp_stacks_parallax folder
		load_textdomain( 'mp_stacks_parallax', $mofile_global );
	} elseif ( file_exists( $mofile_local ) ) {
		// Look in local /wp-content/plugins/message_bar/languages/ folder
		load_textdomain( 'mp_stacks_parallax', $mofile_local );
	} else {
		// Load the default language files
		load_plugin_textdomain( 'mp_stacks_parallax', false, $mp_stacks_parallax_lang_dir );
	}

}
add_action( 'init', 'mp_stacks_parallax_textdomain', 1 );

/*
|--------------------------------------------------------------------------
| INCLUDES
|--------------------------------------------------------------------------
*/

function mp_stacks_parallax_include_files(){
	/**
	 * If mp_core isn't active, stop and install it now
	 */
	if (!function_exists('mp_core_textdomain')){
		
		/**
		 * Include Plugin Checker
		 */
		require( MP_STACKS_PARALLAX_PLUGIN_DIR . '/includes/plugin-checker/class-plugin-checker.php' );
		
		/**
		 * Include Plugin Installer
		 */
		require( MP_STACKS_PARALLAX_PLUGIN_DIR . '/includes/plugin-checker/class-plugin-installer.php' );
		
		/**
		 * Check if wp_core in installed
		 */
		include_once( MP_STACKS_PARALLAX_PLUGIN_DIR . 'includes/plugin-checker/included-plugins/mp-core-check.php' );
		
	}
	/**
	 * If mp_core is active but mp_stacks isn't, stop and install it now
	 */
	elseif(!function_exists('mp_stacks_textdomain')){
		
		/**
		 * Check if wp_html_in_post in installed
		 */
		include_once( MP_STACKS_PARALLAX_PLUGIN_DIR . 'includes/plugin-checker/included-plugins/mp-stacks.php' );
	}
	/**
	 * Otherwise, if mp_core and mp_stacks are installed, carry out the plugin's functions
	 */
	else{
			
		/**
		 * Update script - keeps this plugin up to date
		 */
		require( MP_STACKS_PARALLAX_PLUGIN_DIR . 'includes/updater/mp-stacks-parallax-update.php' );
		
		/**
		 * Activate Parallax
		 */
		require( MP_STACKS_PARALLAX_PLUGIN_DIR . 'includes/misc-functions/parallax.php' );
		
		/**
		 *  Parallax Metabox
		 */
		require( MP_STACKS_PARALLAX_PLUGIN_DIR . 'includes/metaboxes/parallax-metabox/parallax-metabox.php' );
		
	}
}
add_action('plugins_loaded', 'mp_stacks_parallax_include_files', 9);
