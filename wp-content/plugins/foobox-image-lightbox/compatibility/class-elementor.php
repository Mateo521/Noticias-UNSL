<?php

if ( ! class_exists( 'foobox_compatibilty_elementor' ) ) {

	class foobox_compatibilty_elementor {

		public function __construct() {
			add_action( 'plugins_loaded', array( $this, 'init' ) );
		}

		function init() {
			if ( defined( 'ELEMENTOR_VERSION') ) {
				add_filter( 'foobox_caption_title_attributes_override', array( $this, 'add_elementor_caption_title_attributes' ) );
				add_filter( 'foobox_caption_desc_attributes_override', array( $this, 'add_elementor_caption_desc_attributes' ) );
			}
		}

		function add_elementor_caption_title_attributes( $attributes ) {
			if ( is_array( $attributes ) ) {
				$attributes[] = 'elementorLightboxTitle';
			}

			return $attributes;
		}

		function add_elementor_caption_desc_attributes( $attributes ) {
			if ( is_array( $attributes ) ) {
				$attributes[] = 'elementorLightboxDescription';
			}

			return $attributes;
		}
	}
}