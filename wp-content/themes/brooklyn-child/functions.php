<?php
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
function my_custom_add_to_cart_redirect( $url ) {
  $url = WC()->cart->get_checkout_url(); // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
  // $url = wc_get_checkout_url(); // since WC 2.5.0
  return $url;
}
add_filter( 'woocommerce_add_to_cart_redirect', 'my_custom_add_to_cart_redirect' );
// put this in functions.php, it will produce code before the form
add_action('woocommerce_before_checkout_form','show_cart_summary',9);

// gets the cart template and outputs it before the form
function show_cart_summary( ) {
  wc_get_template_part( 'cart/cart' );
}

function my_theme_scripts() {    
    wp_enqueue_style( 'webfonts-css', get_stylesheet_directory_uri().'/assets/webfonts/webfonts.css' );
    wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri().'/assets/css/slick-theme.css' );
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri().'/assets/css/slick.css' );

    if(is_page( 36682 ) || is_page(37644) || is_page(32679) || is_page(39350) || is_page(36707) || is_page(39348) || is_page(39695) || is_page(32678) || is_page(37383) || is_page(39349) || is_page(37621) ||is_page(37559) ){
        wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri().'/assets/css/bootstrap.min.css' );
        wp_enqueue_style( 'main-css', get_stylesheet_directory_uri().'/assets/css/main.css', array(), '0.1.0', 'all' );

    } else {
        wp_enqueue_style( 'bootstrapold-css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css' );
        wp_enqueue_style( 'oldstyle-css', get_stylesheet_directory_uri().'/oldstyle.css' );

    }

    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri().'/assets/js/slick.min.js', array( 'jquery' ), '1.0.1', true );
    wp_enqueue_script( 'main-js', get_stylesheet_directory_uri().'/assets/js/main.js', array( 'jquery' ), '1.0.1', true );

    /**
     * Check if WooCommerce is activated
     */
    if ( function_exists( 'is_woocommerce_activated' ) && is_product() ){
        wp_enqueue_script( 'singleproductpage-js', get_stylesheet_directory_uri().'/js/singleproductpage.js', array( 'jquery' ), '1.0.1', true );
    }

    if ( function_exists( 'is_woocommerce_activated' ) && is_checkout() ){
        wp_enqueue_script( 'checkoutpage-js', get_stylesheet_directory_uri().'/js/checkoutpage.js', array( 'jquery' ), '1.0.0', true );
    }
}

add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );



add_filter( 'woocommerce_variation_option_name', 'display_price_in_variation_option_name' );

