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

if ( ! class_exists( 'Designink_Utilities_Jumpstart_Functions', false ) ) {

	/**
	 * The faux 'functions.php' file for miscellaneous items that belonged in there.
	 */
	final class Designink_Utilities_Jumpstart_Functions extends Module {

		/**
		 * Entry point.
		 */
		final public static function construct() {
			if ( 'yes' === Designink_Utilities_Jumpstart_Module::get_use_jumpstart_option() ) {
				add_filter( 'setup_theme', array( __CLASS__, '_setup_theme' ) );
			}
		}

		/**
		 * The hook that runs right before the child theme functions file.
		 */
		final public static function _setup_theme() {
			add_filter( 'themeblvd_option_id', array( __CLASS__, 'set_jumpstart_theme_option_id' ) );
			add_filter( 'embed_oembed_html', array( __CLASS__, 'youtube_add_norel_to_url' ), 10, 2 );
		}

		/**
		 * Adds rel=0 as a GET parameter to the end of embedded YouTube videos. Handy.
		 * 
		 * @param string $html The HTML with the video and link to be returned.
		 * @param string $url The URL the video is linking to.
		 * 
		 * @return string The HTML.
		 */
		final public static function youtube_add_norel_to_url( string $html, string $url ) {
			if ( strpos( $url, 'youtube' ) !== false || strpos( $url, 'youtu.be' ) !== false ) {
				// Matches /embed/anyurl and captures all GET parameters in a group.
				preg_match( '/\/embed\/[-_a-zA-Z0-9]+\?([a-zA-Z0-9|\&|=]+)/', $html, $matches, PREG_OFFSET_CAPTURE );

				// Maybe splice in rel value before the captured parameters.
				if ( $offset = $matches[1][1] ) {
					$html = substr_replace( $html, 'rel=0&', $offset, 0 );
				}
			}

			return $html;
		}

		/**
		 * Set the option id used for saving theme options. Forcing this to always be the same preserves theme options between child/parent theme changes.
		 * 
		 * @return string The theme options id.
		 */
		final public static function set_jumpstart_theme_option_id() {
			return 'digitalsolutions-jumpstart';
		}

	}

}
