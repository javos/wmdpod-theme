<?php

require_once dirname( __FILE__ ) . '/vendor/tgmpa/tgm-plugin-activation/class-tgm-plugin-activation.php';
add_action('tgmpa_register','pre_kickstart_register_required_plugins');

function pre_kickstart_register_required_plugins() {

	// Hier werden die für dieses Theme notwendigen Plugins definiert:
	$plugins = array(

		
	);

	// Hier wird TGMPA selbst konfiguriert:
	$config = array(
		'id' => 'prefect-tgmpa',
		'default_path' => '',
		'menu' => 'tgmpa-install-plugins',
		'parent_slug' => 'themes.php',
		'capabilities' => 'edit_theme_options',
		'has_notices' => true,
		'dismissable' => true,
		'dismiss_msg' => '',
		'is_automatic' => true,
		'message' => '',
	);

	tgmpa($plugins,$config);
}



/* ========================================
 * 1. THEME SETUP
 *
 * Wird bei jedem Seitenaufruf ausgeführt, nachdem das Theme intialisiert wurde
 *
 * Da zu diesem Zeitpunkt der Initialisierung der Seite noch keine Authentifizierung
 * des Nutzers statt fand, sollten hier keine inhaltlichen Einstellungen geladen werden.
 * Hier sollten nur Theme-Funktionen aktiviert und technische Basis-Einstellungen version
 * Wordpress vorgenommen werden.
 *
 * ======================================== */

add_action('after_setup_theme', 'pre_kickstart_after_setup_theme');
function pre_kickstart_after_setup_theme() {

	// ------------------------------------
	//
	// Allgemeines Setup
	//
	// ------------------------------------

	//
	// WordPress-Einstellungen überschreiben
	//
	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );

	//
 	// Überflüssiges aus dem Header löschen
	//
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

	//
 	// Theme-Funktionen aktivieren
	//
	add_theme_support('editor-style');
	add_theme_support('post-formats');
	add_theme_support('post-thumbnails');
	add_theme_support('menus');
	add_theme_support('html5', [
		'search-form',
		'gallery',
		'caption',
	]);
	add_theme_support( 'title-tag' );
}





/* ========================================
 * 2. INIT
 *
 *	Wird immer ausgeführt, bevor die Admin-
 * Seiten geladen werden.
 *
 * In dieser Hook sollten alle Basis-Einstellungen für Wordpress gemacht werden,
 * die sich auf Inhalte beziehen (z.B. Registrierung der Menüs, Custom Post Types, etc)
 *
 * ======================================== */

add_action( 'init', 'pre_kickstart_init' );
function pre_kickstart_init() {

	// ------------------------------------
	//
	// Bilder-Setup
	//
	// ------------------------------------

	//
	// SVGs als Upload und Preview-Bilder in der Mediathek zulassen
	//
	function custom_mtypes( $m ){
		$m['svg'] = 'image/svg+xml';
		$m['svgz'] = 'image/svg+xml';
		return $m;
	}
	add_filter( 'upload_mimes', 'custom_mtypes' );

	//
	// Eigene Bild-Größen
	//

	// Beispiel: add_image_size( 'headpic', 1200, 700, false );
	add_image_size( 'wmdpod_episode_header_pic', 980, 400, false );
	add_image_size( 'wmdpod_profile_pic', 330, 330, false );
	add_image_size( 'vd_shadow_pic_max', 1200, false, false );


	// ------------------------------------
	//
	// Menü-Setup
	//
	// ------------------------------------

	//
	// Menüs registrieren
	//
	register_nav_menus(array(
		'primary' => 'Hauptmenü',
		'footer' => 'Footer-Menü',
		'top' => 'Top-Menü',
	));



	// ------------------------------------
	//
	// Custom Post Types
	//
	// ------------------------------------

	// [Hier werden Custom Post Types initialisiert]

}







/* ========================================
 * 3. ADMIN INIT
 *
 *	Wird immer ausgeführt, bevor die Admin-
 * Seiten geladen werden
 * ======================================== */

add_action( 'admin_init', 'pre_kickstart_admin_init' );
function pre_kickstart_admin_init() {

	//
	// Eigenes Stylesheet für das Backend einbinden
	//
	add_editor_style('dist/css/backend.css');

}



