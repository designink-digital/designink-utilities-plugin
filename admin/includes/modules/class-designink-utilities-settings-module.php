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

if ( ! class_exists( 'Designink_Utilities_Settings_Module', false ) ) {

	/**
	 * Manage the settings for for this plugin.
	 */
	final class Designink_Utilities_Settings_Module extends Module {

		/** @var \Designink\WordPress\v1_0_0\Plugin\Admin\Settings_Page $Settings_Page The Settings Page instance. */
		private $Settings_Page;

		/**
		 * Return the Settings Page.
		 * 
		 * @return \Designink\WordPress\v1_0_0\Plugin\Admin\Settings_Page The Settings Page. Passes by reference.
		 */
		final public function &get_settings_page() { return $this->Settings_Page; }

		/**
		 * Add WordPress hooks, set Settings Page instance.
		 */
		final public static function construct() {
			self::instance()->Settings_Page = new Designink_Utilities_Admin_Settings_Page();
			add_action( '_admin_menu', array( __CLASS__, '__admin_menu' ), 11 );
		}

		/**
		 * The hook for _admin_menu. 
		 */
		final public static function __admin_menu() {
			self::instance()->Settings_Page->create_temporary_sections();
		}

	}

}
