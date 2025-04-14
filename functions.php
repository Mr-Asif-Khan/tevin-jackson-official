<?php
/**
 * Tevin Jackson Official functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tevin_Jackson_Official
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tevin_jackson_official_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Tevin Jackson Official, use a find and replace
		* to change 'tevin-jackson-official' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'tevin-jackson-official', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header_menu' => esc_html__( 'Primary', 'tevin-jackson-official' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'tevin_jackson_official_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'tevin_jackson_official_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tevin_jackson_official_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tevin_jackson_official_content_width', 640 );
}
add_action( 'after_setup_theme', 'tevin_jackson_official_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tevin_jackson_official_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tevin-jackson-official' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tevin-jackson-official' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tevin_jackson_official_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tevin_jackson_official_scripts() {
	wp_enqueue_style( 'tevin-jackson-official-style', get_template_directory_uri() . '/_ui/css/theme.css', array(), time() );
	wp_enqueue_style( 'tj-slick', get_template_directory_uri() . '/_ui/css/slick-min.css', array(), _S_VERSION );
	wp_style_add_data( 'tevin-jackson-official-style', 'rtl', 'replace' );

	wp_enqueue_script( 'tj-jquery', get_template_directory_uri() . '/_ui/js/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'tj-slick-js', get_template_directory_uri() . '/_ui/js/slick.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'tevin-jackson-official-navigation', get_template_directory_uri() . '/_ui/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'tevin-jackson-official-js', get_template_directory_uri() . '/_ui/js/theme.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tevin_jackson_official_scripts' );

function enqueue_chart_js() {
	wp_enqueue_script(
			'chart-js',
			'https://cdn.jsdelivr.net/npm/chart.js',
			array(),
			null,
			true
	);

	wp_enqueue_script(
			'chart-js-treemap',
			'https://cdn.jsdelivr.net/npm/chartjs-chart-treemap',
			array('chart-js'),
			null,
			true
	);

	wp_enqueue_script(
		'luxon',
		'https://cdn.jsdelivr.net/npm/luxon@3.4.3/build/global/luxon.min.js',
		array(),
		null,
		true
	);

	wp_enqueue_script(
		'chart-js-luxon-adapter',
		'https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.3.1',
		array('chart-js', 'luxon'),
		null,
		true
	);
}
add_action('wp_enqueue_scripts', 'enqueue_chart_js');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Admin.
 */
require_once get_template_directory() . '/inc/admin/class-admin-notices.php';
require_once get_template_directory() . '/inc/admin/class-acf.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function my_acf_json_save_point( $path ) {
    return get_template_directory() . '/inc/acf-json';
}
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );

function my_acf_import_json_fields() {
	if (!function_exists('acf_get_field_groups') || !function_exists('acf_import_field_group')) {
			return;
	}

	$json_path = get_template_directory() . '/inc/acf-json';
	$json_files = glob($json_path . '/*.json');

	if ($json_files) {
			$existing_groups = acf_get_field_groups();
			$existing_keys = [];

			foreach ($existing_groups as $group) {
					if (isset($group['key'])) {
							$existing_keys[$group['key']] = true;
					}
			}

			foreach ($json_files as $json_file) {
					$json_content = file_get_contents($json_file);
					$field_group = json_decode($json_content, true);

					if ($field_group && isset($field_group['key'])) {
							if (!isset($existing_keys[$field_group['key']])) {
									acf_import_field_group($field_group);
							}
					}
			}
	}
}
add_action('after_setup_theme', 'my_acf_import_json_fields');








function custom_footer_menus() {
	register_nav_menus(array(
			'footer_learn_more' => __('Footer Learn More', 'your-theme'),
			'footer_company'    => __('Footer Company', 'your-theme'),
			'footer_support'    => __('Footer Support', 'your-theme'),
			'footer_resources'  => __('Footer Resources', 'your-theme'),
	));
}
add_action('after_setup_theme', 'custom_footer_menus');

