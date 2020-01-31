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

if ( ! class_exists( 'Designink_Utilities_Jumpstart_Theme_Options', false ) ) {

	/**
	 * Manage the JumpStart theme options for for this plugin.
	 */
	final class Designink_Utilities_Jumpstart_Theme_Options extends Module {

		/**
		 * Entry point.
		 */
		final public static function construct() {
			if ( 'yes' === Designink_Utilities_Jumpstart_Settings::get_use_jumpstart_option() ) {
				add_filter('after_setup_theme', array(__CLASS__, '_after_setup_theme'));
				add_action('wp_enqueue_scripts', array(__CLASS__, '_wp_enqueue_scripts'), 21);
			}
		}

		/**
		 * After theme setup hook
		 */
		final public static function _after_setup_theme() {
			if ( function_exists( 'themeblvd_add_option' ) ) {
				self::add_full_width_header_option();
				self::add_fixed_mobile_header_option();
			}
		}

		/**
		 * Enqueue scripts hook
		 */
		final public static function _wp_enqueue_scripts() {
			self::enqueue_reorder_theme_styles();
		}

		/**
		 * Make sure that the stylesheets are enqueued in the correct order of preferred precedence, i.e. Parent Theme < Utilities < Child Theme
		 */
		final protected static function enqueue_reorder_theme_styles() {
			$Plugin = Designink_Utilities_Plugin::instance();
			$Plugin->enqueue_css( 'designink-utility-classes' );
			$Plugin->enqueue_css( 'designink-jumpstart-defaults' );
			$Plugin->enqueue_js( 'designink-viewport-repeat-script' );

			wp_dequeue_style( 'themeblvd-theme' );
			wp_enqueue_style( 'themeblvd-theme', esc_url( get_stylesheet_uri() ) );

			$mobile_header_is_fixed = 'fixed' === themeblvd_get_option('ds_fixed_mobile_header');

			if ( $mobile_header_is_fixed ) {
				$Plugin->enqueue_js( 'designink-mobile-header-controller' );
			}

			$header_is_full_width = 'full' === themeblvd_get_option( 'ds_full_width_header' );

			if ( $header_is_full_width ) {
				add_action( 'wp_head', array( __CLASS__, 'render_full_width_header_css' ) );
			}

		}

		/**
		 * Render the small amount of CSS to create a full-width header.
		 */
		final public static function render_full_width_header_css() {
			?>

				<style>
					.site-header {
						margin: 0;
						max-width: unset;
					}
				</style>

			<?php
		}

		/**
		 * Add the full-width header theme option.
		 */
		final protected static function add_full_width_header_option() {
			themeblvd_add_option('layout', 'header', 'ds_full_width_header', array(
				'name'      => 'Full-Width Header',
				'desc'      => 'This option will toggle whether the header is displayed in full screen or page mode.',
				'id'        => 'ds_full_width_header',
				'std'       => 'page',
				'type'      => 'radio',
				'options'   => array(
					'page' => 'Standard Header',
					'full' => 'Full-Width Header'
				)
			));
		}

		/**
		 * Add the fixed mobile header theme option.
		 */
		final protected static function add_fixed_mobile_header_option() {
			themeblvd_add_option('layout', 'header_mobile', 'ds_fixed_mobile_header', array(
				'name'      => 'Fixed Scrolling Header',
				'desc'      => 'This option will toggle the ability to display the mobile header as a fixed position element using a Digital Solutions script.',
				'id'        => 'ds_fixed_mobile_header',
				'std'       => 'static',
				'type'      => 'radio',
				'options'   => array(
					'static' => 'Static Header',
					'fixed' => 'Fixed Header'
				)
			));
		}

	}

}
