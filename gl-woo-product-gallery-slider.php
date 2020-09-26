<?php
/**
 * Plugin Name:       GL WooCommerce Product Gallery Slider
 * Plugin URI:        https://greenlifeit.com/plugins
 * Description:       Add Woocommerce like carousel in your Single Product Page with Shorcode.
 * Version:           1.0.0
 * Author:            Asiqur Rahman
 * Author URI:        https://asique.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gl-wpgs
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'gl_wpgs_product_image' ) ) {
	function gl_wpgs_product_image() {
		require_once plugin_dir_path( __FILE__ ) . '/inc/product-image.php';
	}
	
	add_shortcode( 'glproductgallery', 'gl_wpgs_product_image' );
}

if ( ! function_exists( 'gl_wpgs_assets' ) ) {
	function gl_wpgs_assets() {
		wp_enqueue_script( 'slick-js', plugin_dir_url( __FILE__ ) . 'assets/public/js/slick.min.js', array( 'jquery' ), '2.0', true );
		wp_enqueue_script( 'venobox-js', plugin_dir_url( __FILE__ ) . 'assets/public/js/venobox.min.js', array( 'jquery' ), '2.0', true );
		
		wp_register_script( 'wpgsjs', plugin_dir_url( __FILE__ ) . 'assets/public/js/wpgs.js', array(), '2.0', true );
		
		$wpgsJquery = array(
			'wLightboxframewidth' => '600',
			'wcaption'            => 'true',
		);
		wp_localize_script( 'wpgsjs', 'wpgs_var', $wpgsJquery );
		
		wp_enqueue_script( 'wpgsjs' );
		
		$warrows        = 'false';
		$wautoPlay      = 'false';
		$wslider_thubms = '4';
		
		$wpgs_sliderJs = "jQuery(document).ready(function(){jQuery('.wpgs-for').slick({slidesToShow:1,slidesToScroll:1,arrows:{$warrows},fade:!0,infinite:!1,autoplay:{$wautoPlay},nextArrow:'<i class=\"flaticon-right-arrow\"></i>',prevArrow:'<i class=\"flaticon-back\"></i>',asNavFor:'.wpgs-nav'});jQuery('.wpgs-nav').slick({slidesToShow:{$wslider_thubms},slidesToScroll:1,asNavFor:'.wpgs-for',dots:!1,infinite:!1,arrows:{$warrows},centerMode:!1,focusOnSelect:!0,responsive:[{breakpoint:767,settings:{slidesToShow:3,slidesToScroll:1,vertical:!1,draggable:!0,autoplay:!1,isMobile:!0,arrows:!1}},],})});";
		wp_add_inline_script( 'wpgsjs', $wpgs_sliderJs );
		
		wp_enqueue_style( 'venobox-style', plugin_dir_url( __FILE__ ) . 'assets/public/css/venobox.css', null, '2.0' );
//		wp_enqueue_style( 'flaticon-wpgs', plugin_dir_url( __FILE__ ) . 'assets/public/css/font/flaticon.css', null, '2.0' );
		wp_enqueue_style( 'wpgs-style', plugin_dir_url( __FILE__ ) . 'assets/public/css/style.css', null, '1.0' );
	}
	
	add_action( 'wp_enqueue_scripts', 'gl_wpgs_assets' );
}