class Custom_Footer_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
			$svg_icon = '<svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792"><path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path></svg>';
			
			$output .= '<li class="footer-menu-item">';
			$output .= '<a href="' . esc_url($item->url) . '">' . $svg_icon . ' ' . esc_html($item->title) . '</a>';
			$output .= '</li>';
	}
}


// Custom Post Type Listing

function register_custom_post_type() {
	$labels = array(
			'name'               => __('Listings'),
			'singular_name'      => __('Listing'),
			'menu_name'          => __('Listings'),
			'name_admin_bar'     => __('Listing'),
			'add_new'            => __('Add New Listing'),
			'add_new_item'       => __('Add New Listing'),
			'new_item'           => __('New Listing'),
			'edit_item'          => __('Edit Listing'),
			'view_item'          => __('View Listing'),
			'all_items'          => __('All Listings'),
			'search_items'       => __('Search Listings'),
			'not_found'          => __('No Listings found'),
			'not_found_in_trash' => __('No Listings found in Trash')
	);

	$args = array(
			'labels'             => $labels,
			'public'             => true,
			'has_archive'        => true,
			'rewrite'            => array('slug' => 'listings'),
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-admin-home',
			'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields')
	);

	register_post_type('listing', $args);
}
add_action('init', 'register_custom_post_type');

function custom_listing_columns_order($columns) {
	$new_columns = [];

	$new_columns['cb'] = $columns['cb'];


	$new_columns['listing_image'] = 'Image';


	$new_columns['property_price'] = 'Price';


	$new_columns['title'] = $columns['title'];


	$new_columns['property_status'] = 'Status';


	$new_columns['agent'] = 'Agent';


	$new_columns['date'] = $columns['date'];

	return $new_columns;
}
add_filter('manage_edit-listing_columns', 'custom_listing_columns_order');

function show_featured_image_column($column, $post_id) {
	if ($column == 'listing_image') {
			$image = get_the_post_thumbnail($post_id, array(80, 120));
			echo $image ? $image : 'No Image';
	}
	if ($column == 'property_price') {
		$price = get_post_meta($post_id, 'property_price', true); 
		echo $price ? '$' . number_format($price) : 'N/A';
	}

	if ($column == 'property_status') {
			$status = get_post_meta($post_id, 'property_status', true);
			echo $status ? $status : 'N/A';
	}

	if ($column == 'agent') {
			$author_id = get_post_field('post_author', $post_id);
			$author_name = get_the_author_meta('display_name', $author_id);
			echo $author_name ? $author_name : 'N/A';
	}
}
add_action('manage_listing_posts_custom_column', 'show_featured_image_column', 10, 2);

function admin_custom_styles() {
	echo '<style>
			.column-listing_image { width: auto;}
			.column-listing_image img { max-width: 100px; height: auto; border-radius: 5px; }
	</style>';
}
add_action('admin_head', 'admin_custom_styles');

function format_phone_number($phone) {
	$phone = preg_replace('/[^0-9]/', '', $phone);
	if (strlen($phone) == 10) {
			return '('.substr($phone, 0, 3).') '.substr($phone, 3, 3).'-'.substr($phone, 6);
	}
	return $phone;
}

function load_more_listings() {
	$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
	$posts_per_page = 4;
	$offset = ($paged - 1) * $posts_per_page + 1;
	$args = array(
			'post_type'      => 'listing',
			'posts_per_page' => $posts_per_page,
			'paged'          => $paged,
			'offset'         => $offset
	);

	$query = new WP_Query($args);

	if ($query->have_posts()) :
		while ($query->have_posts()) : $query->the_post();
			get_template_part('template-parts/content', 'listing'); 
		 endwhile;
	endif;
	
	wp_reset_postdata();
	die();
}
add_action('wp_ajax_load_more_listings', 'load_more_listings');
add_action('wp_ajax_nopriv_load_more_listings', 'load_more_listings');

