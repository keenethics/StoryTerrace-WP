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
    wp_dequeue_style( 'main-font-face' );
    wp_dequeue_style( 'ut-fontawesome' );       

    wp_enqueue_style( 'webfonts-css', get_stylesheet_directory_uri().'/assets/webfonts/webfonts.css' );
    wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri().'/assets/css/slick-theme.css' );
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri().'/assets/css/slick.css' );

    if (is_home() || is_front_page()) {
        wp_enqueue_style( 'bootstrap-custom-css', get_stylesheet_directory_uri().'/assets/css/bootstrap-custom.css' );
        wp_enqueue_style( 'main-css', get_stylesheet_directory_uri().'/assets/css/main.css', array(), '0.1.0', 'all' );

        // dequeue parent theme styles 
        wp_dequeue_style( 'ut-flexslider' );
        wp_dequeue_style( 'ut-prettyphoto' );
        wp_dequeue_style( 'ut-superfish' );
        wp_dequeue_style( 'ut-animate' );

        wp_dequeue_script( 'unitedthemes-init' );
        wp_dequeue_script( 'ut-prettyphoto');
        wp_dequeue_script( 'ut-flexslider-js');
        wp_dequeue_script( 'ut-superfish');
        wp_dequeue_script( 'ut-lazyload-js');
        wp_dequeue_script( 'ut-easing');

    } else if (is_page( array( 'how-it-works', 'hoe-het-werkt', 'testimonials', 'pricing', 'pakketten' )) ){
        wp_enqueue_style( 'bootstrap-css-4', get_stylesheet_directory_uri().'/assets/css/bootstrap4.min.css' );
        wp_enqueue_style( 'main-css', get_stylesheet_directory_uri().'/assets/css/main.css', array(), '0.1.0', 'all' );

    } else {
        wp_enqueue_style( 'oldstyle-css', get_stylesheet_directory_uri().'/oldstyle.css' );
        wp_enqueue_style( 'bootstrap-css-3', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css' );

        if ( is_page_template( 'press.tpl.php') ) {
            wp_enqueue_style( 'press-css', get_stylesheet_directory_uri().'/assets/css/page-press.css' );
        }
    } 

    // GeoIP redirect
    wp_enqueue_script( 'countryfinder-js', get_stylesheet_directory_uri().'/js/countryfinder.js', array( 'jquery' ), '1.0.1', false );

    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri().'/assets/js/slick.min.js', array( 'jquery' ), '1.0.1', true );
    wp_enqueue_script( 'main-js', get_stylesheet_directory_uri().'/assets/js/main.js', array( 'jquery' ), '1.0.1', true );

    /**
     * Check if WooCommerce is activated
     */
    if ( class_exists( 'woocommerce' ) && is_product() ){
        wp_enqueue_script( 'singleproductpage-js', get_stylesheet_directory_uri().'/js/singleproductpage.js', array( 'jquery' ), '1.0.1', true );
        wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri().'/assets/js/bootstrap.min.js', array( 'jquery' ), '3.4.1', true );
    }

    if ( class_exists( 'woocommerce' ) && is_checkout() ){
        wp_enqueue_script( 'checkoutpage-js', get_stylesheet_directory_uri().'/js/checkoutpage.js', array( 'jquery' ), '1.0.0', true );
    }
}

add_action( 'wp_enqueue_scripts', 'my_theme_scripts', 100 );

/**
 * Unload WooCommerce assets on non WooCommerce pages.
 * @link https://sridharkatakam.com/how-to-load-woocommerce-css-and-js-only-on-shop-specific-pages-in-wordpress/
 */
function sk_conditionally_remove_wc_assets() {

    // if WooCommerce is not active, abort.
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    // if this is a WooCommerce related page, abort.
    if ( is_woocommerce() || is_cart() || is_checkout() || is_page( array( 'my-account' ) ) ) {
        return;
    }

    remove_action( 'wp_enqueue_scripts', [ WC_Frontend_Scripts::class, 'load_scripts' ] );
    remove_action( 'wp_print_scripts', [ WC_Frontend_Scripts::class, 'localize_printed_scripts' ], 5 );
    remove_action( 'wp_print_footer_scripts', [ WC_Frontend_Scripts::class, 'localize_printed_scripts' ], 5 );

    // disable all WooCommerce stylesheets
    add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

}

add_action( 'get_header', 'sk_conditionally_remove_wc_assets' );

/**
 * Disable WooCommerce block styles (front-end).
 */
function disable_woocommerce_block_styles() {
    wp_dequeue_style( 'wc-block-style' );
  }

add_action( 'wp_enqueue_scripts', 'disable_woocommerce_block_styles' );

/**
 * Remove Gutenberg Block Library CSS from loading on the frontend
 */
function remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
} 

add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );
  
/**
 * Display price in variation option name
 */
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

add_filter( 'woocommerce_variation_option_name', 'display_price_in_variation_option_name' );

/**
 * Ensure variation combinations are working properly - standard limit is 30
 */
function woo_custom_ajax_variation_threshold( $qty, $product ) {
    return 150;
}       

add_filter( 'woocommerce_ajax_variation_threshold', 'woo_custom_ajax_variation_threshold', 10, 2 );

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

/**
 * Get image depends on the device
 */
function get_image_size() {
	return wp_is_mobile() ? 'thumbnail' : 'large';
}

/**
 * Variations Radio Buttons for WooCommerce
 */
function print_attribute_radios($checked_value, $value, $label, $name, $vi, $description = '') {
    // This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
    $checked = sanitize_title($checked_value) === $checked_value ? checked($checked_value, sanitize_title($value), false) : checked($checked_value, $value, false);

    $input_name = 'attribute_' . esc_attr($name);
    $esc_value = esc_attr($value);
    $id = esc_attr($name . '_v_' . $value);
    $smallval = strtolower(str_replace(" ", "-", $value));
    $smallval1 = str_replace("(", "", $smallval);
    $smallval2 = str_replace(")", "", $smallval1);
    $filtered_label = apply_filters('woocommerce_variation_option_name', $label);

    // ToDo: check and remove
    if ($vi <=  2) {
        if (strpos($label, 'Writer') !== false) {
            $count = $vi;
        } elseif (strpos($label, 'schrijver') !== false) {
            $count = $vi;
        } elseif (strpos($label, 'Schrijver') !== false) {
            $count = $vi;
        } else {
            $count = '';
            $custompayclass = 'pay-' . $vi;
        }
    }

    $count = $vi;

    printf('<div><label for="%3$s"><input type="radio" class="variation_price" data-variation="' . $count . '"
                name="%1$s" value="%2$s" id="%3$s" %4$s>
            <div class="labelback"></div>%5$s<div class="label-writer-text %6$s ' . $custompayclass . '"></div>
            <span id="varUpdation' . $count . '"></span>
            <div class="label-writer-text">%7$s</div>
        </label></div>', $input_name, $esc_value, $id, $checked, $filtered_label, $smallval2, $description);
}


/**
 * Convert text to underscore
 * Non-alpha and non-numeric characters become spaces
 * 
 * @return string
 */
function convert_text_to_underscore($str, array $noStrip = []){        
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        $str = str_replace(" ", "_", $str);
        $str = strtolower($str);

        return $str;
}