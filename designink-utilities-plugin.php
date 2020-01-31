<?php
/**
 * Plugin Name: DesignInk Utilities Plugin
 * Plugin URI: https://designinkdigital.com/
 * Description: The complete set of custom WordPress development solutions created by DesignInk Digital.
 * Version: 3.0.1
 * Author: DesignInk Digital
 * Author URI: https://designinkdigital.com/
 * Text Domain: wporg
 * Domain Path: /languages
 * 
 * Copyright: (c) 2008-2020, DesignInk, LLC (answers@designinkdigital.com)
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @author    DesignInk Digital
 * @copyright Copyright (c) 2008-2020, DesignInk, LLC
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 * 
 */

defined( 'ABSPATH' ) or exit;

use Designink\WordPress\Framework\v1_0_1\Plugin;
use Designink\WordPress\Plugin_Update_Helper\v1_0_0\Plugin_Helper_Update_List;

// Include DesignInk's framework
require_once __DIR__ . '/vendor/designink/designink-wp-framework/index.php';

// Include the plugin update helper
require_once __DIR__ . '/vendor/designink/plugin-update-helper/index.php';

if ( ! class_exists( 'Designink_Utilities_Plugin', false ) ) {

	/**
	 * The plugin wrapper class.
	 */
	final class Designink_Utilities_Plugin extends Plugin {

		/**
		 * Plugin entry point
		 */
		final public static function construct() {
			Plugin_Helper_Update_List::add_plugin( 'designink-utilities-plugin', 'https://designinkdigital.com/' );
		}

	}

	// Start it up.
	Designink_Utilities_Plugin::instance();
}