function render_three_listings_shortcode($atts) {
	ob_start();

	$neighborhood = isset($atts['neighborhood']) ? sanitize_text_field($atts['neighborhood']) : '';

	$args = array(
			'post_type'      => 'listing',
			'posts_per_page' => 3,
			'orderby'        => 'date',
			'order'          => 'DESC'
	);

	if (!empty($neighborhood)) {
			$args['meta_query'] = array(
					array(
							'key'     => 'property_neighborhood',
							'value'   => $neighborhood,
							'compare' => '='
					)
			);
	}

	$query = new WP_Query($args);

	if ($query->have_posts()) {
			echo '<ul class="listings-container">';
			while ($query->have_posts()) {
					$query->the_post();
					get_template_part('template-parts/content-three-listing');
			}
			echo '</ul>';
			wp_reset_postdata();
	} else {
			echo '<p>No listings found.</p>';
	}

	return ob_get_clean();
}
add_shortcode('three_listings', 'render_three_listings_shortcode');



// Passing Data into Forms 

function set_hidden_property_title($tag) {
	if ($tag['name'] !== 'property_title') {
			return $tag;
	}

	global $post;
	if (isset($post)) {
			$tag['values'] = [esc_attr($post->post_title)];
	}

	return $tag;
}
add_filter('wpcf7_form_tag', 'set_hidden_property_title', 10, 1);



// Custom Post Type Agent
function register_agents_cpt() {
	$labels = array(
			'name'               => __('Agents'),
			'singular_name'      => __('Agent'),
			'menu_name'          => __('Agents'),
			'name_admin_bar'     => __('Agent'),
			'add_new'            => __('Add New Agent'),
			'add_new_item'       => __('Add New Agent'),
			'new_item'           => __('New Agent'),
			'edit_item'          => __('Edit Agent'),
			'view_item'          => __('View Agent'),
			'all_items'          => __('All Agents'),
			'search_items'       => __('Search Agents'),
			'not_found'          => __('No Agents found'),
			'not_found_in_trash' => __('No Agents found in Trash')
	);

	$args = array(
			'labels'             => $labels,
			'public'             => true,
			'has_archive'        => 'real-estate-agents',
			'rewrite'            => array('slug' => 'real-estate-agent'),
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-businessperson',
			'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
			'show_in_rest'       => true
	);

	register_post_type('agents', $args);
}
add_action('init', 'register_agents_cpt');


function render_six_agents_shortcode($atts) {
	ob_start();

	$atts = shortcode_atts( array(
			'school'      => '',
			'neighborhood' => '',
	), $atts, 'six-agents' );

	$current_post_slug = get_post_field('post_name', get_post());

	$agents_url = home_url('/real-estate-agents/' . $current_post_slug . '/');

	$args = array(
			'post_type'      => 'agents',
			'posts_per_page' => 6,
			'orderby'        => 'date',
			'order'          => 'DESC',
	);

	$meta_query = array('relation' => 'AND');

	if (!empty($atts['neighborhood'])) {
			$neighborhood = get_page_by_path($atts['neighborhood'], OBJECT, 'neighborhoods');
			if ($neighborhood) {
					$meta_query[] = array(
							'key'     => 'agent_neighborhood', 
							'value'   => '"' . $neighborhood->ID . '"',
							'compare' => 'LIKE'
					);
			}
	}

	if (!empty($atts['school'])) {
			$school = get_page_by_path($atts['school'], OBJECT, 'schools');
			if ($school) {
				$neighborhood_id = get_field('school_neighborhood', $school->ID);
				if ($neighborhood_id) {
						$meta_query[] = array(
								'key'     => 'agent_neighborhood',
								'value'   => '"' . $neighborhood_id->ID . '"',
								'compare' => 'LIKE'
						);
				}
			}
	}

	if (count($meta_query) > 1) {
			$args['meta_query'] = $meta_query;
	}

	// Run the query
	$query = new WP_Query($args);

	if ($query->have_posts()) {
			echo '<ul class="agent-placards-results-container">';
			while ($query->have_posts()) {
					$query->the_post();
					get_template_part('template-parts/content-six-agent');
			}
			echo '</ul>';
			echo '<a href="' . esc_url($agents_url) . '" class="view-all-link-btn">See All Agents</a>';
			wp_reset_postdata();
	} else {
			echo '<p>No Agents found.</p>';
	}

	return ob_get_clean();
}
add_shortcode('six-agents', 'render_six_agents_shortcode');



