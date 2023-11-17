<?php
/** 
 * Helper functions to be used by eventon or its addons
 * front-end only
 *
 * @version L 2.2.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class evo_helper{	
	public $options2;
	public function __construct(){
		$this->opt2 = get_option('evcal_options_evcal_2'); 		
	}


	// Process permalink appends
		public function process_link($link,  $var, $append, $force_par = false){
			if(strpos($link, '?')=== false ){

				if($force_par){
					if( substr($link,-1) == '/') $link = substr($link,0,-1);
					$link .= "?".$var."=".$append;
				}else{
					if( substr($link,-1) == '/') $link = substr($link,0,-1);
					$link .= "/".$var."/".$append;
				}
				
			}else{
				$link .= "&".$var."=".$append;
			}
			return $link;
		}
		

	// convert array to data element values - 3.1 / U 4.1
		public function array_to_html_data($array){
			$html = '';
			foreach($array as $k=>$v){
				if( is_array($v)) $v = htmlspecialchars( json_encode($v), ENT_QUOTES);
				$html .= 'data-'. $k .'="'. $v .'" ';
			}
			return $html;
		}

	// sanitization
		// @+ 4.0.3
		public function sanitize_array($array){
			return $this->recursive_sanitize_array_fields($array);
		}
		public function recursive_sanitize_array_fields($array){
			if(is_array($array)){
				$new_array = array();
				foreach ( $array as $key => $value ) {
		        	if ( is_array( $value ) ) {
		        		$key = sanitize_title($key);
		            	$new_array[ $key ] = $this->recursive_sanitize_array_fields($value);
		        	}
		        	else {
		            	$new_array[ $key ] = sanitize_text_field( $value );
		        	}
	    		}

	    		return $new_array;
	    	}else{
	    		return sanitize_text_field( $array );	    		
	    	}
		}		

		// check ajax submissions for sanitation and nonce verification
		// @+3.1
		public function process_post($array, $nonce_key='', $nonce_code='', $filter = true){
			$array = $this->recursive_sanitize_array_fields( $array);

			if( !empty($nonce_key) && !empty($nonce_code)){

				if( !wp_verify_nonce( $array[ $nonce_key], $nonce_code ) ) return false;
			}

			if($filter)	$array = array_filter( $array );
			return $array;
		}	

		// sanitize html content @u 4.5.3
			function sanitize_html($content){
				if( !EVO()->cal->check_yn('evo_sanitize_html','evcal_1')) return $content;

				return wp_kses( $content, apply_filters('evo_sanitize_html', array( 
				    'a' => array(
				        'href' => array(),
				        'title' => array()
				    ),
				    'br' => array(),
				    'p' => array(),
				    'i' => array(),
				    'b' => array(),
				    'u' => array(),			    
				    'ul' => array(),
				    'li' => array(),
				    'br' => array(),
				    'em' => array(),
				    'strong' => array(),
				    'span' => array(),
				    'font' => array('color' => array()),
				    'img' => array(
				    	'src'      => true,
				        'srcset'   => true,
				        'sizes'    => true,
				        'class'    => true,
				        'id'       => true,
				        'width'    => true,
				        'height'   => true,
				        'alt'      => true,
				        'align'    => true,
				    ),
				) ) );
			}
			function sanitize_html_for_eventtop( $content ){
				return wp_kses( $content, apply_filters('evo_sanitize_html_eventtop',
					array( 				    
				    'i' => array(),
				    'b' => array(),
				    'u' => array(),			    
				    'br' => array(),
				    'em' => array(),
				    'strong' => array(),
				    'img' => array(
				    	'src'      => true,
				        'srcset'   => true,
				        'sizes'    => true,
				        'class'    => true,
				        'id'       => true,
				        'width'    => true,
				        'height'   => true,
				        'alt'      => true,
				        'align'    => true,
				    ),
				) ) );
			}

	// Timezones
		private function get_default_timezones_array(){
			return array(
				"Pacific/Midway"                 => "(GMT-11:00) Midway Island, Samoa ",
				"Pacific/Pago_Pago"              => "(GMT-11:00) Pago Pago ",
				"Pacific/Honolulu"               => "(GMT-10:00) Hawaii ",
				"America/Anchorage"              => "(GMT-8:00) Alaska ",
				"America/Vancouver"              => "(GMT-7:00) Vancouver ",
				"America/Los_Angeles"            => "(GMT-7:00) Pacific Time (US and Canada)",
				"America/Tijuana"                => "(GMT-7:00) Tijuana ",
				"America/Phoenix"                => "(GMT-7:00) Arizona ",
				"America/Edmonton"               => "(GMT-6:00) Edmonton ",
				"America/Denver"                 => "(GMT-6:00) Mountain Time (US and Canada)",
				"America/Mazatlan"               => "(GMT-6:00) Mazatlan ",
				"America/Regina"                 => "(GMT-6:00) Saskatchewan ",
				"America/Guatemala"              => "(GMT-6:00) Guatemala ",
				"America/El_Salvador"            => "(GMT-6:00) El Salvador ",
				"America/Managua"                => "(GMT-6:00) Managua ",
				"America/Costa_Rica"             => "(GMT-6:00) Costa Rica ",
				"America/Tegucigalpa"            => "(GMT-6:00) Tegucigalpa ",
				"America/Winnipeg"               => "(GMT-5:00) Winnipeg ",
				"America/Chicago"                => "(GMT-5:00) Central Time (US and Canada)",
				"America/Mexico_City"            => "(GMT-5:00) Mexico City ",
				"America/Panama"                 => "(GMT-5:00) Panama ",
				"America/Bogota"                 => "(GMT-5:00) Bogota ",
				"America/Lima"                   => "(GMT-5:00) Lima ",
				"America/Caracas"                => "(GMT-4:30) Caracas ",
				"America/Montreal"               => "(GMT-4:00) Montreal ",
				"America/New_York"               => "(GMT-4:00) Eastern Time (US and Canada)",
				"America/Indianapolis"           => "(GMT-4:00) Indiana (East)",
				"America/Puerto_Rico"            => "(GMT-4:00) Puerto Rico ",
				"America/Santiago"               => "(GMT-4:00) Santiago ",
				"America/Halifax"                => "(GMT-3:00) Halifax ",
				"America/Montevideo"             => "(GMT-3:00) Montevideo ",
				"America/Araguaina"              => "(GMT-3:00) Brasilia ",
				"America/Argentina/Buenos_Aires" => "(GMT-3:00) Buenos Aires, Georgetown ",
				"America/Sao_Paulo"              => "(GMT-3:00) Sao Paulo ",
				"Canada/Atlantic"                => "(GMT-3:00) Atlantic Time (Canada)",
				"America/St_Johns"               => "(GMT-2:30) Newfoundland and Labrador ",
				"America/Godthab"                => "(GMT-2:00) Greenland ",
				"Atlantic/Cape_Verde"            => "(GMT-1:00) Cape Verde Islands ",
				"Atlantic/Azores"                => "(GMT+0:00) Azores ",
				"UTC"                            => "(GMT+0:00) Universal Time UTC ",
				"Etc/Greenwich"                  => "(GMT+0:00) Greenwich Mean Time ",
				"Atlantic/Reykjavik"             => "(GMT+0:00) Reykjavik ",
				"Africa/Nouakchott"              => "(GMT+0:00) Nouakchott ",
				"Europe/Dublin"                  => "(GMT+1:00) Dublin ",
				"Europe/London"                  => "(GMT+1:00) London ",
				"Europe/Lisbon"                  => "(GMT+1:00) Lisbon ",
				"Africa/Casablanca"              => "(GMT+1:00) Casablanca ",
				"Africa/Bangui"                  => "(GMT+1:00) West Central Africa ",
				"Africa/Algiers"                 => "(GMT+1:00) Algiers ",
				"Africa/Tunis"                   => "(GMT+1:00) Tunis ",
				"Europe/Belgrade"                => "(GMT+2:00) Belgrade, Bratislava, Ljubljana ",
				"CET"                            => "(GMT+2:00) Sarajevo, Skopje, Zagreb ",
				"Europe/Oslo"                    => "(GMT+2:00) Oslo ",
				"Europe/Copenhagen"              => "(GMT+2:00) Copenhagen ",
				"Europe/Brussels"                => "(GMT+2:00) Brussels ",
				"Europe/Berlin"                  => "(GMT+2:00) Amsterdam, Berlin, Rome, Stockholm, Vienna ",
				"Europe/Amsterdam"               => "(GMT+2:00) Amsterdam ",
				"Europe/Rome"                    => "(GMT+2:00) Rome ",
				"Europe/Stockholm"               => "(GMT+2:00) Stockholm ",
				"Europe/Vienna"                  => "(GMT+2:00) Vienna ",
				"Europe/Luxembourg"              => "(GMT+2:00) Luxembourg ",
				"Europe/Paris"                   => "(GMT+2:00) Paris ",
				"Europe/Zurich"                  => "(GMT+2:00) Zurich ",
				"Europe/Madrid"                  => "(GMT+2:00) Madrid ",
				"Africa/Harare"                  => "(GMT+2:00) Harare, Pretoria ",
				"Europe/Warsaw"                  => "(GMT+2:00) Warsaw ",
				"Europe/Prague"                  => "(GMT+2:00) Prague Bratislava ",
				"Europe/Budapest"                => "(GMT+2:00) Budapest ",
				"Africa/Tripoli"                 => "(GMT+2:00) Tripoli ",
				"Africa/Cairo"                   => "(GMT+2:00) Cairo ",
				"Africa/Johannesburg"            => "(GMT+2:00) Johannesburg ",
				"Europe/Helsinki"                => "(GMT+3:00) Helsinki ",
				"Africa/Nairobi"                 => "(GMT+3:00) Nairobi ",
				"Europe/Sofia"                   => "(GMT+3:00) Sofia ",
				"Europe/Istanbul"                => "(GMT+3:00) Istanbul ",
				"Europe/Athens"                  => "(GMT+3:00) Athens ",
				"Europe/Bucharest"               => "(GMT+3:00) Bucharest ",
				"Asia/Nicosia"                   => "(GMT+3:00) Nicosia ",
				"Asia/Beirut"                    => "(GMT+3:00) Beirut ",
				"Asia/Damascus"                  => "(GMT+3:00) Damascus ",
				"Asia/Jerusalem"                 => "(GMT+3:00) Jerusalem ",
				"Asia/Amman"                     => "(GMT+3:00) Amman ",
				"Europe/Moscow"                  => "(GMT+3:00) Moscow ",
				"Asia/Baghdad"                   => "(GMT+3:00) Baghdad ",
				"Asia/Kuwait"                    => "(GMT+3:00) Kuwait ",
				"Asia/Riyadh"                    => "(GMT+3:00) Riyadh ",
				"Asia/Bahrain"                   => "(GMT+3:00) Bahrain ",
				"Asia/Qatar"                     => "(GMT+3:00) Qatar ",
				"Asia/Aden"                      => "(GMT+3:00) Aden ",
				"Africa/Khartoum"                => "(GMT+3:00) Khartoum ",
				"Africa/Djibouti"                => "(GMT+3:00) Djibouti ",
				"Africa/Mogadishu"               => "(GMT+3:00) Mogadishu ",
				"Europe/Kiev"                    => "(GMT+3:00) Kiev ",
				"Asia/Dubai"                     => "(GMT+4:00) Dubai ",
				"Asia/Muscat"                    => "(GMT+4:00) Muscat ",
				"Asia/Tehran"                    => "(GMT+4:30) Tehran ",
				"Asia/Kabul"                     => "(GMT+4:30) Kabul ",
				"Asia/Baku"                      => "(GMT+5:00) Baku, Tbilisi, Yerevan ",
				"Asia/Yekaterinburg"             => "(GMT+5:00) Yekaterinburg ",
				"Asia/Tashkent"                  => "(GMT+5:00) Islamabad, Karachi, Tashkent ",
				"Asia/Calcutta"                  => "(GMT+5:30) India ",
				"Asia/Kolkata"                   => "(GMT+5:30) Mumbai, Kolkata, New Delhi ",
				"Asia/Kathmandu"                 => "(GMT+5:45) Kathmandu ",
				"Asia/Novosibirsk"               => "(GMT+6:00) Novosibirsk ",
				"Asia/Almaty"                    => "(GMT+6:00) Almaty ",
				"Asia/Dacca"                     => "(GMT+6:00) Dacca ",
				"Asia/Dhaka"                     => "(GMT+6:00) Astana, Dhaka ",
				"Asia/Krasnoyarsk"               => "(GMT+7:00) Krasnoyarsk ",
				"Asia/Bangkok"                   => "(GMT+7:00) Bangkok ",
				"Asia/Saigon"                    => "(GMT+7:00) Vietnam ",
				"Asia/Jakarta"                   => "(GMT+7:00) Jakarta ",
				"Asia/Irkutsk"                   => "(GMT+8:00) Irkutsk, Ulaanbaatar ",
				"Asia/Shanghai"                  => "(GMT+8:00) Beijing, Shanghai ",
				"Asia/Hong_Kong"                 => "(GMT+8:00) Hong Kong ",
				"Asia/Taipei"                    => "(GMT+8:00) Taipei ",
				"Asia/Kuala_Lumpur"              => "(GMT+8:00) Kuala Lumpur ",
				"Asia/Singapore"                 => "(GMT+8:00) Singapore ",
				"Australia/Perth"                => "(GMT+8:00) Perth ",
				"Asia/Yakutsk"                   => "(GMT+9:00) Yakutsk ",
				"Asia/Seoul"                     => "(GMT+9:00) Seoul ",
				"Asia/Tokyo"                     => "(GMT+9:00) Osaka, Sapporo, Tokyo ",
				"Australia/Darwin"               => "(GMT+9:30) Darwin ",
				"Australia/Adelaide"             => "(GMT+9:30) Adelaide ",
				"Asia/Vladivostok"               => "(GMT+10:00) Vladivostok ",
				"Pacific/Port_Moresby"           => "(GMT+10:00) Guam, Port Moresby ",
				"Australia/Brisbane"             => "(GMT+10:00) Brisbane ",
				"Australia/Sydney"               => "(GMT+10:00) Canberra, Melbourne, Sydney ",
				"Australia/Hobart"               => "(GMT+10:00) Hobart ",
				"Asia/Magadan"                   => "(GMT+10:00) Magadan ",
				"SST"                            => "(GMT+11:00) Solomon Islands ",
				"Pacific/Noumea"                 => "(GMT+11:00) New Caledonia ",
				"Asia/Kamchatka"                 => "(GMT+12:00) Kamchatka ",
				"Pacific/Fiji"                   => "(GMT+12:00) Fiji Islands, Marshall Islands ",
				"Pacific/Auckland"               => "(GMT+12:00) Auckland, Wellington"
			);
		}
		function get_timezone_array( $unix = '' , $adjusted = true) {
			
			$tzs = $this->get_default_timezones_array();

			if(!$adjusted) return $tzs;
		
			// adjust GMT values based on daylight savings time
			$DD = new DateTime('now');
			
			$updated_zones = array();
			foreach($tzs as $f=>$v){
				$DD->setTimezone( new DateTimeZone( $f ));
				$nv = explode(') ', $v);
				$updated_zones[ $f] = '(GMT'. $DD->format('P').') '. $nv[1];
				
			}
			return $updated_zones;
		}

		function get_timezone_name($key){
			$data = $this->get_timezone_array();
			return ( isset( $data[$key] )) ? $data[$key] : $key;
		}

		// return time offset from saved timezone values @4.5.2
		public function _get_tz_offset_seconds( $tz_key){
			$data = $this->get_timezone_array();
			if( !isset( $data[$tz_key] )) return 0;// if non existing tz string 

			$str = explode('GMT', $data[$tz_key]);
			$str2 = explode(')', $str[1]);

			$offset_time = $str2[0]; // return a val like +12:00

			// if it is UTC 0
			if(strpos($offset_time, '+0:') !== false)	return 0;

			// alter
			if(strpos($offset_time, '+') !== false){
				$ss = str_replace('+', '-', $offset_time);
			}else{
				$ss = str_replace('-', '+', $offset_time);	
			}

			// convert to seconds
			sscanf($ss, "%d:%d", $hours, $minutes);

			return $hours * 3600 + $minutes * 60;
		}

		// return time offset in seconds -- deprecating @4.5.2
		// @key  timezone string
		function get_timezone_offset($key, $event_unix, $opposite = true, $unix = true){
			$data = $this->get_timezone_array();

			if( !isset( $data[$key] )) return $key;

			$str = explode('GMT', $data[$key]);
			$str2 = explode(')', $str[1]);

			$offset_time = $str2[0]; // return a val like +12:00
						

			// return unix time value
			if($unix){

				// only return the utc offset
				$timezone = new DateTimeZone( $key );	
					
				$DD = new DateTime( );	
				$DD->setTimestamp( $event_unix );
				$DD->setTimezone( $timezone );	

				$offset = $DD->getOffset() * (-1);
								
				return $offset;

			// return offset from timezone string
			}else{
				// if return opposite of offset to counter
				if(!$opposite){
					return $offset_time;
				}else{
					if(strpos($offset_time, '+0:') !== false){
						return $offset_time;
					}

					if(strpos($offset_time, '+') !== false){
						$ss = str_replace('+', '-', $offset_time);
					}else{
						$ss = str_replace('-', '+', $offset_time);	
					}

					return $ss;

					sscanf($ss, "%d:%d", $hours, $minutes);

					$time_seconds = $hours * 3600 + $minutes * 60;
					
					return $time_seconds;
				}				
			}
		}


		// return utc offset time for unix
		function get_ics_format_from_unix( $unix, $sep = true){
			
			$enviro = new EVO_Environment();

			$unix = $unix - $enviro->get_UTC_offset();

			if(!$sep) return $unix;
			
			$new_timeT = date("Ymd", $unix);
			$new_timeZ = date("Hi", $unix);
			return $new_timeT.'T'.$new_timeZ.'00Z';
		}

		// Escape ICS text
			function esc_ical_text( $text='' ) {
				
			    $text = str_replace("\\", "", $text);
			    $text = str_replace("\r", "\r\n ", $text);
			    $text = str_replace("\n", "\r\n ", $text);
			    $text = str_replace(",", "\, ", $text);
			    $text = EVO()->calendar->helper->htmlspecialchars_decode($text);
			    return $text;
			}

		// return GMT value
		function get_timezone_gmt($key, $unix = false){

			$DD = new DateTime();
			if($unix) $DD->setTimestamp($unix);
			$DD->setTimezone( new DateTimeZone( $key ));

			return 'GMT'. $DD->format('P');
		}

}