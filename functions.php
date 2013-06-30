<?php

// Theme Support Features
add_theme_support( 'builder-3.0' );
add_theme_support( 'builder-responsive' );
/*add_theme_support( 'builder-full-width-modules' );*/
add_theme_support( 'builder-module-style-before-after-classes' );

// Add Support for Alternate Module Styles
if ( ! function_exists( 'pp_add_banner' ) ) {
	function pp_add_banner() {
		builder_register_module_style( 'html', 'Message Banner', 'html-message-banner' );		
	}
}
add_action( 'it_libraries_loaded', 'pp_add_banner' );

function logo_func( $atts ){
 $logo = '<a href="#"><img src="http://mylifelongjourney.com/wp-content/uploads/2013/06/logo150.png" alt="Home" class="pplogo"/></a>';

 return $logo;
}
add_shortcode( 'addlogo', 'logo_func' );