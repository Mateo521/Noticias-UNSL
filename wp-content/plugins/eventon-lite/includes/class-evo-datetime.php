<?php
/**
 * Eventon date time class.
 *
 * @class 		EVO_generator
 * @version		lite 1.0
 * @package		EventON/Classes
 * @category	Class
 * @author 		AJDE
 */

class evo_datetime{		
	/**	Construction function	 */
		public function __construct(){
			$this->wp_time_format = EVO()->calendar->time_format;
			$this->wp_date_format = EVO()->calendar->date_format;
		}

	// RETURN UNIX		
		// return just UNIX timestamps corrected for repeat intervals
			public function get_correct_event_repeat_time($post_meta, $repeat_interval=''){
				if(!empty($repeat_interval) && !empty($post_meta['repeat_intervals']) && $repeat_interval!='0'){
					$intervals = unserialize($post_meta['repeat_intervals'][0]);

					return array(
						'start'=> (isset($intervals[$repeat_interval][0])? 
							$intervals[$repeat_interval][0]:
							$intervals[0][0]),
						'end'=> (isset($intervals[$repeat_interval][1])? 
							$intervals[$repeat_interval][1]:
							$intervals[0][1]) ,
					);

				}else{// no repeat interval values saved
					$start = !empty($post_meta['evcal_srow'])? $post_meta['evcal_srow'][0] :0;
					return array(
						'start'=> $start,
						'end'=> ( !empty($post_meta['evcal_erow'])? $post_meta['evcal_erow'][0]: $start)
					);
				}
			}		
	

	// convert unix to lang formatted readable string
	// added 3.0.3
		public function get_readable_formatted_date($unix, $format = ''){

			if(empty($format)) $format = EVO()->calendar->date_format.' '.EVO()->calendar->time_format;

			return $this->__get_lang_formatted_timestr(
				$format, 
				eventon_get_formatted_time( $unix )
			);
			
		}

	// return start OR end time unix in translated and formatted date-time-string
		function get_formatted_smart_time_piece($unix, $epmv='', $lang='', $passed_date_time_format=''){
			$time_ = eventon_get_formatted_time($unix);

			$_is_allday = (!empty($epmv['evcal_allday']) && $epmv['evcal_allday'][0]=='yes')? true:false;
			
			$date_time_format = apply_filters('evo_smart_time_datetime_format', $this->wp_date_format);

			
			if($_is_allday){
				$output = $this->date($date_time_format, $time_).' ('.evo_lang_get('evcal_lang_allday','All Day').')';
			}else{// not all day
				$date_time_format = (!empty($passed_date_time_format))?  $passed_date_time_format: $date_time_format.' '.$this->wp_time_format;
				
				$output = $this->date($date_time_format, $time_);
			}
			return $output;
		}

	

	// return a smarter complete date-time -translated and formatted to date-time string
	// 2.3.13
		public function get_formatted_smart_time($startunix, $endunix, $epmv='', $event_id=''){

			$wp_time_format = get_option('time_format');
			$wp_date_format = get_option('date_format');

			if(empty($epmv) && empty($event_id)) return false;

			if(empty($epmv)) $epmv = get_post_meta($event_id);

			$start_ar = eventon_get_formatted_time($startunix);
			$end_ar = eventon_get_formatted_time($endunix);
			$_is_allday = (!empty($epmv['evcal_allday']) && $epmv['evcal_allday'][0]=='yes')? true:false;
			$hideend = (!empty($epmv['evo_hide_endtime']) && $epmv['evo_hide_endtime'][0]=='yes')? true:false;

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


	// return datetime string for a given format using date-time data array
		public function date($dateformat, $array){	
			return $this->__get_lang_formatted_timestr($dateformat, $array);
		} 

		// return event date/time in given date format using date item array
		function __get_lang_formatted_timestr($dateform, $datearray){
			$time = str_split($dateform);
			$newtime = '';
			$count = 0;
			foreach($time as $timestr){
				// check previous chractor
					if( strpos($time[ $count], '\\') !== false ){ 
						//echo $timestr;
						$newtime .='';
					}elseif($count!= 0 &&  strpos($time[ $count-1 ], '\\') !== false ){
						$newtime .= $timestr;
					}else{
						$newtime .= (is_array($datearray) && array_key_exists($timestr, $datearray))? $datearray[$timestr]: $timestr;
					}
				
				$count ++;
			}
			return $newtime;
		}



}