<?php
//apraseme konstanta keliui
define('ASSETS_URL', get_template_directory_uri() . '/assets/');

//iskvieciame funkcija
add_action( 'wp_enqueue_scripts', 'adding_theme_styles_and_scripts' );
//funkcija skirta uzkrauti stiliams ir skriptams
function adding_theme_styles_and_scripts(){

  //registruojame stilius
  wp_register_style( 'reset_css', ASSETS_URL . 'css/reset.css', array(), false );
  wp_register_style( 'style_css', ASSETS_URL . 'css/style.css', array(), false );

  //registruojame javascript
  // wp_register_script( 'bootstrap_js', ASSETS_URL . 'js/vendor/bootstrap.min.js', array('jquery'), false, true);

  //uzkrauname stilius
  wp_enqueue_style( 'reset_css' );
  wp_enqueue_style( 'style_css' );

  //uzkrauname javascript
  // wp_enqueue_script( 'bootstrap_js' );
}

add_action( 'init', 'disable_admin_bar' );
//funkcija isjungiam administratoriaus eilute virsuje
function disable_admin_bar() {
  show_admin_bar(false);
}

add_action( 'init', 'adding_theme_supports' );
//funkcija ijungianti nurodytas funkcijos galimybes
function adding_theme_supports() {
  //ijungia meniu redagavimo galimybe
  add_theme_support('menus');
  add_theme_support('post-thumbnails');
}

//registruojame galimas navigaciju lokacijas
add_action('init', 'registering_navigations');
function registering_navigations() {
  register_nav_menus( array(
    'header-menu'             => __('Viršutinis meniu'),
    'footer-menu'             => __('Apatinis meniu')
  ) );
}

//pridedame reikiamus paveiksleliu dydzius
add_action('init', 'adding_theme_image_sizes');
function adding_theme_image_sizes() {
  add_image_size( 'big_image', 1920, 1000, array('center','center') );
}
