<?php
/**
 * your_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package your_theme
 */

if ( ! function_exists( 'your_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function your_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on your_theme, use a find and replace
	 * to change 'your_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'your_theme', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'your_theme' ),
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
	add_theme_support( 'custom-background', apply_filters( 'your_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'your_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function your_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'your_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'your_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function your_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'your_theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'your_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'your_theme_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function your_theme_scripts() {
	wp_enqueue_style( 'your_theme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'maincss', get_template_directory_uri() . '/css/main.min.css', array(), '0.1', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/libs/font-awesome/css/font-awesome.min.css', array(), '0.1' );

	wp_enqueue_script( 'modernizrjs', get_template_directory_uri() . '/libs/modernizr/modernizr.js', array(), '0.1', true );

	wp_enqueue_script( 'plugins-scrolljs', get_template_directory_uri() . '/libs/plugins-scroll/plugins-scroll.js', array(), '0.1', true );
	
	wp_enqueue_script( 'respondjs', get_template_directory_uri() . '/libs/respond/respond.min.js', array(), '0.1', true );

		wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/libs/bootstrap/bootstrap.min.js', array(), '0.1', true );

	wp_enqueue_script( 'commonjs', get_template_directory_uri() . '/js/common.js', array(), '0.1', true );

	wp_enqueue_script( 'your_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'your_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'your_theme_scripts' );

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

show_admin_bar(false);

// Удаление не нужных скриптов и стилей из head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

// корректный вывод склонений к датам
function true_russian_date_forms($the_date = '') {
	if ( substr_count($the_date , '---') > 0 ) {
		return str_replace('---', '', $the_date);
	}
	// массив замен для русской локализации движка и для английской
	$replacements = array(
		"Январь" => "января", // "Jan" => "января"
		"Февраль" => "февраля", // "Feb" => "февраля"
		"Март" => "марта", // "Mar" => "марта"
		"Апрель" => "апреля", // "Apr" => "апреля"
		"Май" => "мая", // "May" => "мая"
		"Июнь" => "июня", // "Jun" => "июня"
		"Июль" => "июля", // "Jul" => "июля"
		"Август" => "августа", // "Aug" => "августа"
		"Сентябрь" => "сентября", // "Sep" => "сентября"
		"Октябрь" => "октября", // "Oct" => "октября"
		"Ноябрь" => "ноября", // "Nov" => "ноября"
		"Декабрь" => "декабря" // "Dec" => "декабря"
	);
	return strtr($the_date, $replacements);
}

// вывод общего сообщения об ошибки при не правильном вводе логина или пароля
function true_change_default_login_errors(){
	return '<strong>ОШИБКА</strong>: Вы ошиблись при вводе логина или пароля.';
}

// удаление версии wp из кода и рсс
function true_remove_wp_version_wp_head_feed() {
	return '';
}
add_filter('the_generator', 'true_remove_wp_version_wp_head_feed');

// добавление в футер админки свой текст
function true_change_admin_footer () {
	$footer_text = array(
		'Сайт разработал <a href="https://artemkomarov.ru" target="_blank">Артем Комаров</a>'
	);
	return implode( ' &bull; ', $footer_text);
}
add_filter('admin_footer_text', 'true_change_admin_footer');
/*
перенос css в футер 
function prefix_add_footer_styles() {
    wp_enqueue_style( 'maincss', get_template_directory_uri() . '/css/main.min.css', array(), '0.1', 'all' );
};
add_action( 'get_footer', 'prefix_add_footer_styles' );*/

/* Переопределяем дэфолтный jquery*/
function add_scipts() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_template_directory_uri() . '/libs/jquery/dist/jquery.min.js', array(), '2.2', true);
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'add_scipts');

/* Добавления страницы настроек для acf */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Настройка темы',
		'menu_title'	=> 'Настройка темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/* Запрет на обновление плагинов */
/* Прописать в wp-config.php:
	$DISABLE_UPDATE = array( 'Название плагина');
 */

/*
function filter_plugin_updates( $update ) {    
    global $DISABLE_UPDATE; // см. wp-config.php
    if( !is_array($DISABLE_UPDATE) || count($DISABLE_UPDATE) == 0 ){  return $update;  }
    foreach( $update->response as $name => $val ){
        foreach( $DISABLE_UPDATE as $plugin ){
            if( stripos($name,$plugin) !== false ){
                unset( $update->response[ $name ] );
            }
        }
    }
    return $update;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );
*/

class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
 
  /**
   * Display Element
   */
  function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
    $id_field = $this->db_fields['id'];
 
    if ( isset( $args[0] ) && is_object( $args[0] ) )
    {
      $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
 
    }
 
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }
 
  /**
   * Start Element
   */
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    if ( is_object($args) && !empty($args->has_children) )
    {
      $link_after = $args->link_after;
      $args->link_after = ' <b class="caret"></b>';
    }
 
    parent::start_el($output, $item, $depth, $args, $id);
 
    if ( is_object($args) && !empty($args->has_children) )
      $args->link_after = $link_after;
  }
 
  /**
   * Start Level
   */
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu list-unstyled\">\n";
  }
}

add_filter('nav_menu_link_attributes', function($atts, $item, $args) {
  if ( $args->has_children )
  {
    $atts['data-toggle'] = 'dropdown';
    $atts['class'] = 'dropdown-toggle';
  }
 
  return $atts;
}, 10, 3);