<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://mail.google.com/mail/u/0/#inbox
 * @since      1.0.0
 *
 * @package    Wpb
 * @subpackage Wpb/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wpb
 * @subpackage Wpb/admin
 * @author     Preeti Ashtikar <preeti.ashtikar@hbwsl.com>
 */
class Wpb_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpb-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpb-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register custom post type "book"
	 */
	public function wp_book_custom_post_type_book() {

		$labels = array(
			'name'               => __( 'Books', 'wp-book' ),
			'singular_name'      => __( 'Book', 'wp-book' ),
			'menu_name'          => __( 'Books', 'wp-book' ),
			'name_admin_bar'     => __( 'Book', 'wp-book' ),
			'add_new'            => __( 'Add New', 'wp-book' ),
			'add_new_item'       => __( 'Add New Book', 'wp-book' ),
			'new_item'           => __( 'New Book', 'wp-book' ),
			'edit_item'          => __( 'Edit Book', 'wp-book' ),
			'view_item'          => __( 'View Book', 'wp-book' ),
			'all_items'          => __( 'All Books', 'wp-book' ),
			'search_items'       => __( 'Search Books', 'wp-book' ),
			'parent_item_colon'  => __( 'Parent Books:', 'wp-book' ),
			'not_found'          => __( 'No books found.', 'wp-book' ),
			'not_found_in_trash' => __( 'No books found in Trash.', 'wp-book' ),
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'wp-book' ),
			'public'             => true,
			'menu_icon'          => 'dashicons-book',
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'book' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'comments',
			),
		);

		register_post_type( 'book', $args );
	}

	/**
	 * Register custom hierarchical taxonomy  'Book Category'
	 */
	public function wp_book_custom_category() {

		$labels = array(
			'name'                       => _x( 'Book Categories', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Book Category', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Book Category', 'text_domain' ),
			'all_items'                  => __( 'All Items', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'Add Book Category', 'text_domain' ),
			'add_new_item'               => __( 'Add New Book Category', 'text_domain' ),
			'edit_item'                  => __( 'Edit Book Category', 'text_domain' ),
			'update_item'                => __( 'Update Book Category', 'text_domain' ),
			'view_item'                  => __( 'View Book Category', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);

		register_taxonomy( 'Book Category', array( 'book' ), $args );
	}


	/**
	 * Register custom non-hierarchical taxonomy 'Book Tag'
	 */
	public function wp_book_custom_tag() {

		$labels = array(
			'name'                       => _x( 'Book Tags', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Book Tag', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Book Tag', 'text_domain' ),
			'all_items'                  => __( 'All Book Tags', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'Add Book Tag', 'text_domain' ),
			'add_new_item'               => __( 'Add New Book Tag', 'text_domain' ),
			'edit_item'                  => __( 'Edit Book Tag', 'text_domain' ),
			'update_item'                => __( 'Update Book Tag', 'text_domain' ),
			'view_item'                  => __( 'View Book Tag', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Book Tag', 'text_domain' ),
			'not_found'                  => __( 'Not Book Tag Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);

		register_taxonomy( 'Book Tag', array( 'book' ), $args );
	}

	/**
	 * Register custom table 'bookmeta'
	 */
	public function register_bookmeta_table() {
		global $wpdb;
		$wpdb->bookmeta = $wpdb->prefix . 'bookmeta';
	}

	/**
	 * Add custom meta box 'Book Metabox'
	 */
	public function wp_book_custom_metabox() {
		add_meta_box( 'Book Metabox', 'Additional Information', array( $this, 'wp_book_custom_metabox_info' ), array( 'book' ), 'normal', 'high' );
	}

	/**
	 * Display Book Metabox layout.
	 *
	 * @since    1.0.0
	 * @param    object $post       Contains all information about post.
	 */
	public function wp_book_custom_metabox_info( $post ) {
		$get_book_metadata = get_metadata( 'book', $post->ID );
		if ( count( $get_book_metadata ) > 0 ) {
			$author    = $get_book_metadata['author_name'][0];
			$price     = $get_book_metadata['price'][0];
			$publisher = $get_book_metadata['publisher'][0];
			$year      = $get_book_metadata['year'][0];
			$edition   = $get_book_metadata['edition'][0];
			$url       = $get_book_metadata['url'][0];
		} else {
			$author    = '';
			$price     = '';
			$publisher = '';
			$year      = '';
			$edition   = '';
			$url       = '';
		}
		wp_nonce_field( basename( __FILE__ ), 'custom_books_info_nonce' );
		?>
		Author Name:<br><input type="text" name="author" value="<?php echo esc_attr( $author ); ?>">
		<br>Price:<br><input type="number" name="price" min="0" step="1" value="<?php echo esc_attr( $price ); ?>">
		<br>Publisher:<br><input type="text" name="publisher" value="<?php echo esc_attr( $publisher ); ?>">
		<br>Year:<br><input type="number" name="year" step="1" value="<?php echo esc_attr( $year ); ?>" />
		<br>Edition:<br><input type="number" name="edition" value="<?php echo esc_attr( $edition ); ?>">
		<br>URL:<br><input type="url" name="url" value="<?php echo esc_attr( $url ); ?>">
		<?php
	}

	/**
	 * Stores all metadata of custom post type 'Books' to custom table
	 *
	 * @since    1.0.0
	 * @param    integer $post_id       Contains Post ID.
	 * @param    object  $post          Contains all information about post.
	 */
	public function wp_book_custom_metabox_save_post( $post_id, $post ) {

		if ( ! isset( $_POST['custom_books_info_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['custom_books_info_nonce'] ) ), basename( __FILE__ ) ) ) {
			return $post_id;
		}

		$post_slug = 'book';

		if ( $post_slug != $post->post_type ) {
			return;
		}

		$author = '';
		if ( isset( $_POST['wp-book-custom-author-name'] ) ) {
			$author = sanitize_text_field( wp_unslash( $_POST['wp-book-custom-author-name'] ) );
		} else {
			$author = '';
		}

		$price = '';
		if ( isset( $_POST['wpb-custom-price'] ) ) {
			$price = sanitize_text_field( wp_unslash( $_POST['wpb-custom-price'] ) );
		} else {
			$price = '';
		}

		$publisher = '';
		if ( isset( $_POST['wpb-custom-publisher'] ) ) {
			$publisher = sanitize_text_field( wp_unslash( $_POST['wpb-custom-publisher'] ) );
		} else {
			$publisher = '';
		}

		$year = '';
		if ( isset( $_POST['wpb-custom-year'] ) ) {
			$year = sanitize_text_field( wp_unslash( $_POST['wpb-custom-year'] ) );
		} else {
			$year = '';
		}

		$edition = '';
		if ( isset( $_POST['wpb-custom-edition'] ) ) {
			$edition = sanitize_text_field( wp_unslash( $_POST['wpb-custom-edition'] ) );
		} else {
			$edition = '';
		}

		$url = '';
		if ( isset( $_POST['wpb-custom-url'] ) ) {
			$url = sanitize_text_field( wp_unslash( $_POST['wpb-custom-url'] ) );
		} else {
			$url = '';
		}

		update_metadata( 'book', $post_id, 'author_name', $author );
		update_metadata( 'book', $post_id, 'price', $price );
		update_metadata( 'book', $post_id, 'publisher', $publisher );
		update_metadata( 'book', $post_id, 'year', $year );
		update_metadata( 'book', $post_id, 'edition', $edition );
		update_metadata( 'book', $post_id, 'url', $url );

	}

	/**
	 * Add Book Settings menu
	 */
	public function wp_book_settings_submenu() {
		add_submenu_page( 'edit.php?post_type=book', 'Book Settings', 'Book Settings', 'manage_options', 'books-menu', array( $this, 'wp_book_settings' ) );
	}

	/**
	 * "Books Settings" menu callback function
	 */
	public function wp_book_settings() {
		ob_start();
		?>
		<div class="wrap">
		<?php
		if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) {
			?>
			<div class="notice notice-success"><p>Settings Saved Successfully</p></div>
			<?php
		}
		?>
			<h2>Book Settings</h2>

			<form method="post" action="options.php">
				<?php settings_fields( 'book_settings_group' ); ?>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><label for="book_currency">Currency</label></th>
							<?php $currency_option = get_option( 'book_currency' ); ?>
							<td>
								<select name="book_currency" id="book_currency" class="regular-text">
									<option value="Indian Rupees" <?php selected( $currency_option, 'Indian Rupees' ); ?> >Indian Rupees</option>
									<option value="US Dollar" <?php selected( $currency_option, 'US Dollar' ); ?> >US Dollar</option>
									<option value="UK Pound Sterling" <?php selected( $currency_option, 'UK Pound Sterling' ); ?> >UK Pound Sterling</option>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="row"><label for="book_no_pages">No. of Books (per page)</label></th>
							<td><input type="text" class="regular-text" name="book_no_pages" id="book_no_pages" placeholder="No. of Books" value="<?php echo get_option( 'book_no_pages' ); ?>"></td>
						</tr>
					</tbody>
				</table>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
		echo ob_get_clean();
	}

	/**
	 * Register the settings group for each input field
	 */
	public function register_book_settings() {
		register_setting( 'book_settings_group', 'book_currency' );
		register_setting( 'book_settings_group', 'book_no_pages' );
	}

	/**
	 * Create a custom widget for dashboard
	 */
	public function custom_dashboard_widgets() {
		global $wp_meta_boxes;
		wp_add_dashboard_widget( 'book_widget', 'Top 5 Book Categories', array( $this, 'custom_dashboard_help' ) );
	}

	/**
	 * Provides Top 5 categories of book post type based on their count
	 */
	public function custom_dashboard_help() {
		global $wpdb;
		$get_term_ids   = $wpdb->get_col( "SELECT term_id FROM `wp_term_taxonomy` WHERE taxonomy = 'Book Category' ORDER BY count DESC LIMIT 5" );
		$top_terms_name = array();
		$top_terms_slug = array();
		foreach ( $get_term_ids as $id ) {
			$get_term = $wpdb->get_row( "SELECT name, slug FROM wp_terms WHERE term_id = $id", 'ARRAY_A' );
			array_push( $top_terms_name, $get_term['name'] );
			array_push( $top_terms_slug, $get_term['slug'] );
		}
		?>
		<ol>
			<?php
			for ( $i = 0; $i < count( $top_terms_name ); $i++ ) {
				echo "<li style='font-size:15px;'> <a target='_blank' href=" . get_site_url() . "/book-category/$top_terms_slug[$i]>$top_terms_name[$i]</li>";
			}
			?>
		</ol>
		<?php
	}

}
