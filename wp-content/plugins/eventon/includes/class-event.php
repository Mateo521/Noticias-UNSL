<?php
/**
 * Event Class for one event
 * @version 2.6.12
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class EVO_Event{
	public $event_id;
	public $ID;
	public $ri = 0;
	public $l = 'L1';
	private $edata = array();
	private $pmv ='';

	public function __construct($event_id, $event_pmv='', $ri = 0, $force_data_set = true){
		$this->event_id = $this->ID = (int)$event_id;		
		if($force_data_set){			
			$this->set_event_data($event_pmv);
		} 		
		$this->localize_edata();
		$this->ri = $ri;
	}

	// event building @+2.6.10
		function set_lang($lang){ $this->l = $lang;}

	// permalinks
		// @~ 2.6.7
		function get_permalink($ri= '' , $l = 'L1'){
			$event_link = get_the_permalink($this->event_id);

			$ri = (empty($ri) && $ri !== 0)? 
				( $this->ri == 0? 0: $this->ri): $ri;


			if($ri==0 && $l=='L1') return $event_link;

			$append = 'ri-'. $ri.'.l-'. $l;

			$permalink_last = substr($event_link, -1);
				$event_link = ($permalink_last == '/')? substr($event_link, 0,-1): $event_link;

			$event_link = strpos($event_link, '?')=== false? $event_link."/var/".$append: $event_link.'&var='.$append;

			//$event_link = htmlentities($event_link, ENT_QUOTES | ENT_HTML5);

			return $event_link;
		}

	// title
		function get_title(){
			if(!empty($this->post_title)) return $this->post_title;
			return get_the_title($this->ID);
		}

		// @+ 2.6.12
		function edit_post_link(){
			return get_admin_url().'post.php?post='.$this->ID.'&action=edit';	
		}
	// time and date related
		function is_current_event( $cutoff='end'){
			date_default_timezone_set('UTC');	
			$current_time = current_time('timestamp');

			$event_time = $this->get_event_time($cutoff);
			return $event_time>$current_time? true: false;
		}

		function is_past_event($cutoff = 'end'){
			date_default_timezone_set('UTC');	
			$current_time = current_time('timestamp');

			$event_time = $this->get_event_time($cutoff);

			return $event_time < $current_time? true: false;
		}
		function is_all_day(){
			return $this->check_yn('evcal_allday');
		}
		function is_hide_endtime(){
			return $this->check_yn('evo_hide_endtime');
		}

	// DATE TIME
		// @+ 2.6.10
		function get_start_time(){
			return $this->get_event_time();
		}
		function get_end_time(){
			return $this->get_event_time('end');
		}

		// updated 2.6.7
		function get_event_time($type='start', $custom_ri=''){
			if($this->is_repeating_event() ){	

				$repeat_interval = !empty($custom_ri)? (int)$custom_ri: (int)$this->ri;
				$intervals = $this->get_prop('repeat_intervals');

				if(sizeof($intervals)>0 && isset($intervals[$repeat_interval])){
					return ($type=='start')? 
						$intervals[$repeat_interval][0]:
						$intervals[$repeat_interval][1];
				}else{
					return ($type=='start')? $this->get_prop('evcal_srow'):$this->get_prop('evcal_erow');
				}
				
			}else{
				return ($type=='start')? $this->get_prop('evcal_srow'):$this->get_prop('evcal_erow');
			}
		}

		function get_start_end_times($custom_ri=''){
			if($this->is_repeating_event() ){	

				$repeat_interval = !empty($custom_ri)? (int)$custom_ri: (int)$this->ri;
				$intervals = $this->get_prop('repeat_intervals');

				if(sizeof($intervals)>0 ){
					return array(
						'start'=> (isset($intervals[$repeat_interval][0])? 
							$intervals[$repeat_interval][0]:
							$intervals[0][0]),
						'end'=> (isset($intervals[$repeat_interval][1])? 
							$intervals[$repeat_interval][1]:
							$intervals[0][1]) ,
					);
				}				
			}

			return array(
				'start'=> $this->get_prop('evcal_srow'),
				'end'=> ( $this->get_prop('evcal_erow')? $this->get_prop('evcal_erow'): $this->get_prop('evcal_srow'))
			);
		}

		function get_formatted_smart_time($custom_ri=''){
			$wp_time_format = get_option('time_format');
			$wp_date_format = get_option('date_format');

			$times = $this->get_start_end_times($custom_ri);

			$start_ar = eventon_get_formatted_time($times['start']);
			$end_ar = eventon_get_formatted_time($times['end']);
			$_is_allday = $this->check_yn('evcal_allday');
			$hideend = $this->check_yn('evo_hide_endtime');

			$output = '';

			// reused
				$joint = $hideend?'':' - ';

			// same year
			if($start_ar['y']== $end_ar['y']){
				// same month
				if($start_ar['n']== $end_ar['n']){
					// same date
					if($start_ar['j']== $end_ar['j']){
						if($_is_allday){
							$output = $this->date($wp_date_format, $start_ar) .' ('.evo_lang_get('evcal_lang_allday','All Day').')';
						}else{
							$output = $this->date($wp_date_format.' '.$wp_time_format, $start_ar).$joint. 
								(!$hideend? $this->date($wp_time_format, $end_ar):'');
						}
					}else{// dif dates
						if($_is_allday){
							$output = $this->date($wp_date_format, $start_ar).' ('.evo_lang_get('evcal_lang_allday','All Day').')'.$joint.
								(!$hideend? $this->date($wp_date_format, $end_ar).' ('.evo_lang_get('evcal_lang_allday','All Day').')':'');
						}else{
							$output = $this->date($wp_date_format.' '.$wp_time_format, $start_ar).$joint.
								(!$hideend? $this->date($wp_date_format.' '.$wp_time_format, $end_ar):'');
						}
					}
				}else{// dif month
					if($_is_allday){
						$output = $this->date($wp_date_format, $start_ar).' ('.evo_lang_get('evcal_lang_allday','All Day').')'.$joint.
							(!$hideend? $this->date($wp_date_format, $end_ar).' ('.evo_lang_get('evcal_lang_allday','All Day').')':'');
					}else{// not all day
						$output = $this->date($wp_date_format.' '.$wp_time_format, $start_ar).$joint.
							(!$hideend? $this->date($wp_date_format.' '.$wp_time_format, $end_ar):'');
					}
				}
			}else{
				if($_is_allday){
					$output = $this->date($wp_date_format, $start_ar).' ('.evo_lang_get('evcal_lang_allday','All Day').')'.$joint.
						(!$hideend? $this->date($wp_date_format, $end_ar).' ('.evo_lang_get('evcal_lang_allday','All Day').')':'');
				}else{// not all day
					$output = $this->date($wp_date_format.' '.$wp_time_format, $start_ar). $joint .
						(!$hideend? $this->date($wp_date_format.' '.$wp_time_format, $end_ar):'');
				}
			}
			return $output;	
		}

		// return start and end time in array after adjusting time to UTC offset based on site timezone
		function get_utc_adjusted_times($start = '', $end='', $separate = true){
			if(empty($start) && empty($end)){
				$times = $this->get_start_end_times();
			}else{
				$times = array('start'=>$start, 'end'=>$end);
			}

			if(empty($times)) return false;

			$datetime = new evo_datetime();
			$utc_offset = $datetime->get_UTC_offset();

			$new_times = array('start'=> $times['start'], 'end'=> $times['end']);

			foreach($times as $key=>$unix){

				// if event is effected by daylight savings time
				if( $this->echeck_yn('day_light') ){
					$unix += 3600;
				}

				if( !$separate){
					$new_times[$key] = $unix - $utc_offset;
					continue;
				}

				$new_unix = $unix - $utc_offset;
				$new_timeT = date("Ymd", $new_unix);
				$new_timeZ = date("Hi", $new_unix);
				$new_times[$key] = $new_timeT.'T'.$new_timeZ.'00Z';
			}

			return $new_times;
		}

		private function date($dateformat, $array){	
			return eventon_get_lang_formatted_timestr($dateformat, $array);
		}

	// GENERAL GET
		function is_year_long(){
			return $this->check_yn('evo_year_long');
		}
		function is_month_long(){
			return $this->check_yn('_evo_month_long');
		}
		function is_featured(){	return $this->check_yn('_featured');		}
		function is_completed(){	return $this->check_yn('_completed');		}
		function is_cancelled(){	return $this->check_yn('_cancel');		}

	// repeating events
		function is_repeating_event(){
			if(!$this->check_yn('evcal_repeat')) return false;
			if(empty($this->pmv['repeat_intervals'])) return false;
			return true;
		}
		function get_repeats(){
			if(empty($this->pmv['repeat_intervals'])) return false;
			return unserialize($this->pmv['repeat_intervals'][0]);
		}
		function get_next_current_repeat($current_ri_index){
			$repeats = $this->get_repeats();
			if(!$repeats) return false;
			
			foreach($repeats as $index=>$repeat){
				if($index<= $current_ri_index) continue;

				if($this->is_current_event($index)) return array('ri'=>$index, 'times'=>$repeat);			
			}

			return false;
		}

	// EVENT DATA
		// localize edata for the event object to be used
		function localize_edata(){
			$edata = $this->get_prop('_edata');
			$this->edata = ( !$edata)? array(): $edata;	
		}
		function get_all_edata(){
			return $this->edata;
		}
		function get_eprop($field){
			if(empty($this->edata[$field])) return false;
			if(!isset($this->edata[$field])) return false;
			return maybe_unserialize($this->edata[$field]);
		}
		function echeck_yn($field){
			if(empty($this->edata[$field])) return false;
			if($this->edata[$field]=='yes') return true;
			return false;
		}
		function set_eprop($field, $value, $update_post_meta = true, $localize = false){
			$this->edata[$field] = $value;	
			if($update) update_post_meta($this->ID, '_edata', $this->edata);
			if($localize)	$this->localize_edata();
		}
		function save_eprops(){
			 update_post_meta($this->ID, '_edata', $this->edata);
		}
		function delete_eprop($field){
			if(empty($this->edata[$field])) return true;
			if(!isset($this->edata[$field])) return true;
			unset($this->edata[$field]);
			update_post_meta($this->ID, '_edata', $this->edata);
		}

	// event post meta values
		private function set_event_data($pmv = ''){
			if(array_key_exists('EVO_props', $GLOBALS) ){
				global $EVO_props;
				if(isset($EVO_props[$this->event_id])){
					$this->pmv = $EVO_props[$this->event_id];
					return true;
				}				
			}

			// get event's post meta values and update global
			$this->pmv = (!empty($pmv))? $pmv : get_post_custom($this->event_id);
			$GLOBALS['EVO_props'][$this->event_id] = $this->pmv;
		}

		// pass event pmv value to private pmv and update globalized event PMV array 
		// @+2.6.11
		function globalize_event_pmv(){
			$GLOBALS['EVO_props'][$this->event_id] = $this->pmv;
		}

		function get_data(){ return $this->pmv;}
		function get_prop($field){
			if(empty($this->pmv[$field])) return false;
			if(!isset($this->pmv[$field][0])) return false;
			return maybe_unserialize($this->pmv[$field][0]);
		}

		function set_prop($field, $value, $update = true, $update_obj = false){
			$this->pmv[$field][0] = $value;
	
			if($update) update_post_meta($this->ID, $field, $value);

			if($update_obj)	$this->set_event_data();
		}

		function check_yn($field){
			if(empty($this->pmv[$field])) return false;
			if($this->pmv[$field][0]=='yes') return true;
			return false;
		}
		function del_prop($field){
			delete_post_meta($this->ID, $field);
		}
		function set_global(){
			$data = array(
				'id'=>$this->ID,
				'pmv'=>$this->pmv
			);
			$GLOBALS['EVO_Event'] = (object)$data;
		}
		// not initiated on load
		function get_event_post(){
			global $wpdb;

			$results = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE ID='{$this->event_id}'");
			
			if($results && count($results)>0){
				$results = $results[0];
				$this->author = $results->post_author;
				$this->post_date = $results->post_date;
				$this->content = $results->post_content;
				$this->excerpt = $results->post_excerpt;
				$this->post_name = $results->post_name;
				$this->post_title = $results->post_title; // @+ 2.6.10
			}
		}
		function get_start_unix(){	return (int)$this->get_prop('evcal_srow');	}
		function get_end_unix(){	return (int)$this->get_prop('evcal_erow');	}

	// Location data for an event
		public function get_location_data(){
			$event_id = $this->event_id;
			$location_terms = wp_get_post_terms($event_id, 'event_location');

			if ( $location_terms && ! is_wp_error( $location_terms ) ){

				$output = array();

				$evo_location_tax_id =  $location_terms[0]->term_id;
				$event_tax_meta_options = get_option( "evo_tax_meta");
				
				// check location term meta values on new and old
				$LocTermMeta = evo_get_term_meta( 'event_location', $evo_location_tax_id, $event_tax_meta_options);
				
				// location name
					$output['name'] = stripslashes( $location_terms[0]->name );

				// description
					if(!empty($location_terms[0]->description))
						$output['description'] = $location_terms[0]->description;

				// meta values
				foreach(array(
					'location_address','location_lat','location_lon','evo_loc_img'
				) as $key){
					if(empty($LocTermMeta[$key])) continue;
					$output[$key] = $LocTermMeta[$key];
				}				

				return $output;
				
			}else{
				return false;
			}
		}

}