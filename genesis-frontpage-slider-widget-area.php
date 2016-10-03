<?php  // <~ do not copy the opening php tag

//Add in new Widget areas
function themeprefix_extra_widgets() {
	genesis_register_sidebar( array(
	'id'            => 'slider',
	'name'          => __( 'Slider', 'genesischild' ),
	'description'   => __( 'This is the Slider area', 'genesischild' ),
	'before_widget' => '<div class="wrap slider">',
	'after_widget'  => '</div>',
	) );
}
add_action( 'widgets_init', 'themeprefix_extra_widgets' );

//Position the slider Area
function themeprefix_slider_widget() {
	if( is_front_page() ) {
		genesis_widget_area ( 'slider', array(
		'before' => '<aside class="slider-container">',
		'after'  => '</aside>',));
	}
}
add_action( 'genesis_after_header','themeprefix_slider_widget' );
