<?php
/**
 * AccessPress Store functions and definitions
 * @package AccessPress Store
**/

/**
 * Set the content width based on the theme's design and stylesheet.
**/
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'accesspress_store_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accesspress_store_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AccessPress Store, use a find and replace
	 * to change 'accesspress-store' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'accesspress-store', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
    
    add_theme_support( 'woocommerce' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	**/
	add_theme_support( 'post-thumbnails' );    
    add_image_size('accesspress-prod-cat-size', 562, 492, true);    
    add_image_size('ap_product_cat', 274, 300, true);
    add_image_size('accesspress-service-thumbnail', 380, 252, true);    
    add_image_size('accesspress-blog-big-thumbnail', 760, 300, true);
    add_image_size('accesspress-slider', 1350, 570, true);    
    
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'top' => __( 'Top Menu', 'accesspress-store' ),
		'primary' => __( 'Primary Menu', 'accesspress-store' ),
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	));

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	));

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'accesspress_store_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));
}
endif; // accesspress_store_setup
add_action( 'after_setup_theme', 'accesspress_store_setup' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/accesspress-function.php';
/**
 * Implement the Custom Metabox feature.
 */
require get_template_directory() . '/inc/custom-metabox.php';

/**
 * Load Option Framework file.
 */
 define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/option-framework/' );

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/accesspress-widget.php';

/**
 * Load General Setting
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Load Sanitizer Functions
 */
require get_template_directory() . '/inc/accesspress-sanitizer.php';
/**
 * Load General Setting
 */
require get_template_directory() . '/inc/assets/assets-general-setting.php';

/**
 * Load Slider Setting
 */
require get_template_directory() . '/inc/assets/assets-slider-setting.php';

/**
 * Load Woocommerce Setting
 */
require get_template_directory() . '/inc/assets/assets-woocommerce-setting.php';

/**
 * Load Page/Post Setting
 */
require get_template_directory() . '/inc/assets/assets-pagepost-setting.php';

/**
 * Load Page/Post Setting
 */
require get_template_directory() . '/inc/assets/assets-blog-setting.php';

/**
 * Load Page/Post Setting
 */
require get_template_directory() . '/inc/assets/assets-paymentlogo-setting.php';

/**
 * Load Class Custom Radio
 */
require get_template_directory() . '/inc/class/class-image-radio.php';

/**
 * Load Class Custom Switch
 */
require get_template_directory() . '/inc/class/class-custom-switch.php';

/**
 * Load Class Custom Switch
 */
require get_template_directory() . '/inc/class/class-repeater.php';

/**
 * Load Footer Custom Section
 */
require get_template_directory() . '/inc/assets/assets-footer-setting.php';

/**
 * Load Class Custom Categories
 */
require get_template_directory() . '/inc/class/class-custom-categories.php';

/**
 * Load AccessPress Store Pro Shortcodes
 */
require get_template_directory() . '/inc/accesspress-store-shortcodes.php';

/**
 * Load AccessPress Store Pro Custom Post Type
 */
require get_template_directory() . '/inc/accesspress-store-custom-post-type.php';

/**
 * Load AccessPress Store Pro Impoter file
 */
require get_template_directory() . '/inc/import/ap-importer.php';

/*

** Remove tabs from product details page

*/

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {


unset( $tabs['additional_information'] ); // Remove the additional information tab

return $tabs;

}

// Add to functions.php

/*===================================================
    
    Created by sk from Renegade Empire with help 
    from these sources:
    
    http://docs.woothemes.com/document/editing-product-data-tabs/
    http://www.sean-barton.co.uk/2013/03/remove-woocommerce-20-reviews-tab/#.UYnWe7XfB6N
    http://www.sean-barton.co.uk/2013/03/sb-add-woocommerce-tabs-wordpress-plugin/#.UYrYL7XfB6M

====================================================*/



/*===================================================   
    Options
====================================================*/

$re_wcvt_options = array(
    'tab_title' =>              'Product Variations',   // change the tile of the tab
                    // change the sku column heading
    'show_price' =>             'yes',                  // show price column: yes or no
    'show_description' =>       'yes',                  // show description column: yes or no
    'tab_priority' =>           '5',                    // 5 is good to make the tab appear first
        );


            /*===================================================   
            Add the tab
            ====================================================*/


        add_filter( 'woocommerce_product_tabs', 're_woo_product_variations_tab' );
        function re_woo_product_variations_tab() {

	       global $woocommerce, $product, $post, $re_wcvt_options;
        // $available_variations = $product->get_available_variations();
        // $attributes = $product->get_attributes();
        if (is_product() and $product->product_type == 'variable') {
	
		// Adds the new tab
		
		$tabs['variations_table'] = array(
			'title' 	=> __( $re_wcvt_options['tab_title'], 'woocommerce' ),
			'priority' 	=> 50,
			'callback' 	=> 're_woo_product_variations_tab_content'
		);
	 
		return $tabs;
	}
 
}

/*===================================================   
    Build the tab content
====================================================*/

function re_woo_product_variations_tab_content() {

	global $woocommerce, $product, $post, $re_wcvt_options;
    $available_variations = $product->get_available_variations();
    $attributes = $product->get_attributes();
 
	// The new tab content
 	
	//echo '<h2>Variations</h2>';
	//echo '<p>Here\'s your new product tab.</p>';
    
?>
            <table class="table table-striped table-hover table-bordered varations-table tablesorter">
                <thead>
                    <tr>
                        
                    <?php 
                        // Show description if option is set to yes
                        if ($re_wcvt_options['show_description'] == 'yes') : ?>
                        <th>Description</th>
                    <?php endif; ?>
                    <?php foreach ( $attributes as $name => $options) :?>
                        <th>
                        <?php 
                            //echo $woocommerce->attribute_label($name); 
                            $attr_name = $options['name'];
                            if (0 === strpos($attr_name, 'pa_')){
                                $string = wc_attribute_label( $name, $product );
                            }
                            echo $name; 
                        ?>
                        </th>
                    <?php endforeach;?>
                    <?php 
                        // Show price if option is set to yes
                        if ($re_wcvt_options['show_price'] == 'yes') : ?>
                        <th>Price</th>
                    <?php endif; ?>
                        <th class="var-qty">&nbsp;</th>
                        <th class="var-add-to-cart">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    /*
                    echo '<pre>';
                    print_r($re_wcvt_options);
                    echo '</pre>';
                    */
                ?>
                <?php foreach ($available_variations as $prod_variation) : ?>
                    <?php
                        // get some vars to work with
                       	$post_id = $prod_variation['variation_id'];
                        $post_object = get_post($post_id);
                        
                         
                        //echo '<pre>';
                        //print_r($prod_variation);
                        //echo '</pre>';
                        
                    ?>
                    <tr>
                        <td>
                            <?php 
                            	// echo substr($prod_variation['sku'], 5, 100) ; // output SKU but trim the first part that is added 
                            	echo $prod_variation['sku'];
                            ?>
                        </td>
                    <?php 
                    // Show description if option is set to yes
                    if ($re_wcvt_options['show_description'] == 'yes') : ?>
                        <td>
                        <?php 
                            $variation_desc = get_post_meta( $post_object->ID, '_description', true);
                            if ( !empty($post_object->post_content)){
                                $variation_desc = $post_object->post_content; // post content 
                            } elseif (!empty($variation_desc)) {
                                $variation_desc = get_post_meta( $post_object->ID, '_description', true); // get meta description
                            } else {
                                $variation_desc = get_the_title($product->id); // parent title
                            }
                            echo $variation_desc;
                        ?>
                        </td>
                    <?php endif; ?>
                    <?php foreach ($prod_variation['attributes'] as $attr_name => $attr_value) : ?>
                        <td>
                        <?php
                            // Get the correct variation values
                            if (strpos($name, '__')){ // variation is a pre-definted attribute
                                $name = substr($name, 10);
                                $attr = get_term_by('$name', $attr_name);
                                $attr_value = $attr->name;
                            } else { // variation is a custom attribute
                                //$attr = maybe_unserialize( get_post_meta( $post->ID, '_product_attributes' ) );
                                //$attr_value = var_dump($attr);
                                
                                //$attr = get_term_by('slug', $attr_value, $attr_name);
                                //$attr_value = $attr->name;
                            }
                            echo $attr_value;
                        ?>
                        </td>
                    <?php endforeach;?>
                    <?php 
                        // Show price if option is set to yes
                        if ($re_wcvt_options['show_price'] == 'yes') : ?>
                        <td><?php echo get_woocommerce_currency_symbol() . get_post_meta( $post_object->ID, '_price', true); ?></td>
                    <?php endif; ?>
                    	<form action="<?php echo do_shortcode('[add_to_cart_url id="'.$product->id.'"]'); ?>" class="variations_form cart" method="post" enctype="multipart/form-data" data-product_id="<?php echo $product->id; ?>">
                        <td>
                            <?php woocommerce_quantity_input(); ?>
                        </td>
                        <td>
                                <input type="hidden" name="variation_id" value="<?php echo $post_id; ?>">
                                    <?php foreach ($prod_variation['attributes'] as $attr_name => $attr_value) : ?>
                                        <input type="hidden" name="<?php echo sanitize_title($attr_name); ?>" value="<?php echo $attr_value ;?>">
                                    <?php endforeach;?>                                     
                                <button type="submit" class="btn btn-small button add-to" type="button">Add to cart</button>
                            
                        </td>
                        </form>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <?php
                //echo '<pre>';
                //print_r($prod_variation['attributes']); 
                //echo '</pre>';
            ?>
<?php
}

/*===================================================   
    Tab Position
====================================================*/


add_filter( 'woocommerce_product_tabs', 're_woo_move_variation_table_tab', 98);
function re_woo_move_variation_table_tab($tabs) {
    global $re_wcvt_options;
    if ($tabs['variations_table']) {
        $tabs['variations_table']['priority'] = $re_wcvt_options['tab_priority'];
    }
    return $tabs;
}
