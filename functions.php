<?php
// Remove wersion wp in head
remove_action('wp_head', 'wp_generator');
// remove emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

add_action('after_setup_theme', 'load_citlab_theme_settings');
function load_citlab_theme_settings(){
    // Add supports
   add_theme_support('html5');
   add_theme_support('post-thumbnails');

   add_image_size('full-thumbnail', 2000, null, true);
   add_image_size('container-thumbnail', 1240, null, true);
   add_image_size('half-container-thumbnail', 620, null, true);
}
add_action('wp_enqueue_scripts', 'scriptStyle');
   function scriptStyle(){
      wp_enqueue_style( 'mainStyle', get_template_directory_uri() . '/assets/css/style.css');
      wp_deregister_script( 'jquery' );
      wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-3.4.1.min.js', null, 3, true);
      wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', null, 1, true);
   }







?>