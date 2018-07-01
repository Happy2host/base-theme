<?php

function short_title() {
$original_title = get_the_title();
$title = html_entity_decode($original_title, ENT_QUOTES, "UTF-8");
// Set Limit
$limit = "30";
// Set End Text
$ending="...";
if(strlen($title) >= ($limit+3)) {
$title = substr($title, 0, $limit) . $ending; }
echo $title;
} 

// Creates 'Sample' post type
register_post_type('sample', array(
'label' => 'Sample',
'public' => true,
'show_ui' => true,
'capability_type' => 'post',
'hierarchical' => false,
'rewrite' => array('slug' => 'videos'),
'query_var' => true,
//Menu Icon - https://developer.wordpress.org/resource/dashicons/#twitter
'menu_icon' => '',
//Rest API
'show_in_rest' => true,
'supports' => array(
'title',
'editor',
'excerpt',
'trackbacks',
'custom-fields',
'comments',
'revisions',
'thumbnail',
'taxonomies',
'author',
'page-attributes',)

) );

add_theme_support( 'post-thumbnails', array( 'post', 'page','sample', ) ); // Add it for posts
//https://developer.wordpress.org/resource/dashicons/#warning


/*Tiny URL
<?php $turl = getTinyUrl(get_permalink($post->ID)); echo ''.$turl.''?>	
*/
function getTinyUrl($url) { 
    $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$url); 
    return $tinyurl; 
}

// Menu Function
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Limit search to only posts
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

//API Stuff
function my_custom_post_type_rest_support() {
  global $wp_post_types;
  // set the visibility
  $wp_post_types['article']->show_in_rest = true;
  /* set how you want access the custom post type 
   * /wp-json/wp/v2/article/
   * If you want change for "zxy"
   * $wp_post_types['article']->rest_base = 'zxy';
   * now your endpoint will look like this:
   * /wp-json/wp/v2/zxy
   */
  $wp_post_types['article']->rest_base = 'article';
}
add_action( 'init', 'my_custom_post_type_rest_support', 50 );
// Enable the option show in rest
add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );
// Enable the option edit in rest
add_filter( 'acf/rest_api/field_settings/edit_in_rest', '__return_true' );

//Prefill title field
function my_acf_load_value( $value, $post_id, $field ) {
    $value = get_the_title(); 
    return $value;
}
add_filter('acf/load_value/name=title', 'my_acf_load_value', 10, 3);

//Widget
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name'         => __( 'Widget' ),    
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="title">',
        'after_title' => '</div>',
    ));
//if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Widget') ) : ? ><?php endif;? 

//Woocommerce button text
  function custom_woocommerce_product_add_to_cart_text() {
  global $product;
  
  $product_type = $product->product_type;
  
  switch ( $product_type ) {
    case 'external':
      return __( 'Buy product', 'woocommerce' );
    break;
    case 'grouped':
      return __( 'View products', 'woocommerce' );
    break;
    case 'simple':
      return __( 'Add to cart', 'woocommerce' );
    break; 
    case 'variable':
      return __( 'View Item', 'woocommerce' );
    break;
    default:
      return __( 'Read more', 'woocommerce' );
  }
}

//Variation text for shopping cart
add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
add_filter( 'woocommerce_is_attribute_in_product_name', '__return_false' );


if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

function wp_load_scripts()
{
  // Load for all pages
  wp_deregister_script('jquery');
  wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-latest.min.js", false, null);
  wp_enqueue_script('jquery');

  wp_enqueue_script('flexslider', get_template_directory_uri().'/assets/js/jquery.flexslider.js', array('jquery'), '1.0', true);
  wp_enqueue_script('custom', get_template_directory_uri().'/assets/js/custom.js', array('jquery'), '1.0', true);
  wp_enqueue_script('easing', get_template_directory_uri().'/assets/js/easing.js', array('jquery'), '1.0', true);
  wp_enqueue_script('waypoints', get_template_directory_uri().'/assets/js/waypoints.min.js', array('jquery'), '1.0', true);
  wp_enqueue_script('fontawesome', get_template_directory_uri().'/assets/js/fontawesome-all.js', array('jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts', 'wp_load_scripts');
?>