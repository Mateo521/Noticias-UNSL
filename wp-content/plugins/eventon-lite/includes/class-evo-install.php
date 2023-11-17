<?php
/**
 * Installation related functions and actions
 *
 * @author   AJDE
 * @category Admin
 * @package  eventon/Classes
 * @version  1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class evo_install {

	static $installed_version;

	private static $evo_updates = array();

	public static function init(){
		//add_action('init', array( __CLASS__, 'check_version'),5);
		add_action( 'admin_init', array( __CLASS__, 'install_actions' ), 5 );
		add_filter( 'plugin_row_meta', array( __CLASS__, 'plugin_row_meta' ), 10, 2 );
	}

	// check eventon version and run the updater if required
		public static function install_actions(){
			self::$installed_version = get_option('eventon_plugin_version');

			if(empty(self::$installed_version) || self::$installed_version != EVO()->version){

				self::update();
				do_action('eventon_updated');

				
				// redirect to welcome screen from eventon settings page
				if (  isset( $_GET['page'] ) && 'eventon' == $_GET['page'] && (isset($_REQUEST['type'] ) && $_REQUEST['type'] != 'bypass' || !isset($_REQUEST['type']) ) )
					wp_safe_redirect( admin_url( 'index.php?page=evo-about&evo-updated=true' ) );
			}

		}


	// Update EVO
		public static function update(){
			$current_evo_version = get_option('eventon_plugin_version');
			
			foreach ( self::$evo_updates as $version => $updater ) {
				if(version_compare( $current_evo_version, $version, '<' )){
					include($updater);
					self::update_evo_version($version);
				}
			}

			// after each version update to latest
			self::update_evo_version(EVO()->version);

			// record in log 
			EVO_Error()->record_gen_log('Evo Lite version update','eventon','','from '.$current_evo_version. ' '. self::$installed_version .' to '. EVO()->version);

		}

	// update eventon version to current
		private static function update_evo_version($version=null){

			$newversion = ( empty( $version ) ? EVO()->version : $version );
			
			if(empty(self::$installed_version)){
				add_site_option( 'eventon_plugin_version', $newversion );
				update_option( 'eventon_plugin_version',$newversion );
			}else{
				update_site_option( 'eventon_plugin_version', $newversion );
				update_option( 'eventon_plugin_version',$newversion );
				
			}
		}

	// create pages that the plugin relies on 
		public static function create_pages(){
			include_once('admin/eventon-admin-functions.php');

			$pages = apply_filters('eventon_create_pages',array(
				'events_page' => array(
					'name'=> _x( 'event-directory', 'page_slug', 'eventon' ),
					'title'=> _x( 'Events', 'eventon' ),
					'content'=>'[add_eventon]'
				)
			));

			foreach ( $pages as $key => $page ) {
				eventon_create_page( esc_sql( $page['name'] ), 'eventon_' . $key . '_id', $page['title'], $page['content'], '' );
			}

			delete_transient( 'eventon_cache_excluded_uris' );
			update_option('_eventon_create_pages',1);

		}

	// Show row meta on the plugin screen
		public static function plugin_row_meta( $links, $file){
			if( AJDE_EVCAL_BASENAME !== $file) return $links;

			$row_meta = array(
				'fullv'    => '<a href="' . esc_url( 'https://myeventon.com' )  . '" aria-label="' . esc_attr__( 'Get EventON Full Version', 'eventon' ) . '">' . esc_html__( 'Full Version', 'eventon' ) . '</a>',
				'docs'    => '<a href="' . esc_url( 'https://docs.myeventon.com' )  . '" aria-label="' . esc_attr__( 'View EventON documentation', 'eventon' ) . '">' . esc_html__( 'Docs', 'eventon' ) . '</a>',
				'videos'    => '<a href="' . esc_url( 'https://www.youtube.com/playlist?list=PLj0uAR9EylGrROSEOpT6WuL_ZkRgEIhLq' )  . '" aria-label="' . esc_attr__( 'View EventON Video Tutorials', 'eventon' ) . '">' . esc_html__( 'Videos', 'eventon' ) . '</a>',
				'news' => '<a href="' . esc_url( 'https://www.myeventon.com/news/'  ) . '" aria-label="' . esc_attr__( 'View EventON News & Updates', 'eventon' ) . '">' . esc_html__( 'News', 'eventon' ) . '</a>',
				'support' => '<a href="' . esc_url( 'https://www.myeventon.com/support/' )  . '" aria-label="' . esc_attr__( 'Visit EventON Support', 'eventon' ) . '">' . esc_html__( 'Support', 'eventon' ) . '</a>',
			);

			return array_merge( $links, $row_meta );
		}
}

evo_install::init();