function render_one_agent_shortcode($atts) {
	ob_start();

	$name = isset($atts['name']) ? sanitize_text_field($atts['name']) : '';
	$post_type = isset($atts['post_type']) ? sanitize_text_field($atts['post_type']) : 'NEIGHBORHOOD';
	$message = isset($atts['message']) ? sanitize_text_field($atts['message']) : '';

	$post_title = get_the_title();

	set_query_var('post_title', $post_title);
	set_query_var('shortcode_message', $message);
	set_query_var('shortcode_post_type', $post_type);

	$args = array(
		'post_type'      => 'agents',
		'posts_per_page' => 1,
		'orderby'        => 'date',
		'order'          => 'DESC'
	);

	if (!empty($name)) {
		$args['meta_query'] = array(
			array(
				'key'     => 'agent_name',
				'value'   => $name,
				'compare' => '='
			)
		);
	}

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		echo '<div class="sticky-wrapper">';
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/content-one-agent');
		}
		echo '</div>';
		wp_reset_postdata();
	} else {
		echo '<p>No Agent found.</p>';
	}

	return ob_get_clean();
}
add_shortcode('one-agent', 'render_one_agent_shortcode');


function custom_agent_columns_order($columns) {
	$new_columns = [];

	$new_columns['cb'] = $columns['cb'];


	$new_columns['agent_image'] = 'Image';


	$new_columns['title'] = $columns['title'];


	$new_columns['date'] = $columns['date'];

	return $new_columns;
}
add_filter('manage_edit-agents_columns', 'custom_agent_columns_order');



function show_featured_image_column_agents($column, $post_id) {
	if ($column == 'agent_image') {
			$image = get_the_post_thumbnail($post_id, array(80, 120));
			echo $image ? $image : 'No Image';
	}
}
add_action('manage_agents_posts_custom_column', 'show_featured_image_column_agents', 10, 2);


// Custom Post Type Neighborhood
function register_neighborhoods_cpt() {
	$labels = array(
			'name'               => __('Neighborhoods'),
			'singular_name'      => __('Neighborhood'),
			'menu_name'          => __('Neighborhoods'),
			'name_admin_bar'     => __('Neighborhood'),
			'add_new'            => __('Add New Neighborhood'),
			'add_new_item'       => __('Add New Neighborhood'),
			'new_item'           => __('New Neighborhood'),
			'edit_item'          => __('Edit Neighborhood'),
			'view_item'          => __('View Neighborhood'),
			'all_items'          => __('All Neighborhoods'),
			'search_items'       => __('Search Neighborhoods'),
			'not_found'          => __('No Neighborhoods found'),
			'not_found_in_trash' => __('No Neighborhoods found in Trash')
	);

	$args = array(
			'labels'             => $labels,
			'public'             => true,
			'has_archive'        => true,
			'rewrite' 					 => array('slug' => 'local-guide/neighborhoods'),
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-location-alt',
			'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
			'show_in_rest'       => true
	);

	register_post_type('neighborhoods', $args);
}
add_action('init', 'register_neighborhoods_cpt');


function custom_neighborhood_columns_order($columns) {
	$new_columns = [];

	$new_columns['cb'] = $columns['cb'];


	$new_columns['neighborhood_image'] = 'Image';


	$new_columns['title'] = $columns['title'];


	$new_columns['date'] = $columns['date'];

	return $new_columns;
}
add_filter('manage_edit-neighborhoods_columns', 'custom_neighborhood_columns_order');



function show_featured_image_column_neighborhoods($column, $post_id) {
	if ($column == 'neighborhood_image') {
			$image = get_the_post_thumbnail($post_id, array(80, 120));
			echo $image ? $image : 'No Image';
	}
}
add_action('manage_neighborhoods_posts_custom_column', 'show_featured_image_column_neighborhoods', 10, 2);




