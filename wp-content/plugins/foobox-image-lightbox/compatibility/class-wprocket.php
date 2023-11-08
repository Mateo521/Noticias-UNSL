<?php

if ( ! class_exists( 'foobox_compatibilty_wprocket' ) ) {

	class foobox_compatibilty_wprocket {

		public function __construct() {
			add_action( 'plugins_loaded', array( $this, 'init' ) );
		}

		function init() {
			if ( defined( 'WP_ROCKET_VERSION') ) {
				add_filter( 'rocket_excluded_inline_js_content', array( $this, 'add_foobox_to_excluded_inline_js' ) );
				add_filter( 'rocket_delay_js_scripts', array( $this, 'remove_allowed_keywords' ) );
				add_filter( 'rocket_defer_inline_exclusions', array( $this, 'add_foobox_to_defer_inline_exclusions') );
			}
		}

		function add_foobox_to_defer_inline_exclusions( $regex ) {
			return $regex . '|FOOBOX';
		}

		function remove_allowed_keywords( $delay_js_scripts ) {
			if ( is_array( $delay_js_scripts ) ) {
				//these defaults are causing FooBox script to be delayed, which breaks FooBox
				unset( $delay_js_scripts[ array_search( "ga( '", $delay_js_scripts ) ] );
				unset( $delay_js_scripts[ array_search( "ga('", $delay_js_scripts ) ] );
			}

			return $delay_js_scripts;
		}

		function add_foobox_to_excluded_inline_js( $excluded_inline ) {
			if ( is_array( $excluded_inline ) ) {
				$excluded_inline[] = 'FOOBOX';
			}

			return $excluded_inline;
		}
	}
}