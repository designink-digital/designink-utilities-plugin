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

use Designink\WordPress\Framework\v1_0_1\Module;

if ( ! class_exists( 'Designink_Utilities_Gdpr_Plugin_Manager', false ) ) {

	/**
	 * A module for managing how we want the GDPR plugin to look and act.
	 */
	class Designink_Utilities_Gdpr_Plugin_Manager extends Module {

		/**
		 * Entry point.
		 */
		final public static function construct() {
			add_action( 'wp_enqueue_scripts', array( __CLASS__, '_wp_enqueue_scripts' ) );
		}

		/**
		 * Enqueue scripts hook.
		 */
		final public static function _wp_enqueue_scripts() {
			$Plugin = Designink_Utilities_Plugin::instance();
			$Plugin->enqueue_css( 'designink-gdpr-consent' );
			$Plugin->enqueue_js( 'designink-gdpr-consent' );
		}

	}

}
