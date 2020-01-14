<?php
/**
 * DesignInk Utilities Plugin
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to answers@designinkdigital.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade the plugin to newer
 * versions in the future. If you wish to customize the plugin for your
 * needs please refer to https://designinkdigital.com
 *
 * @author    DesignInk Digital
 * @copyright Copyright (c) 2008-2020, DesignInk, LLC
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

defined( 'ABSPATH' ) or exit;

use Designink\WordPress\v1_0_0\Plugin\Module;
use Designink\WordPress\v1_0_0\Plugin\Admin\Settings_Page\Settings_Section;

if ( ! class_exists( 'Designink_Utilities_Jumpstart_Module', false ) ) {

	/**
	 * Manage the JumpStart utilities for for this plugin.
	 */
	final class Designink_Utilities_Jumpstart_Module extends Module {

		/** @var string The name of the Section registered to the Settings Page. */
		const SETTINGS_SECTION_NAME = 'use_jumpstart_module';

		/**
		 * Entry point, add hooks and stuff.
		 */
		final public static function construct() {
			add_action( '_admin_menu', array( __CLASS__, '__admin_menu' ) );
		}

		/**
		 * The _admin_menu WordPress hook.
		 */
		final public static function __admin_menu() {
			self::register_settings_option();
		}

		/**
		 * Register the Section in the Settings Page for whether or not to use this module.
		 */
		final public static function register_settings_option() {
			$section_description = 'Replace the standard floating block layout with our custom inline-block layout and WP JumpStart theme styles. '
								. 'Enables the JumpStart child theme installer and several theme options as well as injects utility scripts into the frontend.';

			self::get_settings_page()->add_section( new Settings_Section(
				self::get_settings_page(),
				self::SETTINGS_SECTION_NAME,
				array(
					'label' => __( "Enable JumpStart Features" ),
					'description' => __( $section_description ),
					'inputs' => array(
						array(
							'label' => __( "Use Custom Styles" ),
							'type' => 'checkbox',
						),
					),
				)
			) );
		}

		/**
		 * Get the option name for the value in the database on whether or not to use this module.
		 * 
		 * @return string The option name.
		 */
		final public static function get_use_jumpstart_option() {
			return get_option( sprintf( '_designink_utilities_settings_%s', self::SETTINGS_SECTION_NAME ) );
		}

		/**
		 * Get the Settings Module instance's Settings Page. Passes by reference.
		 * 
		 * return \Designink\WordPress\v1_0_0\Plugin\Admin\Settings_Page The Settings Page.
		 */
		final public static function &get_settings_page() {
			return Designink_Utilities_Settings_Module::instance()->get_settings_page();
		}

	}

}