// Custom Post Type: Schools
function register_schools_cpt() {
	$labels = array(
		'name'               => __('Schools'),
		'singular_name'      => __('School'),
		'menu_name'          => __('Schools'),
		'name_admin_bar'     => __('School'),
		'add_new'            => __('Add New School'),
		'add_new_item'       => __('Add New School'),
		'new_item'           => __('New School'),
		'edit_item'          => __('Edit School'),
		'view_item'          => __('View School'),
		'all_items'          => __('All Schools'),
		'search_items'       => __('Search Schools'),
		'not_found'          => __('No Schools found'),
		'not_found_in_trash' => __('No Schools found in Trash')
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => 'schools',
		'rewrite'            => array('slug' => 'school'),
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-welcome-learn-more',
		'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
		'show_in_rest'       => true
	);

	register_post_type('schools', $args);
}
add_action('init', 'register_schools_cpt');


// Change admin columns order for Schools
function custom_schools_columns_order($columns) {
	$new_columns = [];

	$new_columns['cb'] = $columns['cb'];
	$new_columns['school_image'] = 'Image';
	$new_columns['title'] = $columns['title'];
	$new_columns['date'] = $columns['date'];

	return $new_columns;
}
add_filter('manage_edit-schools_columns', 'custom_schools_columns_order');


// Show thumbnail image in Schools admin list
function show_featured_image_column_schools($column, $post_id) {
	if ($column == 'school_image') {
		$image = get_the_post_thumbnail($post_id, array(80, 120));
		echo $image ? $image : 'No Image';
	}
}
add_action('manage_schools_posts_custom_column', 'show_featured_image_column_schools', 10, 2);



function render_three_schools_shortcode($atts) {
	ob_start();

	$atts = shortcode_atts( array(
		'neighborhood' => '',
	), $atts, 'three-schools' );

	$current_post_slug = get_post_field('post_name', get_post());
	$schools_url = home_url('/schools/' . $current_post_slug . '/');


	$args = array(
		'post_type'      => 'schools',
		'posts_per_page' => 3,
		'orderby'        => 'date',
		'order'          => 'DESC'
	);

	if (!empty($atts['neighborhood'])) {
		$neighborhood = get_page_by_path($atts['neighborhood'], OBJECT, 'neighborhoods');
		if ($neighborhood) {
			$args['meta_query'] = array(
				array(
					'key'     => 'school_neighborhood', 
					'value'   => '"' . $neighborhood->ID . '"',
					'compare' => 'LIKE'
				)
			);
		}
	}

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		echo '<ul class="listings-container">';
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/content-three-school');
		}
		echo '</ul>';
		echo '<a href="' . esc_url($schools_url) . '" class="view-all-link-btn">See All Schools</a>';
		wp_reset_postdata();
	} else {
		echo '<p>No Schools found.</p>';
	}

	return ob_get_clean();
}
add_shortcode('three_schools', 'render_three_schools_shortcode');


function custom_agents_rewrite() {
	add_rewrite_rule(
		'^real-estate-agents/([^/]*)/?$',
		'index.php?post_type=agents&agent_filter=$matches[1]',
		'top'
	);
}
add_action('init', 'custom_agents_rewrite');


function add_agent_query_var($vars) {
	$vars[] = 'agent_filter';
	return $vars;
}
add_filter('query_vars', 'add_agent_query_var');



// Custom Chart Block

function enqueue_housing_chart_blocks() {
	wp_register_script(
			'housing-chart-block',
			get_template_directory_uri() . '/blocks/housingChart/housing-chart-block.js',
			array('wp-blocks', 'wp-element', 'wp-editor'),
			false,
			true
	);
	wp_enqueue_script(
			'housing-chart-script',
			get_template_directory_uri() . '/blocks/housingChart/housing-chart.js',
			array('wp-element'),
			false,
			true
	);
	register_block_type('custom/housing-chart', array(
			'editor_script' => 'housing-chart-block',
	));
}
add_action('init', 'enqueue_housing_chart_blocks');

