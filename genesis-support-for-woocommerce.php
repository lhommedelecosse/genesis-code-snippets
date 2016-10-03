<?php  // <~ do not copy the opening php tag

add_theme_support( 'genesis-connect-woocommerce' );

// Display 12 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

//* Removes products count after categories name 
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
 
function woo_remove_category_products_count() {
  return;
}

//* Only Show Sale Items
add_filter( 'woocommerce_shortcode_products_query', 'wooninja_only_sale_items', 10, 2 );

function wooninja_only_sale_items( $args, $atts ) {
	if ( $atts['category'] ) {
		$product_ids_on_sale = wc_get_product_ids_on_sale();
		$args['post__in']	= array_merge( array( 0 ), $product_ids_on_sale );
	}
	return $args;
}

//* Remove add to cart button from product archives
function remove_loop_button(){
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
