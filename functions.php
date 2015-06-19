<?php
/* 
 *	Main Functions
 * 	---------------------------------------------------------------------------
 * 	@package	: Bootstrap 3 Wordpress Theme
 *	--------------------------------------------------------------------------- */

	// remove WP version from RSS
	if( !function_exists( "rss_version" ) ) {  
	  function rss_version() { return ''; }
	}
	add_filter( 'the_generator', 'rss_version' );

	// Remove the […] in a Read More link
	if( !function_exists( "excerpt_more" ) ) {  
	  function excerpt_more( $more ) {
	    global $post;
	    return '...  <a href="'. get_permalink($post->ID) . '" class="more-link" title="Read '.get_the_title($post->ID).'">Read more <i class="fa fa-caret-right"></i></a>';
	  }
	}
	add_filter('excerpt_more', 'excerpt_more');
	/**
	 * Add default posts and comments RSS feed links to head
	*/
	add_theme_support( 'automatic-feed-links' );

	/****************************************************************************
	Post Thumbnails
	****************************************************************************/
    add_theme_support( 'post-thumbnails' );
    if ( function_exists( 'add_image_size' ) ) {
        //add_image_size( 'team', 270, 152, true );
        add_image_size( 'post', 270, 152, true );
        add_image_size( 'post-small', 100, 100, true );
        add_image_size( 'single-slider', 870, 394, true );
    }

	/**
	 * Setup the WordPress Logo
	*/

	function potw_theme_customizer( $wp_customize ) {

    $wp_customize->add_section( 'potw_logo_section' , array(
    'title'       => __( 'Logo', 'potw' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
	) );

	$wp_customize->add_setting( 'potw_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'potw_logo', array(
    'label'    => __( 'Logo', 'potw' ),
    'section'  => 'potw_logo_section',
    'settings' => 'potw_logo',
	) ) );

	}
	add_action('customize_register', 'potw_theme_customizer');

	/**
	 * Enable support for Post Formats
	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// This feature outputs HTML5 markup for the comment forms, search forms and 
	// comment lists. As of WordPress v3.6.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );

	/**
	 * Setup the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( 'custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _potw, use a find and replace
	 * to change '_potw' to the name of your theme in all the template files
	*/
	load_theme_textdomain( 'potw', get_template_directory() . '/languages' );

	register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Pacman Report' ),
	) );

	/**
 	* Register our sidebars and widgetized areas.
 	*
 	*/
	function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Post Sidebar',
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
	  	'id' 			=> 'home-sidebar',
	  	'name' 			=> 'Home Sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
		register_sidebar(array(
	  	'id' 			=> 'footer-copyright',
	  	'name' 			=> 'Footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	}
	add_action( 'widgets_init', 'arphabet_widgets_init' );

	/****************************************************************************
		Loading JS Files
		****************************************************************************/
	/**
	 * Enqueue scripts and styles
	 */
	function scripts() {

		// Import the necessary POTW Bootstrap WP CSS additions
		wp_enqueue_style( 'potw-wp', get_template_directory_uri() . '/assets/css/potw-wp.css' );

		// load bootstrap css
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

		// load Font Awesome css
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', false, '4.1.0' );

		// load potw styles
		wp_enqueue_style( 'style', get_stylesheet_uri() );

		// load bootstrap js
		wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery') );

		// load app js
		wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.js', array('jquery') );


		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// For IE8 or older, load HTML5 compatibility files
		preg_match ( '|MSIE\s([0..9]*)|', $_SERVER['HTTP_USER_AGENT'], $browser );
		if ( $browser AND $browser[1] < 9 ) {
			wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/html5/html5shiv.js', null, '3.7.0', true );
			wp_enqueue_script( 'respond', get_template_directory_uri() . '/html5/respond.min.js', null, '1.4.2', true );
		}


	}
	add_action( 'wp_enqueue_scripts', 'scripts' );

	/**
	 * Add Respond.js for IE
	 */
	if( !function_exists( 'ie_scripts' ) ) {
		function ie_scripts() {
		 	echo '<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->';
		   	echo ' <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->';
		   	echo ' <!--[if lt IE 9]>';
		    echo ' <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>';
		    echo ' <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
		   	echo ' <![endif]-->';
	   	}
	   	add_action('wp_head', 'ie_scripts');
	} // end if


	// Shortcodes
	require get_template_directory() . '/includes/shortcodes.php';

	/**
	 * Custom template tags for this theme.
	 */
	require get_template_directory() . '/includes/template-tags.php';

	/**
	 * Custom functions that act independently of the theme templates.
	 */
	require get_template_directory() . '/includes/extras.php';

	/**
	 * Customizer additions.
	 */
	require get_template_directory() . '/includes/customizer.php';

	/**
	 * Load Jetpack compatibility file.
	 */
	require get_template_directory() . '/includes/jetpack.php';

	/**
	 * Load custom WordPress nav walker.
	 */
	require get_template_directory() . '/includes/bootstrap-navmenu.php';

