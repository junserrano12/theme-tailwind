<?php
/**
 * Classes
*/
class PlaceholderBlock {
  function __construct($name) {
    $this->name = $name;
    add_action('init', [$this, 'onInit']);
  }

  function RenderCallback($attributes, $content) {
    ob_start();
    require get_theme_file_path("/blocks/{$this->name}.php");
    return ob_get_clean();
  }

  function onInit() {
    wp_register_script($this->name, get_stylesheet_directory_uri() . "/blocks/{$this->name}.js", array('wp-blocks', 'wp-editor'));
    
    register_block_type("blocktheme/{$this->name}", array(
      'editor_script' => $this->name,
      'render_callback' => [$this, 'RenderCallback']
    ));
  }
}

new PlaceholderBlock("header");
new PlaceholderBlock("footer");


/**
 * action hook
*/

function mytheme_load_assets() {
  wp_enqueue_script('main-js', get_theme_file_uri('/build/index.js'), array(), '1.0', true);
  wp_enqueue_style('main-css', get_theme_file_uri('/build/index.css'));
}
add_action('wp_enqueue_scripts', 'mytheme_load_assets');

function mytheme_add_support() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
  add_theme_support('menus');
  // add_theme_support('wp-block-styles');
  // add_editor_style('style.css');
}
add_action('after_setup_theme', 'mytheme_add_support');


function mytheme_register_nav_menu(){
  register_nav_menus( array(
      'primary_menu' => __( 'Primary Menu' ),
      'footer_menu'  => __( 'Footer Menu' ),
  ) );
}
add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );


/**
 * Filter hook
*/
function mytheme_change_logo_class( $html ) {

    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    $html = str_replace( 'custom-logo-link', 'w-36 p-4', $html );
    $html = str_replace( 'custom-logo', 'w-full', $html );

    return $html;
}
add_filter( 'get_custom_logo', 'mytheme_change_logo_class' );