function enqueue_treemap_chart_blocks() {
	wp_register_script(
			'treemap-chart-block',
			get_template_directory_uri() . '/blocks/treemapChart/treemap-chart-block.js',
			array('wp-blocks', 'wp-element', 'wp-editor'),
			false,
			true
	);

	wp_enqueue_script(
			'treemap-chart-script',
			get_template_directory_uri() . '/blocks/treemapChart/treemap-chart.js',
			array('wp-element'),
			false,
			true
	);

	register_block_type('custom/treemap-chart', array(
			'editor_script' => 'treemap-chart-block',
	));
}
add_action('init', 'enqueue_treemap_chart_blocks');

function enqueue_bar_chart_blocks() {
	wp_register_script(
			'bar-chart-block',
			get_template_directory_uri() . '/blocks/barChart/bar-chart-block.js',
			array('wp-blocks', 'wp-element', 'wp-editor'),
			false,
			true
	);

	wp_enqueue_script(
			'bar-chart-script',
			get_template_directory_uri() . '/blocks/barChart/bar-chart.js',
			array('wp-element'),
			false,
			true
	);

	register_block_type('custom/bar-chart', array(
			'editor_script' => 'bar-chart-block',
	));
}
add_action('init', 'enqueue_bar_chart_blocks');

function enqueue_line_chart_blocks() {
	wp_register_script(
			'line-chart-block',
			get_template_directory_uri() . '/blocks/lineChart/line-chart-block.js',
			array('wp-blocks', 'wp-element', 'wp-editor'),
			false,
			true
	);

	wp_enqueue_script(
			'line-chart-script',
			get_template_directory_uri() . '/blocks/lineChart/line-chart.js',
			array('wp-element'),
			false,
			true
	);

	register_block_type('custom/line-chart', array(
			'editor_script' => 'line-chart-block',
	));
}
add_action('init', 'enqueue_line_chart_blocks');


function set_agents_per_page($query) {
	if (!is_admin() && $query->is_main_query() && is_post_type_archive('agents')) {
			$query->set('posts_per_page', 20);
	}
}
add_action('pre_get_posts', 'set_agents_per_page');


function set_schools_per_page($query) {
	if (!is_admin() && $query->is_main_query() && is_post_type_archive('schools')) {
			$query->set('posts_per_page', 20);
	}
}
add_action('pre_get_posts', 'set_schools_per_page');

function set_neighborhoods_per_page($query) {
	if (!is_admin() && $query->is_main_query() && is_post_type_archive('neighborhoods')) {
			$query->set('posts_per_page', 20);
	}
}
add_action('pre_get_posts', 'set_neighborhoods_per_page');

function custom_schools_rewrite() {
	if (!is_single()) {
		add_rewrite_rule(
				'^schools/([^/]*)/?$',
				'index.php?post_type=schools&school_filter=$matches[1]',
				'top'
		);
	}
}
add_action('init', 'custom_schools_rewrite');


function add_school_query_var($vars) {
	$vars[] = 'school_filter';
	return $vars;
}
add_filter('query_vars', 'add_school_query_var');




function exclude_default_posts_from_search( $query ) {
	if ( $query->is_search && !is_admin() && $query->is_main_query() ) {
			$query->set( 'post_type', array( 'listing', 'neighborhoods', 'agents', 'schools' ) );
	}
}
add_action( 'pre_get_posts', 'exclude_default_posts_from_search' );

function custom_search_query( $query ) {
	if ( $query->is_search && !is_admin() && isset($_GET['post_type']) && !empty($_GET['post_type'])) {
			$query->set( 'post_type', sanitize_text_field( $_GET['post_type'] ) );
	} elseif ( $query->is_search && !is_admin()) {
			$query->set( 'post_type', array( 'listing', 'neighborhoods', 'agents', 'schools' ) );
	}
}
add_action( 'pre_get_posts', 'custom_search_query' );