/* ========================================
 * 4. STYLES & SKRIPTE
 *
 *	Einbindung von CSS, JS, etc.
 * ======================================== */

 //
 // Stylesheets und JavaScripte einbinden
 //
 add_action( 'wp_enqueue_scripts', 'pre_kickstart_enqueue_scripts' );
 function pre_kickstart_enqueue_scripts() {
	 if (!is_admin()) {
		 // Skripts für das Frontend:

		 // Standard jQuery für das Front End deaktivieren
		 wp_deregister_script('jquery');

		 // Kombinierte Projekt-JS-Datei einbinden
		 wp_register_script('pre-kickstart-scripts', get_template_directory_uri() . '/dist/scripts/scripts.js', false, false, true);
		 wp_enqueue_script('pre-kickstart-scripts');
	 }
	 else {
		 // Skripts für das Backend:
	 }
 }

 add_action( 'wp_enqueue_scripts', 'pre_kickstart_enqueue_styles' );
 function pre_kickstart_enqueue_styles() {
	 if (!is_admin()) {
		 // Styles für das Frontend:
		 wp_register_style('pre_kickstart-style', get_template_directory_uri() . '/dist/styles/styles.css');
		 wp_enqueue_style('pre_kickstart-style');
	 }
	 else {
		 // Skripts für das Backend:
	 }
 }



/* ========================================
 * 5. Hacks & Tricks
 *
 * Hier werden nützliche Hacks und Tricks geladen,
 * die in keinen anderen Hook passen
 * ======================================== */

//
// Direktlinks auf Attachment auf die Startseite weiterleiten
//
add_action( 'template_redirect', 'pre_kickstart_redirect_post' );
function pre_kickstart_redirect_post() {
	$queried_post_type = get_query_var('post_type');
	if ( 'attachment' ==  $queried_post_type ) {
		wp_redirect( home_url(), 301 );
		exit;
	}
}

//
// Unnötige Links aus der Admin Bar entfernen
//
add_action( 'wp_before_admin_bar_render', 'pre_kickstart_remove_customize_link' );
function pre_kickstart_remove_customize_link() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('customize');
	$wp_admin_bar->remove_menu('comments');
}


function vd_locate_template($template_path) {
	$template = locate_template($template_path.".php");
	if ($template) {
		include $template;
	}
}



 /* ========================================
  * 5. Weitere Hooks
  *
  * Alles was nicht in die anderen Hooks passt,
  * kommt an diese Stelle
  * ======================================== */

function register_acf_options_pages() {

    // Check function exists.
    if( !function_exists('acf_add_options_page') )
        return;

    // register options page.
    $option_page = acf_add_options_page(array(
        'page_title'    => __('JVD Settings'),
        'menu_title'    => __('JVD Settings'),
        'menu_slug'     => 'justvondan-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// Hook into acf initialization.
add_action('acf/init', 'register_acf_options_pages');



function my_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
	}
}

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		acf_register_block(array(
			'name'				=> 'wmdpod-profilecard',
			'title'				=> __('WMDPOD Profile Card'),
			'description'		=> __('Divider'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> '',
			// 'keywords'			=> array( 'music', 'player' ),
		));

		acf_register_block(array(
			'name'				=> 'wmdpod-postlist',
			'title'				=> __('WMDPOD Post List'),
			'description'		=> __('Divider'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> '',
			// 'keywords'			=> array( 'music', 'player' ),
		));

		acf_register_block(array(
			'name'				=> 'vd-title',
			'title'				=> __('VD Title'),
			'description'		=> __('Formatting'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> '',
			// 'keywords'			=> array( 'music', 'player' ),
		));

		acf_register_block(array(
			'name'				=> 'vd-shadowpic',
			'title'				=> __('VD Shadow Pic'),
			'description'		=> __('Formatting'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> '',
			// 'keywords'			=> array( 'music', 'player' ),
		));
	}
}


function jvd_register_post_types() {

	
	register_post_type( 'profile',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Profiles' ),
                'singular_name' => __( 'Profile' )
			),
            'public' => false,
            'has_archive' => false,
			'show_in_rest' => false,
			'hierarchical' => false,
			'show_in_menu' => true,
			'show_ui' => true,
			// 'taxonomies' => array('portfolio-category'),
			'supports' => array('title','editor','thumbnail')
        )
	);
	
	register_taxonomy(
		'portfolio-category',
		'portfolio',
        array(
			'hierarchical' => true,
            'label' => __( 'Portfolio-Kategorie' ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'jvd_register_post_types' );