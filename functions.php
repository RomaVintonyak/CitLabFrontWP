<?php
// Remove wersion wp in head
remove_action('wp_head', 'wp_generator');
// remove emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
//remove br & p
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
remove_filter( 'comment_text', 'wpautop' );

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
      wp_enqueue_script( 'loadmore', get_template_directory_uri() . '/assets/js/loadmore.js', null, 1, true);
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
               'label' =>  '?????????????????? ????????????????',
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
      'name'               => '??????????????',
      'singular_name'      => '????????????',
      'add_new'            => '???????????? ????????????',
      'add_new_item'       => '??????????????????',
      'edit_item'          => '??????????????????????',
      'new_item'           => '????????',
      'view_item'          => '??????????????????????',
      'search_items'       => '??????????',
      'not_found'          => '???? ????????????????',
      'not_found_in_trash' => '???? ???????????????? ?? ????????????',
      'parent_item_colon'  => '', 
      'menu_name'          => '???????????? ??????????????', 
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
//More post
add_action('wp_ajax_loadmore', 'load_more_posts');
add_action('wp_ajax_nopriv_loadmore', 'load_more_posts');
function load_more_posts(){
      $paged = !empty($_POST['paged']) ? $_POST['paged'] : 1;
      $paged++;
      $args = array('posts_per_page' => 6, 'paged' => $paged, 'cat' => 10);
      query_posts($args);
      while (have_posts()) : the_post();
      ?>
         <div class="news__card">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="thumbnail" class="img">
            <div class="card__body">
               <h4><?php the_title(); ?></h4>
               <p>
                  <?php the_content(); ?>
               </p>
               <a href="<?php the_permalink(); ?>"><?php echo $postBtn ?></a>
            </div><!--./card__body-->
         </div><!--./news__card-->
   <?php
   endwhile;
   wp_die();
}
?>