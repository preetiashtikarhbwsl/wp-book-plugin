<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://mail.google.com/mail/u/0/#inbox
 * @since             1.0.0
 * @package           Wpb
 *
 * @wordpress-plugin
 * Plugin Name:       WP Book
 * Plugin URI:        https://wpbooks.com
 * Description:       Manage functionality related to books.
 * Version:           1.0.0
 * Author:            Preeti Ashtikar
 * Author URI:        https://https://mail.google.com/mail/u/0/#inbox
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpb
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPB_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpb-activator.php
 */
function activate_wpb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpb-activator.php';
	$activator = new Wpb_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpb-deactivator.php
 */
function deactivate_wpb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpb-deactivator.php';
	$deactivator = new Wpb_Deactivator();
	$deactivator->deactivate();
}

register_activation_hook( __FILE__, 'activate_wpb' );
register_deactivation_hook( __FILE__, 'deactivate_wpb' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpb.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpb() {

	$plugin = new Wpb();
	$plugin->run();

}
run_wpb();
