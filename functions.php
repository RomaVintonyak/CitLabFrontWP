<?php
// Remove wersion wp in head
remove_action('wp_head', 'wp_generator');
// remove emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

add_action('after_setup_theme', 'load_citlab_theme_settings');
add_action('after_setup_theme', 'regMenu');
function load_citlab_theme_settings(){
    // Add supports
   add_theme_support('html5');
   add_theme_support('post-thumbnails');

   add_image_size('full-thumbnail', 2000, null, true);
   add_image_size('container-thumbnail', 1240, null, true);
   add_image_size('half-container-thumbnail', 620, null, true);
}
//register nav menu
function regMenu(){
      register_nav_menu('primary', 'PrimaryMenu');
}
//main menu filter
add_filter('nav_menu_item_id', '__return_false');
add_filter( 'nav_menu_css_class', '__return_empty_array' );
add_filter('nav_menu_css_class', 'ClassToLI', 10, 4);
function ClassToLI($classes, $item, $args, $depth){
      if ($args->theme_location == 'primary') {
         $classes [] = 'menu__list--item';
      }
      return $classes;
}
add_filter( 'nav_menu_link_attributes', 'ClassToLInks', 10, 4 );
function ClassToLInks( $atts, $item, $args, $depth ) {
	if($args->theme_location == 'primary') {
		$class = 'menu__list--link';
		$atts['class'] = isset( $atts['class'] ) ? "{$atts['class']} $class" : $class;
	}
	return $atts;
}
//script & styles conect
add_action('wp_enqueue_scripts', 'scriptStyle');
   function scriptStyle(){
      wp_enqueue_style( 'mainStyle', get_template_directory_uri() . '/assets/css/style.css');
      wp_deregister_script( 'jquery' );
      wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-3.4.1.min.js', null, 3, true);
      wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', null, 1, true);
   }

// Add acf option page
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {
      acf_add_options_page(array(
         'page_title' => 'Theme Options',
         'menu_title' => 'Theme Options',
         'menu_slug' => 'theme-general-settings',
         'capability' => 'edit_posts',
      ));
}
//Register post types
add_action( 'init', 'register_custom_post_types' );
function register_custom_post_types(){

      //Register taxonomy
      register_taxonomy(
         'process',
         'process',
         array(
               'label' =>  'Категорії процесів',
               'hierarchical'               => true,
               'public'                     => true,
               'show_ui'                    => true,
               'show_admin_column'          => true,
               'show_in_nav_menus'          => true,
               'show_in_rest'               => null,
               'rewrite' => array(
               'slug' => 'process',
               'with_front' => false
            )
         )
      );
         
      $labels = array(
      'name'               => 'Процеси',
      'singular_name'      => 'Процес',
      'add_new'            => 'Додати процес',
      'add_new_item'       => 'Додавання',
      'edit_item'          => 'Редагування',
      'new_item'           => 'Нове',
      'view_item'          => 'Переглянути',
      'search_items'       => 'Пошук',
      'not_found'          => 'Не знайдено',
      'not_found_in_trash' => 'Не знайдено у кошику',
      'parent_item_colon'  => '', 
      'menu_name'          => 'Судові Процеси', 
   );

   $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 2,
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'has_archive' => false,
      'hierarchical' => false,
      'menu_icon' => 'dashicons-welcome-learn-more',
      'description' => "('Process', 'citLab')",
      'show_in_rest' => false,
      'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
      
   );
   register_post_type('process', $args);
}
?>