function display_price_in_variation_option_name( $term ) {
    global $wpdb, $product;

    $result = $wpdb->get_col( "SELECT slug FROM {$wpdb->prefix}terms WHERE name = '$term'" );

    $term_slug = ( !empty( $result ) ) ? $result[0] : $term;


    $query = "SELECT postmeta.post_id AS product_id
                FROM {$wpdb->prefix}postmeta AS postmeta
                    LEFT JOIN {$wpdb->prefix}posts AS products ON ( products.ID = postmeta.post_id )
                WHERE postmeta.meta_key LIKE 'attribute_%'
                    AND postmeta.meta_value = '$term_slug'
                    AND products.post_parent = $product->id";

    $variation_id = $wpdb->get_col( $query );

    $parent = wp_get_post_parent_id( $variation_id[0] );

    if ( $parent > 0 ) {
        $_product = new WC_Product_Variation( $variation_id[0] );
        return $term . '<div style="display:none">(' . woocommerce_price( $_product->get_price() ) . ')</div>';
    }
    return $term;

}
//custom post type for in the media section
function my_custom_post_types() {
    $labels = array(
        'name'               => 'In The Media',
        'singular_name'      => 'In The Media',
        'menu_name'          => 'In The Media',
        'name_admin_bar'     => 'In The Media',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New',
        'new_item'           => 'New',
        'edit_item'          => 'Edit',
        'view_item'          => 'View',
        'all_items'          => 'All',
        'search_items'       => 'Search',
        'parent_item_colon'  => 'Parent:',
        'not_found'          => 'Not found.',
        'not_found_in_trash' => 'Not found in Trash.'
    );

    $args = array( 
        'public'      => true, 
        'labels'      => $labels,
        'description' => 'published using this post type',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
        register_post_type( 'inthemedia', $args );
}
add_action( 'init', 'my_custom_post_types' );
//taxonomy 
add_action( 'init', 'create_medialanguage_taxonomy' );

function create_medialanguage_taxonomy() {
    $labels = array(
        'name'                           => 'Language Types',
        'singular_name'                  => 'Language Type',
        'search_items'                   => 'Search Language Type',
        'all_items'                      => 'All Language Types',
        'edit_item'                      => 'Edit Language Type',
        'update_item'                    => 'Update',
        'add_new_item'                   => 'Add New',
        'new_item_name'                  => 'New Language Type',
        'menu_name'                      => 'Language Types',
        'view_item'                      => 'View',
        'popular_items'                  => 'Popular',
        'separate_items_with_commas'     => 'Separate Language Type with commas',
        'add_or_remove_items'            => 'Add or remove Language Types',
        'choose_from_most_used'          => 'Choose from the most used Language Types',
        'not_found'                      => 'No Language Types found'
    );

    register_taxonomy(
        'language-types',
        'inthemedia',
        array(
            'label' => __( 'Language Types' ),
            'hierarchical' => true,
            'labels' => $labels,
            'public' => true,
            'show_in_nav_menus' => false,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'language-types'
            )
        )
    );
    
    $categories = array(
        'name'                           => 'Category Types',
        'singular_name'                  => 'Category Type',
        'search_items'                   => 'Search Category Type',
        'all_items'                      => 'All Category Types',
        'edit_item'                      => 'Edit Category Type',
        'update_item'                    => 'Update',
        'add_new_item'                   => 'Add New',
        'new_item_name'                  => 'New Category Type',
        'menu_name'                      => 'Category Types',
        'view_item'                      => 'View',
        'popular_items'                  => 'Popular',
        'separate_items_with_commas'     => 'Separate Category Type with commas',
        'add_or_remove_items'            => 'Add or remove Category Types',
        'choose_from_most_used'          => 'Choose from the most used Category Types',
        'not_found'                      => 'No Category Types found',
    );

    register_taxonomy(
        'category-media',
        'inthemedia',
        array(
            'label' => __( 'Category Types' ),
            'hierarchical' => true,
            'labels' => $categories,
            'public' => true,
            'show_in_nav_menus' => false,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'category-media'
            )
        )
    );
}
//custom post type for in the testimonials
function testimonials_post_types() {
    $labels = array(
        'name'               => 'Testimonials',
        'singular_name'      => 'Testimonial',
        'menu_name'          => 'Testimonials',
        'name_admin_bar'     => 'Testimonials',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New',
        'new_item'           => 'New',
        'edit_item'          => 'Edit',
        'view_item'          => 'View',
        'all_items'          => 'All',
        'search_items'       => 'Search',
        'parent_item_colon'  => 'Parent:',
        'not_found'          => 'Not found.',
        'not_found_in_trash' => 'Not found in Trash.'
    );

    $args = array( 
        'public'      => true, 
        'labels'      => $labels,
        'description' => 'published using this post type',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
        register_post_type( 'testimonials', $args );
}
add_action( 'init', 'testimonials_post_types' );
//taxonomy for testimonials
add_action( 'init', 'create_testimonials_taxonomy' );

function create_testimonials_taxonomy() {
    $labels = array(
        'name'                           => 'Testimonials Language Types',
        'singular_name'                  => 'Testimonial Language Type',
        'search_items'                   => 'Search Language Type',
        'all_items'                      => 'All Language Types',
        'edit_item'                      => 'Edit Language Type',
        'update_item'                    => 'Update',
        'add_new_item'                   => 'Add New',
        'new_item_name'                  => 'New Language Type',
        'menu_name'                      => 'Language Types',
        'view_item'                      => 'View',
        'popular_items'                  => 'Popular',
        'separate_items_with_commas'     => 'Separate Language Type with commas',
        'add_or_remove_items'            => 'Add or remove Language Types',
        'choose_from_most_used'          => 'Choose from the most used Language Types',
        'not_found'                      => 'No Language Types found'
    );

    register_taxonomy(
        'testimonial-language-types',
        'testimonials',
        array(
            'label' => __( 'Testimonials Language Types' ),
            'hierarchical' => true,
            'labels' => $labels,
            'public' => true,
            'show_in_nav_menus' => false,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'testimonials-language-types'
            )
        )
    );
}
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Single Product Settings',
        'menu_title'    => 'Single Product Settings',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Banner Settings',
        'menu_title'    => 'Banner Settings',
        'parent_slug'   => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Reviews',
        'menu_title'    => 'Reviews',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Checkout Settings',
    //     'menu_title'    => 'Checkout Settings',
    //     'parent_slug'   => 'theme-general-settings',
    // ));
    
}
// code for site redirect based on condition
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if($actual_link == 'https://storyterrace.com/'){
        $dlang =  ICL_LANGUAGE_CODE;
        if($dlang == 'nl' || $dlang == 'en-GB'){

         } else {  
         $country_code = $_SERVER["HTTP_CF_IPCOUNTRY"];
         if($country_code == "NL"){
            header('Location: https://storyterrace.com/nl/');
            exit();
         } 
        //whether ip is from share internet
        // if (!empty($_SERVER['HTTP_CLIENT_IP']))   
        //   {
        //     $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        //   }
        // //whether ip is from proxy
        // elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
        //   {
        //     $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        //   }
        // //whether ip is from remote address
        // else
        //   {
        //     $ip_address = $_SERVER['REMOTE_ADDR'];
        //   }
        //   $res = file_get_contents('https://www.iplocate.io/api/lookup/'.$ip_address);
        //   $res = json_decode($res);
        //   echo $res->country;
        //     if($res->country == 'Netherlands' && $res->continent == 'Europe'){
        //          header('Location: https://storyterrace.com/nl/');
        //          exit();
              
        //     }
        }
}
// $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// if($actual_link == 'https://storyterrace.com/'){
//         $dlang =  ICL_LANGUAGE_CODE;
//         if($dlang == 'nl' || $dlang == 'en-GB'){

