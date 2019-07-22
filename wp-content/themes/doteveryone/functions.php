<?php
/**
 * doteveryone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package doteveryone
 */

/*DON'T LOAD GUTENBURG*/
if ( function_exists( 'gutenberg_ramp_load_gutenberg' ) ) {
    gutenberg_ramp_load_gutenberg( false );
}

if ( ! function_exists( 'doteveryone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function doteveryone_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on doteveryone, use a find and replace
		 * to change 'doteveryone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'doteveryone', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'doteveryone' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'doteveryone_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'doteveryone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function doteveryone_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'doteveryone_content_width', 640 );
}
add_action( 'after_setup_theme', 'doteveryone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function doteveryone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'doteveryone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'doteveryone' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'doteveryone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function doteveryone_scripts() {
	wp_enqueue_style( 'doteveryone-style', get_stylesheet_uri() );
	wp_enqueue_script( 'doteveryone-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '20151215', true );
	wp_enqueue_script( 'doteveryone-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'doteveryone-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'doteveryone-site', get_template_directory_uri() . '/js/site.js', array(), '20151215', true );

	wp_enqueue_script( 'doteveryone-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'doteveryone_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Image Sizes

add_image_size( 'grid-third', 767, 423, true ); //300 pixels wide (and unlimited height)
add_image_size( 'banner_full', 2048, 0);
add_image_size( 'banner_full_home', 2048, 1536);

// Post types and taxos
// Register Custom Taxonomy
function register_workstreams() {

	$labels = array(
		'name'                       => _x( 'Work Streams', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Work Stream', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Work Streams', 'text_domain' ),
		'all_items'                  => __( 'All Work Streams', 'text_domain' ),
		'parent_item'                => __( 'Parent Stream', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Stream:', 'text_domain' ),
		'new_item_name'              => __( 'New Work Stream Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Work Stream', 'text_domain' ),
		'edit_item'                  => __( 'Edit Work Stream', 'text_domain' ),
		'update_item'                => __( 'Update Work Stream', 'text_domain' ),
		'view_item'                  => __( 'View Work Stream', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Work Streams', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'work',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'workstream', array( 'post', 'page', 'project' ), $args );

}
add_action( 'init', 'register_workstreams', 0 );
// Register Custom Post Type
function register_projects() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Projects', 'text_domain' ),
		'name_admin_bar'        => __( 'Project', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Projects', 'text_domain' ),
		'add_new_item'          => __( 'Add New Project', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Project', 'text_domain' ),
		'edit_item'             => __( 'Edit Project', 'text_domain' ),
		'update_item'           => __( 'Update Project', 'text_domain' ),
		'view_item'             => __( 'View Project', 'text_domain' ),
		'view_items'            => __( 'View Projects', 'text_domain' ),
		'search_items'          => __( 'Search Projects', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', 'text_domain' ),
		'items_list'            => __( 'Projects list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'text_domain' ),
		'description'           => __( 'Projects', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields',  ),
		'taxonomies'            => array( 'workstream', 'tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'register_projects', 0 );

function register_reports() {

	$labels = array(
		'name'                  => _x( 'Reports', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Report', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Reports', 'text_domain' ),
		'name_admin_bar'        => __( 'Report', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Reports', 'text_domain' ),
		'add_new_item'          => __( 'Add New Report', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Report', 'text_domain' ),
		'edit_item'             => __( 'Edit Report', 'text_domain' ),
		'update_item'           => __( 'Update Report', 'text_domain' ),
		'view_item'             => __( 'View Report', 'text_domain' ),
		'view_items'            => __( 'View Reports', 'text_domain' ),
		'search_items'          => __( 'Search Reports', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Report', 'text_domain' ),
		'items_list'            => __( 'Reports list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Report', 'text_domain' ),
		'description'           => __( 'Reports', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields',  ),
		'taxonomies'            => array(),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'report', $args );

}
add_action( 'init', 'register_reports', 0 );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

function is_child_workstream($term_id){
    $term = get_term_by('id', $term_id, 'workstream');
    if ($term->parent > 0){
        return "true";
    }
    print_r($term);
}
