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

use Designink\WordPress\v1_0_0\Plugin\Admin_Module;

defined( 'ABSPATH' ) or exit;

if ( ! class_exists( 'Designink_Utilities_Plugin_Admin', false ) ) {

	/**
	 * The admin functionality for the DesignInk Utilities Plugin.
	 * 
	 * @since 3.0.0
	 */
	final class Designink_Utilities_Plugin_Admin extends Admin_Module { }

}