//          } else {   
//         //whether ip is from share internet
//         if (!empty($_SERVER['HTTP_CLIENT_IP']))   
//           {
//             $ip_address = $_SERVER['HTTP_CLIENT_IP'];
//           }
//         //whether ip is from proxy
//         elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
//           {
//             $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
//           }
//         //whether ip is from remote address
//         else
//           {
//             $ip_address = $_SERVER['REMOTE_ADDR'];
//           }
//           $res = file_get_contents('https://www.iplocate.io/api/lookup/'.$ip_address);
//           $res = json_decode($res);
//             if($res->country == 'Netherlands' && $res->continent == 'Europe'){
//                  header('Location: https://storyterrace.com/nl/');
//                  exit();
              
//             }elseif($res->country != 'Netherlands' && $res->continent == 'Europe'){
//                  header('Location: https://storyterrace.com/en-GB/');
//                  exit();
//             } else {
                
//             }
//         }
// } else {
//     //echo 'nothing';
// }


add_action( 'wp_enqueue_scripts', 'crunchify_disable_woocommerce_loading_css_js' );
 
function crunchify_disable_woocommerce_loading_css_js() {
    // Check if WooCommerce plugin is active
    if( function_exists( 'is_woocommerce' ) ){
 
        // Check if it's any of WooCommerce page
        if(is_home() || is_front_page()) {         
          
            ## Dequeue WooCommerce styles
            wp_dequeue_style('woocommerce-layout'); 
            wp_dequeue_style('woocommerce-general'); 
            wp_dequeue_style('woocommerce-smallscreen');    
            wp_dequeue_style('woocommerce-inline-inline');    
 
            ## Dequeue WooCommerce scripts
            wp_dequeue_script('wc-cart-fragments');
            wp_dequeue_script('woocommerce'); 
            wp_dequeue_script('wc-add-to-cart'); 
        
            wp_deregister_script( 'js-cookie' );
            wp_dequeue_script( 'js-cookie' );
 
        }
    }   
}

function link_words( $text ) { //ToDo: use Search Regexp
    $replace = array(
        'Critically Acclaimed' => 'Premium',
    );
    $text = str_replace( array_keys($replace), $replace, $text );
    return $text;
}
add_filter( 'the_content', 'link_words' );
add_filter( 'the_excerpt', 'link_words' );