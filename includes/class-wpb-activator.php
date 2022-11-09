<?php

/**
 * Fired during plugin activation
 *
 * @link       https://https://mail.google.com/mail/u/0/#inbox
 * @since      1.0.0
 *
 * @package    Wpb
 * @subpackage Wpb/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wpb
 * @subpackage Wpb/includes
 * @author     Preeti Ashtikar <preeti.ashtikar@hbwsl.com>
 */
class Wpb_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {
		global $wpdb;
		if ( $wpdb->get_var( "SHOW tables like '" . $this->wp_book_meta() . "'" ) != $this->wp_book_meta() ) {

			// dynamic generate table.
			$table_query = 'CREATE TABLE `' . $this->wp_book_meta() . "` (  
				`meta_id` bigint(20) NOT NULL AUTO_INCREMENT,  
				`book_id` bigint(20) NOT NULL DEFAULT '0',  
				`meta_key` varchar(255) DEFAULT NULL,  
				`meta_value` longtext,  
				PRIMARY KEY (`meta_id`),  
				KEY `book_id` (`book_id`),  
				KEY `meta_key` (`meta_key`)) ENGINE=InnoDB DEFAULT CHARSET=utf8";

			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $table_query );
		}
	}

	/**
	 * Description
	 */
	public function wp_book_meta() {
		global $wpdb;
		return $wpdb->prefix . 'bookmeta';
	}

}
