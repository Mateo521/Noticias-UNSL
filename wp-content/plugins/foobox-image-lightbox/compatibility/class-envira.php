<?php

if ( ! class_exists( 'foobox_compatibilty_envira' ) ) {

	class foobox_compatibilty_envira {

		public function __construct() {
			add_action( 'plugins_loaded', array( $this, 'init' ) );
		}

		function init() {
			if ( class_exists( 'Envira_Gallery_Lite') ) {
				add_filter( 'foobox_caption_title_attributes_override', array( $this, 'add_envira_caption_title_attributes' ) );
			}
		}

		function add_envira_caption_title_attributes( $attributes ) {
			if ( is_array( $attributes ) ) {
				$attributes[] = 'enviraCaption';
			}

			return $attributes;
		}
	}
}