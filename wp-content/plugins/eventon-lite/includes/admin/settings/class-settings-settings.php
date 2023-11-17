<?php
/**
  * evo settings class
  * @version lite 2.2.2
  */
class evo_settings_settings{
	function __construct($evcal_opt)	{		
		$this->evcal_opt = $evcal_opt;
	}

	function content(){

		$help = new evo_helper();

		// google maps styles description
		$gmaps_desc = '<span class="evo_gmap_styles" data-url="'.AJDE_EVCAL_URL.'/assets/images/ajde_backender/"></span>';

		return apply_filters('eventon_settings_tab1_arr_content', array(
			array(
				'id'=>'evcal_001',
				'name'=>__('General Calendar Settings','eventon'),
				'display'=>'show',
				'icon'=>'gears',
				'tab_name'=>__('General Settings','eventon'),
				'top'=>'4',
				'fields'=> apply_filters('eventon_settings_general', array(
					array('id'=>'evcal_cal_hide','type'=>'yesno','name'=>__('Hide Calendars from front-end','eventon'),),
					
					//array('id'=>'evcal_only_loggedin','type'=>'yesno','name'=>__('Show calendars only to logged-in Users','eventon'),),
					
					array('id'=>'evcal_cal_hide_past','type'=>'yesno','name'=>__('Hide past events for default calendar(s)','eventon'),'afterstatement'=>'evcal_cal_hide_past'),	
											
					array('id'=>'evcal_cal_hide_past','type'=>'begin_afterstatement'),
					array('id'=>'evcal_past_ev','type'=>'radio','name'=>__('Select a precise timing for the cut off time for past events','eventon'),'width'=>'full',
						'options'=>array(
							'local_time'=>__('Hide events past current local time','eventon'),
							'today_date'=>__('Hide events past today\'s date','eventon'))
					),
					array('id'=>'evcal_cal_hide_past','type'=>'end_afterstatement'),				
					
									
					//array('id'=>'evcal_dis_conFilter','type'=>'yesno','name'=>__('Disable Content Filter','eventon'),'legend'=>__('This will disable to use of the_content filter on event details and custom field values.','eventon')),				
					
					
					array('id'=>'evo_login_link',
						'type'=>'text',
						'name'=>__('URL for custom login link','eventon'), 
						'legend'=>__('If provided this URL will be used instead of default wordpress URL for users to login where eventon access is restricted to only login users.','eventon','eventon')
					),
					array('id'=>'evo_dis_icshtmldecode',
						'type'=>'yesno',
						'name'=>__('Disable ICS file special character encoding','eventon'), 
						'legend'=>__('This will disable html special character dencoding for all ics downloaded files for events','eventon')
					),
					
					array('type'=>'sub_section_open','name'=>__('WP EventON Core Settings' ,'eventon')),					

						array('id'=>'evo_content_filter','type'=>'dropdown','name'=>__('Select calendar event content filter type','eventon'),'legend'=>__('This will disable the use of the_content filter on event details and custom field values.','eventon'), 'options'=>array( 
							'evo'=>__('EventON Content Filter','eventon'),
							'def'=>__('Default WordPress Filter','eventon'),
							'none'=>__('No Filter','eventon')
						)),
						
					array('type'=>'sub_section_close'),

					array('type'=>'sub_section_open','name'=>__('Search Engine Structured Data' ,'eventon')),
						array('id'=>'evo_schema','type'=>'yesno','name'=>__('Remove schema data from calendar','eventon'), 'legend'=>__('Schema microdata helps in google and other search engines find events in special event data format. With this option you can remove those microdata from showing up on front-end calendar.','eventon'),'afterstatement'=>'evo_schema'),

							array('id'=>'evo_schema','type'=>'begin_afterstatement'),
							array('id'=>'evcal_schema_disable_section','type'=>'radio','name'=>__('Select where in your site you would like the schema data to be removed from','eventon'),'width'=>'full',
								'options'=>array(
									'everywhere'=>__('Everywhere in the site','eventon'),
									'single'=>__('Everywhere except single event pages','eventon'))
							),
							array('id'=>'evo_schema','type'=>'end_afterstatement'),
						array('id'=>'evo_remove_jsonld',
							'type'=>'yesno',
							'name'=>__('Remove JSON-LD data for events','eventon'), 
							'legend'=>__('This will remove JSON-LD structured data scripts added for each event.','eventon'),
							'afterstatement'=>'evo_remove_jsonld'
						),
							array('id'=>'evo_remove_jsonld','type'=>'begin_afterstatement'),
							array('id'=>'evo_remove_jsonld_section','type'=>'radio',
								'name'=>__('Select where in your site you would like the schema data to be removed from','eventon'),'width'=>'full',
								'options'=>array(
									'everywhere'=>__('Everywhere in the site','eventon'),
									'single'=>__('Everywhere except single event pages','eventon'))
							),
							array('id'=>'evo_remove_jsonld','type'=>'end_afterstatement'),

					array('type'=>'sub_section_close'),

					array('type'=>'sub_section_open','name'=>__('Settings & Data Management' ,'eventon')),

						array('id'=>'evo_delete_settings',
							'type'=>'yesno',
							'name'=>__('Delete eventon settings & data when EventON is uninstalled','eventon'), 
							'legend'=>__('Enabling this will DELETE eventON settings and event post data when you uninstall eventON from this website. By default eventON settings and data are not deleted from database (when plugin is uninstalled)','eventon')),

					array('type'=>'sub_section_close'),					
										
					array('type'=>'sub_section_open','name'=>__('Additional EventON Settings' ,'eventon')),

						array('id'=>'evcal_export',
							'type'=>'customcode',
							'code'=>$this->export()),

						array('id'=>'evo_disable_csv_formatting',
							'type'=>'yesno',
							'name'=>__('Disable CSV export event formatting','eventon'), 
							'legend'=>__('This will disable CSV export all event formatting characters..','eventon'),
						),
						
					array('type'=>'sub_section_close'),


					array('id'=>'evcal_additional',
						'type'=>'note',
						'name'=>sprintf(__('Experience the complete EventON features with <a href="%s">EventON Full version.</a>' ,'eventon'), 'http://www.myeventon.com')
					),
			))),
			array(
				'id'=>'evcal_005',
				'name'=>__('Google Maps API Settings','eventon'),
				'tab_name'=>__('Google Maps API','eventon'),
				'icon'=>'map-marker',
				'fields'=>array(
					array('id'=>'evcal_cal_gmap_api',
						'type'=>'yesno',
						'name'=>__('Disable Google Maps API','eventon'),
						'legend'=>'This will stop gmaps API from loading on frontend and will stop google maps from generating on event locations.',
						'afterstatement'=>'evcal_cal_gmap_api'),
					array('id'=>'evcal_cal_gmap_api','type'=>'begin_afterstatement'),
					array('id'=>'evcal_gmap_disable_section','type'=>'radio','name'=>__('Select which part of Google gmaps API to disable','eventon'),'width'=>'full',
						'options'=>array(
							'complete'=>__('Completely disable google maps','eventon'),
							'gmaps_js'=>__('Google maps javascript file only (If the API js file is already loaded with another gmaps program)','eventon'))
					),
					array('id'=>'evcal_cal_gmap_api','type'=>'end_afterstatement'),
					
					array('id'=>'evo_gmap_api_key','type'=>'text','name'=>__('Google maps API Key (Required)','eventon').' <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">'. __('How to get API Key','eventon').'</a>',
						'legend'=>__('Not required with Gmap API V3, but typing a google maps API key will append the key and will enable monitoring map loading activity from google.','eventon'),
						'afterstatement'=>'evcal_cal_gmap_api'),
					array('id'=>'evcal_gmap_scroll','type'=>'yesno',
						'name'=>__('Disable scrollwheel zooming on Google Maps','eventon'),
						'legend'=>__('This will stop google maps zooming when mousewheel scrolled.','eventon')
					),
					
					array('id'=>'evcal_gmap_format', 'type'=>'dropdown','name'=>__('Google maps display type:','eventon'),
						'options'=>array(
							'roadmap'=>__('ROADMAP Displays the normal default 2D','eventon'),
							'satellite'=>__('SATELLITE Displays photographic tiles','eventon'),
							'hybrid'=>__('HYBRID Displays a mix of photographic tiles and a tile layer','eventon'),
							'terrain'=>__('TERRAIN Displays a physical map based on terrain information','eventon'),
						)),
					array('id'=>'evcal_gmap_zoomlevel', 'type'=>'dropdown','name'=>__('Google starting zoom level:','eventon'),
						'desc'=>__('18 = zoomed in (See few roads), 7 = zoomed out. (See most of the country)','eventon'),
						'options'=>array(
							'18'=>'18',
							'16'=>'16',
							'14'=>'14',
							'12'=>'12',
							'10'=>'10',
							'8'=>'8',
							'7'=>'7',
						)),
					
					array('id'=>'evo_gmap_iconurl','type'=>'text','name'=>__('Custom map marker icon complete http url','eventon'),
						'legend'=> __('Type a complete http:// url for a PNG image that can be used instead of the default red google map markers.','eventon'),'default'=>'eg. http://www.site.com/image.png'
					),
					
			)),

			array(
				'id'=>'evcal_001b',
				'name'=>__('Time & Date Related Settings','eventon'),
				'icon'=>'clock-o',
				'tab_name'=>__('Time Settings','eventon'),
				'fields'=> apply_filters('eventon_settings_time', array(
					
					array('type'=>'sub_section_open','name'=>__('General Time/Date Settings','eventon')),
						array('id'=>'evo_global_tzo','type'=>'dropdown',
							'name'=>__('Default Event Timezone','eventon'),'width'=>'full',
							'options'=> $help->get_timezone_array(false, true),
							'default'=> 'UTC'
						),
						array('id'=>'evo_tzo_all','type'=>'yesno',
							'name'=>__('Apply default timezone to all events','eventon'), 
							'legend'=>__('Setting this will apply the above set default timezone to all the events unless a different timezone is set via event','eventon')
						),
						array('id'=>'evo_utcoff','type'=>'yesno',
							'name'=>__('Use UTC offset time globally on calendars','eventon').' '.__('(BETA)','eventon'), 
							'legend'=>__('This will use UTC time for calculating current live events and use event times on UTC0 conversion. This feature is in beta development stage.','eventon')
						),
					array('type'=>'sub_section_close'),
	

					array('type'=>'sub_section_open','name'=>__('Front-end Time/Date Settings','eventon')),
						array('id'=>'evcal_header_format',
							'type'=>'text',
							'name'=>__('Calendar Header month/year format. <i>(<b>Allowed values:</b> m = month name, Y = 4 digit year, y = 2 digit year)</i>','eventon') , 
							'default'=>'m, Y'
						),
						array('id'=>'evo_usewpdateformat','type'=>'yesno',
							'name'=>__('Use WP default Date format in eventON calendar (Excluding eventCard event date format)','eventon'), 
							'legend'=>__('Select this option to use the default WP Date format through out eventON calendar parts excluding eventCard main date format. Default format: yyyy/mm/dd','eventon')),
											
						array('id'=>'evo_timeF','type'=>'yesno','name'=>__('Allow universal event time format on eventCard','eventon'),
							'legend'=>__('This will change the time format on eventCard to be a universal set format regardless of the month events span for.','eventon'),
								'afterstatement'=>'evo_timeF'),
							array('id'=>'evo_timeF','type'=>'begin_afterstatement'),
							array('id'=>'evo_timeF_v','type'=>'text','name'=>__('Date/Time Format','eventon'), 
								'default'=>'F j(l) g:ia'),
							array('id'=>'evcal_api_mu_note','type'=>'note',
								'name'=>__('Refer to guide for acceptable date/time format values: php <a href="http://php.net/manual/en/function.date.php" target="_blank">date()</a> You can use {} to add constants to the date/time format eg. F j(l) g{hr} i{min}. NOTE: Setting a custom time format will stop hide end time and all day event times from working as default.','eventon')),
							array('id'=>'evo_timeF','type'=>'end_afterstatement'),

						array('id'=>'evo_show_localtime','type'=>'yesno',
							'name'=>__('Enable "View in my time" button on frontend events. So users can localize event time','eventon'), 
							'legend'=>__('This will add a button in eventtop and eventcard next to event time to allow users to view the event time in their local time. A correct event timezone must be set for this to work.','eventon')
						),
						array('id'=>'evo_gmt_hide','type'=>'yesno',
								'name'=>__('Hide GMT value from frontend','eventon'), 
								'legend'=>__('Setting this will hide GMT value from every where on the event calendar events','eventon')
							),

					array('type'=>'sub_section_close'),


					array('type'=>'sub_section_open','name'=>__('Back-end Time/Date Settings','eventon')),
						array('id'=>'evo_minute_increment','type'=>'dropdown','name'=>__('Select minute increment for time select in event edit page','eventon'),'width'=>'full',
							'options'=>array(
								'60'=>'1','12'=>'5','6'=>'10','4'=>'15','2'=>'30'
							)
						),
						array('id'=>'evo_time_offset','type'=>'text',
							'name'=>__('Custom eventon only time offset value (in minutes)','eventon'), 
							'legend'=>__('If the iCS download time or add to calendar time is off by some time use this to fix that offset number. You can use +/- with time in minutes','eventon'),
							'default'=>'eg. +120'),
					array('type'=>'sub_section_close'),
					
			))),
			array(
				'id'=>'evcal_001a',
				'name'=>__('Calendar front-end Sorting and filtering options','eventon'),
				'tab_name'=>__('Sorting and Filtering','eventon'),
				'icon'=>'filter',
				'fields'=>array(
					
					array('id'=>'evcal_hide_filter_icons','type'=>'yesno',
						'name'=>__('Globally Hide Item Icons from Filter Dropdown Selection Menu','eventon'),
						'legend'=> __('This will hide the icons next to each items in filter dropdown menu.','eventon')
					),
					array('id'=>'evcal_sort_options', 'type'=>'checkboxes','name'=>__('Event sorting options to show on Calendar <i>(Note: Event Date is default sorting method.)</i>','eventon'),
						'options'=>array(
							'title'=>__('Event Main Title','eventon'),
							'color'=>__('Event Color','eventon'),
							'posted'=>__('Event Posted Date','eventon'),
						)),
					array('id'=>'evcal_filter_options', 'type'=>'checkboxes','name'=>__('Event filtering options to show on the calendar</i>','eventon'),
						'options'=>$this->event_type_options()
					),
			)),
			array(
				'id'=>'evcal_002',
				'name'=>__('General Frontend Calendar Appearance','eventon'),
				'tab_name'=>__('Appearance','eventon'),
				'icon'=>'eye',
				'fields'=>$this->appearance()
			),
			array(
				'id'=>'evcal_002sc',
				'name'=>__('Calendar Scripting and styles','eventon'),
				'tab_name'=>__('Scripts & Styling','eventon'),
				'icon'=>'eye',
				'fields'=>$this->scripts()
			),
			array(
				'id'=>'evcal_004',
				'name'=>__('Custom Icons for Calendar','eventon'),
				'tab_name'=>__('Icons','eventon'),
				'icon'=>'diamond',
				'fields'=> apply_filters('eventon_custom_icons', array(					
					array('id'=>'evcal_sh001',
						'type'=>'subheader',
						'name'=>__('Icon Selections','eventon')),
					array('id'=>'fs_fonti2','type'=>'fontation','name'=>__('EventCard Icons','eventon'),
						'variations'=>array(
							array('id'=>'evcal__ecI', 'type'=>'color', 'default'=>'6B6B6B'),
							array('id'=>'evcal__ecIz', 'type'=>'font_size', 'default'=>'18px'),
						)
					),

					
					
					array('id'=>'evcal__fai_001','type'=>'icon','name'=>__('Event Details Icon','eventon'),'default'=>'fa-align-justify'),
					array('id'=>'evcal__fai_002','type'=>'icon','name'=>__('Event Time Icon','eventon'),'default'=>'fa-clock'),
					array('id'=>'evcal__fai_repeats','type'=>'icon','name'=>__('Event Repeat Icon','eventon'),'default'=>'fa-repeat'),
					array('id'=>'evcal__fai_vir','type'=>'icon','name'=>__('Virtual Event Icon','eventon'),'default'=>'fa-globe'),
					array('id'=>'evcal__fai_health','type'=>'icon','name'=>__('Health Guidelines Icon','eventon'),'default'=>'fa-heartbeat'),
					array('id'=>'evcal__fai_003','type'=>'icon','name'=>__('Event Location Icon','eventon'),'default'=>'fa-map-marker'),
					array('id'=>'evcal__fai_004','type'=>'icon','name'=>__('Event Organizer Icon','eventon'),'default'=>'fa-headphones'),
					array('id'=>'evcal__fai_005','type'=>'icon','name'=>__('Event Capacity Icon','eventon'),'default'=>'fa-tachometer'),
					array('id'=>'evcal__fai_006','type'=>'icon','name'=>__('Event Learn More Icon','eventon'),'default'=>'fa-link'),
					array('id'=>'evcal__fai_relev','type'=>'icon','name'=>__('Related Events Icon','eventon'),'default'=>'fa-calendar-plus'),
					array('id'=>'evcal__fai_007','type'=>'icon','name'=>__('Event Ticket Icon','eventon'),'default'=>'fa-ticket'),
					array('id'=>'evcal__fai_008','type'=>'icon','name'=>__('Add to your calendar Icon','eventon'),'default'=>'fa-calendar-o'),
					array('id'=>'evcal__fai_008a','type'=>'icon','name'=>__('Get Directions Icon','eventon'),'default'=>'fa-road'),
				))
			)
			// event top
			,array(
				'id'=>'evcal_004aa',
				'name'=>__('EventTop Settings (EventTop is an event row on calendar)','eventon'),
				'tab_name'=>__('EventTop','eventon'),
				'icon'=>'columns',
				'fields'=>array(
					array('id'=>'evcal_top_fields', 'type'=>'checkboxes','name'=>__('Additional data fields for eventTop: <i>(NOTE: <b>Event Name</b> and <b>Event Date</b> are default fields)</i>','eventon'),
							'options'=> apply_filters('eventon_eventop_fields', $this->eventtop_settings()),
					),
					
					array('id'=>'evcal_eventtop','type'=>'note','name'=>__('NOTE: Lot of these fields are NOT available in Tile layout. Reason: we dont want to potentially break the tile layout and over-crowd the clean design aspect of tile boxes.','eventon')),

										
					array('id'=>'evo_eventtop_progress_hide','type'=>'yesno','name'=>__('Hide live event progress bar with time remaining','eventon'),'legend'=>__('Enabling this will hide the live event progress bar on event top','eventon')),
					array('id'=>'evo_hide_live','type'=>'yesno','name'=>__('Hide blinking "Live Now" icon from event top for current events','eventon'),'legend'=> __('This will hide the blinking live now icon, when events are live at current time.','eventon')),

					array('id'=>'evo_eventtop_style_def','type'=>'dropdown',
						'name'=>__('Select Default Calendar EventTop Style','eventon'),
						'legend'=>'This will set this as the default eventTop style, if not set via shortcode var eventtop_style',
						'options'=>array(
							'_2'=>'Colorful with gap between events',					
							'_1'=>'Colorful EventTop',					
							'_3'=>'Colorful event date bubbles',
							'_0'=>'Clear with left border colors',
							'_4'=>'Clear with left border colors and gaps',
						),'default'=>'_2',		
					),

					array('id'=>'evo_etop_tags', 'type'=>'checkboxes',
						'name'=>__('Select below EventTop tags to HIDE (Tags you selected below will be hidden from view on frontend.)','eventon'),
						'options'=> apply_filters('eventon_eventop_tags', $this->eventtop_tags()),
					),
				)
			)
			// event card
			,array(
				'id'=>'evcal_004a',
				'name'=>__('EventCard Settings (EventCard is the full event details card)','eventon'),
				'tab_name'=>__('EventCard','eventon'),
				'icon'=>'list-alt',
				'fields'=>array(								

					array('type'=>'sub_section_open','name'=>__('Featured Image','eventon')),
						array('id'=>'evo_ftimg_height_sty','type'=>'dropdown','name'=>__('Feature image display style','eventon'), 'legend'=>'Select which display style you want to show the featured image on event card when event first load',
							'options'=> array(
								'direct'=>__('Direct Image','eventon'),
								'minmized'=>__('Minimized height','eventon'),
								'100per'=>__('100% Image height with stretch to fit','eventon'),
								'full'=>__('100% Image height with propotionate to calendar width','eventon')
						)),
						array('id'=>'evo_ftimghover','type'=>'note','name'=>__('NOTE: Featured image display styles: Direct image style will show &lt;img/&gt; image as oppose to the image as background image of a &lt;div/&gt;','eventon')),
						array('id'=>'evo_ftimghover','type'=>'yesno','name'=>__('Disable hover effect on featured image','eventon'),'legend'=>'Remove the hover moving animation effect from featured image on event. Hover effect is not available on Direct Image style'),
						array('id'=>'evo_ftimgclick','type'=>'yesno','name'=>__('Disable zoom effect on click','eventon'),'legend'=>'Remove the moving animation effect from featured image on click event. Zoom effect is not available in Direct Image style'),

						array('id'=>'evo_ftimgheight','type'=>'text','name'=>__('Minimal height for featured image (value in pixels)','eventon'), 'default'=>'eg. 400'),
						array('id'=>'evo_ftim_mag','type'=>'yesno','name'=>__('Show magnifying glass over featured image','eventon'),'legend'=>'This will convert the mouse cursor to a magnifying glass when hover over featured image. <br/><br/><img src="'.AJDE_EVCAL_URL.'/assets/images/admin/cursor_mag.jpg"/><br/>This is not available for Direct Image style'),
						
					array('type'=>'sub_section_close'),

					array('type'=>'sub_section_open','name'=>__('Location Image','eventon')),
						array('id'=>'evo_locimgheight','type'=>'text','name'=>__('Set event location image height (value in pixels)','eventon'), 'default'=>'eg. 400'),
					array('type'=>'sub_section_close'),

					// Add to Calendar section
					array('type'=>'sub_section_open','name'=>__('Add to Calendar Options','eventon')),
						array('id'=>'evo_addtocal','type'=>'dropdown','name'=>__('Select which options to show for add to your calendar','eventon'),'legend'=>'Learn More & Add to your calendar field must be selected for these options to reflect on eventCard','options'=>array(
								'all'=>'All options',
								'gcal'=>'Only Google Add to Calendar',
								'ics'=>'Only ICS download event',
								'none'=>'Do not show any add to calendar options',
							)
						),
					array('type'=>'sub_section_close'),

					// Other EventCard Settings
					array('type'=>'sub_section_open','name'=>__('Other EventCard Settings','eventon')),
																
						array('id'=>'evo_morelass','type'=>'yesno','name'=>__('Show full event description','eventon'),'legend'=>'If you select this option, you will not see More/less button on EventCard event description.'),
						
						array('id'=>'evo_opencard',
							'type'=>'yesno',
							'name'=>__('Open all eventCards by default (Except tile layout)','eventon'),
							'legend'=>'This option will load the calendar with all the eventCards open by default and will not need to be clicked to slide down and see details. This is disabled in tiles layout to maintain integrity of tile layout design.'
						),
						array('id'=>'evo_card_http_filter',
							'type'=>'yesno',
							'name'=>__('Disable location & organizer link filtering','eventon'),
							'legend'=>'Location and organizer link filter removes http & https from the link, disabling this will stop that filter from running'
						),
					array('type'=>'sub_section_close'),
				)
			),

			array(
				'id'=>'evcal_004b',
				'name'=>__('Event Card Layout Designer','eventon'),
				'tab_name'=>__('EventCard Design','eventon'),
				'icon'=>'pencil-ruler',
				'fields'=>array(
					array('id'=>'evcal__note','type'=>'customcode','code'=>$this->eventcard_meta_fields()),
					/*
					array('id'=>'evo_EVC_arrange',
						'type'=>'rearrange',
						'fields_array'=>$this->rearrange_code(),
						'order_var'=> 'evoCard_order',
						'selected_var'=> 'evoCard_hide',
						'title'=>__('Order of EventCard Data Boxes','eventon'),
						'notes'=>__('Fields selected below will show in eventcard, and can be moved around to your desired order.','eventon')
					),
					*/
				)
			),

			array(
				'id'=>'evcal_003',
				'name'=>__('Third Party API Support for Event Calendar','eventon'),
				'tab_name'=>__('Third Party APIs','eventon'),
				'icon'=>'plug',
				'fields'=> apply_filters('eventon_settings_3rdparty', array(
					// paypal
					array('type'=>'sub_section_open','name'=>__('Paypal','eventon')),
					array('id'=>'evcal_paypal_pay','type'=>'yesno','name'=>__('Enable PayPal event ticket payments','eventon'),'afterstatement'=>'evcal_paypal_pay', 'legend'=>'This will allow you to add a paypal direct link to each event that will allow visitors to pay for event via paypal.'),
					array('id'=>'evcal_paypal_pay','type'=>'begin_afterstatement'),
					array('id'=>'evcal_pp_email','type'=>'text','name'=>__('Your paypal email address to receive payments','eventon')),				
					array('id'=>'evcal_pp_cur','type'=>'dropdown','name'=>__('Select your currency','eventon'), 'options'=> array(
							'AUD'=>'Australian Dollar',
							'BRL'=>'Brazilian Real',
							'CAD'=>'Canadian Dollar',
							'CZK'=>'Czech Koruna',
							'DKK'=>'Danish Krone',
							'EUR'=>'Euro',
							'HKD'=>'Hong Kong Dollar',
							'HUF'=>'Hungarian Forint',
							'ILS'=>'Israeli New Sheqel',
							'JPY'=>'Japanese Yen',
							'MYR'=>'Malaysian Ringgit',
							'MXN'=>'Mexican Peso',
							'NOK'=>'Norwegian Krone',
							'NZD'=>'New Zealand Dollar',
							'PHP'=>'Philippine Peso',
							'PLN'=>'Polish Zloty',
							'GBP'=>'Pound Sterling',
							'RUB'=>'Russian Ruble',
							'SGD'=>'Singapore Dollar',
							'SEK'=>'Swedish Krona',
							'CHF'=>'Swiss Franc',
							'TWD'=>'Taiwan New Dollar',
							'THB'=>'Thai Baht',
							'TRY'=>'Turkish Lira',
							'USD'=>'U.S. Dollar',
						),
						'legend'=> __('PayPal Currently supports 25 currencies','eventon') 
					),				
					array('id'=>'evcal_paypal_pay','type'=>'end_afterstatement'),

					array('type'=>'sub_section_close'),
				))
			)
			// custom meta fields
			,array(
				'id'=>'evcal_009',
				'name'=>__('Custom Meta Data fields for events','eventon'),
				'tab_name'=>__('Custom Meta Data','eventon'),
				'icon'=>'list-ul',
				'fields'=>$this->custom_meta_fields()
			)
			// event categories
			,array(
				'id'=>'evcal_010',
				'name'=>__('EventType Categories','eventon'),
				'tab_name'=>__('Categories','eventon'),
				'icon'=>'sitemap',
				'fields'=>$this->event_type_categories()
			)
			// events paging
			,array(
				'id'=>'evcal_011',
				'name'=>__('Events Paging','eventon'),
				'tab_name'=>__('Events Paging','eventon'),
				'icon'=>'files-o',
				'fields'=>array(			
					array('id'=>'evcal__note','type'=>'note','name'=>__('This page will allow you to control templates and permalinks related to eventon event pages.','eventon')),
					
					array('id'=>'evo_event_archive_page_id',
						'type'=>'dropdown',
						'name'=>__('Select Events Page','eventon'), 
						'options'=>$this->event_pages(), 
						'desc'=>__('This will allow you to use this page with url slug /events/ as event archive page. Be sure to insert eventon shortcode in this page.','eventon')
					),
					array('id'=>'evo_event_archive_page_template','type'=>'dropdown','name'=>__('Select Events Page Template','eventon'), 'options'=>$this->theme_templates()),					
					array('id'=>'evo_event_slug',
						'type'=>'text',
						'name'=>__('EventOn Event Post Slug','eventon'), 
						'default'=>'events'
					),
					array('id'=>'evcal__note','type'=>'note',
						'name'=>__('NOTE: If you change the slug for events please be sure to refresh permalinks for the new single event pages to work properly..','eventon')),
					array('id'=>'evcal__note','type'=>'note',
						'name'=>__('PROTIP: If the /events page does not work due to theme/plugin conflicts, create a new page, call it <b>"Events Directory"</b> Insert eventon shortcode and use that as your main events page which will have a URL ending like /events-directory. This would be a perfect solution if you have conflicts with /events slug.','eventon')),
					array('id'=>'evo_ditch_sin_template','type'=>'yesno',
						'name'=>__('Stop using eventON single event template for single event pages','eventon'),
						'legend'=>'If you dont want eventON single events template been used for individual event pages you can enable this option to stop using single event template altogether and fall back to default theme template'),
						array('id'=>'evcal__note','type'=>'note',
							'name'=> sprintf(__('<a href="%s" target="_blank"class="evo_admin_btn btn_triad">Learn How to customize events archive page</a></br>' ,'eventon'), 'http://www.myeventon.com/documentation/how-to-customize-events-archive-page/') 
						),


					array('type'=>'sub_section_open',
						'name'=>__('Event Text String Settings','eventon'), 
						),
						array('id'=>'evo_label',
							'type'=>'note',
							'name'=>__('Below settings will allow you to change the event text strings for backend and frontend quickly. These text strings can also be translated using a translator for backend of your website.','eventon'), 
						),
						array('id'=>'evo_textstr_sin',
							'type'=>'text',
							'name'=>__('Event text string (singular text)','eventon'), 
							'default'=> __('Event','eventon'),
						),array('id'=>'evo_textstr_plu',
							'type'=>'text',
							'name'=>__('Event text string (plural text)','eventon'), 
							'default'=> __('Events','eventon'),
						),
					array('type'=>'sub_section_close'),
				)
			),array(
				'id'=>'evcal_012',
				'name'=>__('Shortcode Settings','eventon'),
				'tab_name'=>__('ShortCodes','eventon'),
				'icon'=>'code',
				'fields'=>array(			
					array('id'=>'evcal__note','type'=>'customcode','code'=>$this->content_shortcodes()),
				)
			),
			// Single Events
				array(
					'id'=>'eventon_social',
					'name'=> __('Settings for Single Events','eventon'),
					'display'=>'none',
					'tab_name'=> __('Single Events','eventon'),
					'icon'=>'calendar',
					'fields'=> $this->single_events()
				),

			// search
				array(
					'id'=>'eventon_search',
					'name'=> __('Settings & Instructions for Event Search','eventon'),
					'display'=>'none','icon'=>'search',
					'tab_name'=> __('Search Events','eventon'),
					'fields'=> apply_filters('evo_sr_setting_fields', array(
						array('id'=>'evo_sr_001','type'=>'customcode',
								'code'=>$this->content_search()
						),
						array('id'=>'evosr_default_search_on',
							'type'=>'yesno',
							'name'=>'Enable Search on all calendars by default',
							'legend'=>'If you set this, search will be on calendars by default unless specify via shortcode search=no.'
						),
						array('id'=>'EVOSR_showfield',
							'type'=>'yesno',
							'name'=>'Show search text input field when calendar first load on page',
							'legend'=>'This will show the search field when the page first load instead of having to click on search button'
						),
						
						array('id'=>'EVOSR_default_search',
							'type'=>'yesno',
							'name'=>'Include events in default wordpress search results',
							'legend'=>'This will include events in default wordpress search results, be aware you may have to add custom styles to match the search results from events to rest of your results. You may also have to add custom codes to get all event information to show in event search result'
						),

					))
				),			
			
		)
		);	
	}

	// single events
		function single_events(){
			$data[] = array('type'=>'sub_section_open','name'=> __('Single Event Page','eventon') );

			$data[] = array('id'=>'evosm_disable_ogs','type'=>'yesno',
				'name'=>__('Disable auto generated OG: meta data in the single event page header.','eventon'),
				'legend'=> __('Auto generated OG: meta tags will help your website share proper information via facebook.','eventon')
			);
			$data[] = array('id'=>'evosm_1','type'=>'yesno',
				'name'=>__('Create Single Events Page Sidebar','eventon'),
				'legend'=>__('This will create a sidebar for single event page, to which you can add widgets from Appearance > Widget','eventon')
						);
			$data[] = array('id'=>'evosm_loggedin','type'=>'yesno',
				'name'=>__('Restrict single event pages to logged-in users only','eventon'), 
				'legend'=>__('Settings this will restrict single events page content to logged-in users to your site','eventon')
			);

			$data[] = array('id'=>'evosm_comments_hide',
				'type'=>'yesno',
				'name'=>__('Disable comments section on single event template page','eventon'), 
				'legend'=>__('This will hide comments box from showing on single event page','eventon')
			);
			$data[] = array('id'=>'evosm_eventtop_style','type'=>'dropdown',
				'name'=>__('Select EventTop Style','eventon'),
				'legend'=>'This will set the single event page eventTop style',
				'options'=>array(
						'color'=>'Colorful',
						'white'=>'Clean White',
					)
				);
			$data[] = array('id'=>'evosm_ics_link',
				'type'=>'yesno',
				'name'=>__('Disable event link in ICS file','eventon'), 
				'legend'=>__('This will adding a event link into description section of ICS file for add to calendar.','eventon')
			);


			$data[] = array('type'=>'sub_section_close');

			$data[] = array('id'=>'evosm','type'=>'sub_section_open',
				'name'=>__('Social Media Control','eventon'));
			$data[] = array('id'=>'evosm_som','type'=>'yesno',
				'name'=>__('Show social media share icons only on single events','eventon'), 
				'legend'=>__('Setting this to Yes will only add social media share link buttons to single event page and single event box you created','eventon'));	
			$data[] = array('id'=>'evosm_diencode','type'=>'yesno',
				'name'=>__('Disable social media event link encoding for special characters','eventon'), 
				'legend'=>__('Enabling this will stop encoding the URL of event on social share options including email share.','eventon')
			);			
			$data[] = array('type'=>'sub_section_close');	

			$data[] = array('id'=>'evosm','type'=>'sub_section_open','name'=>__('Shareable Options','eventon'));
			$data[] = array('id'=>'eventonsm_fbs','type'=>'yesno','name'=>__('Facebook Share','eventon'));
			$data[] = array('id'=>'eventonsm_tw','type'=>'yesno','name'=>__('Twitter','eventon'));
			$data[] = array('id'=>'eventonsm_ln','type'=>'yesno','name'=>__('LinkedIn','eventon'));
			//$data[] = array('id'=>'eventonsm_wa','type'=>'yesno','name'=>'Whatsapp');
			//$data[] = array('id'=>'eventonsm_sms','type'=>'yesno','name'=>'SMS');
			$data[] =array('id'=>'eventonsm_pn','type'=>'yesno','name'=>__('Pinterest (Only shows if the event has featured image)','eventon'));
			$data = apply_filters('evo_single_sharable', $data);

			$data[] =array('id'=>'eventonsm_email','type'=>'yesno',
				'name'=>__('Share Event via Email','eventon'),
				'legend'=>__('This will trigger a new email in the users device.','eventon'),
					'afterstatement'=>'eventonsm_email'
			);

			$data[] =array('id'=>'eventonsm_note','type'=>'note',
				'name'=>__('NOTE: Go to "EventCard" and rearrange where you would like the social share icons to appear in the eventcard for an event.','eventon'));
			$data[] = array('type'=>'sub_section_close');
			
			return apply_filters('evo_se_setting_fields',$data);
		}

	// Search
		function content_search(){
			ob_start();?>
			<p>By default search icon and search bar are not visible in all calendars!<br/>You can <strong>enable search</strong> by enabling the search on all calendars by default option below or by adding the below shortcode variable into individual eventon calendar shortcode:
			<br/><br/><code>search="yes"</code> example within a shortcode <code>[add_eventon search="yes"]</code> 
			<br/><br/>The placeholder text that shows in the search bar can be edited from <strong>language</strong>.
			<br/>NOTE: In basic event list, search feature can only search for events in first month. If you want to allow search for multiple months on an event list, please check out <a href='https://www.myeventon.com/addons/event-lists-extended/' target='_blank'>Event Lists Ext Addon</a>.
			</p>
			<?php return ob_get_clean();
		}

	// HTML code for export events in csv and ics format
		function export(){
			
			$nonce = wp_create_nonce('eventon_download_events');
			
			// CSV format
			$exportURL = add_query_arg(array(
			    'action' => 'eventon_export_events',
			    'nonce'=>$nonce
			), admin_url('admin-ajax.php'));

			// ICS format
			$exportICS_URL = add_query_arg(array(
			    'action' => 'eventon_export_events_ics',
			    'nonce'=>$nonce
			), admin_url('admin-ajax.php'));

			ob_start(); ?>
			<p><a href="<?php admin_url();?>options-permalink.php" class="evo_admin_btn btn_secondary"><?php _e('Reset Permalinks','eventon');?></a></p>
			
			<p><?php _e('Download all eventON events.','eventon');?></p>
			<p><a class='evo_admin_btn btn_triad' href="<?php echo $exportURL;?>"><?php _e('CSV Format','eventon');?></a>  <a class='evo_admin_btn btn_triad' href="<?php echo $exportICS_URL;?>"><?php _e('ICS format','eventon');?></a></p>
			<?php 
			return  ob_get_clean();
		}

		function eventtop_settings(){
			
			$num = evo_calculate_cmd_count($this->evcal_opt[1]);
			$_add_tax_count = evo_get_ett_count($this->evcal_opt[1]);
			$_tax_names_array = evo_get_ettNames($this->evcal_opt[1]);
			
			$arr = array(
				'time'=>__('Event Time (to and from)','eventon'),
				'location'=>__('Event Location Address','eventon'),
				'locationame'=>__('Event Location Name','eventon'),				
			);

			// additional taxonomies
			for($n=1; $n<= $_add_tax_count; $n++){
				$__tax_fields = 'eventtype'.($n==1?'':$n);
				$__tax_name = $_tax_names_array[$n];
				$arr[$__tax_fields]=__($__tax_name.' (Category #'.$n.')','eventon');
			}


			$arr['tags']=__('Event Tags','eventon');
			$arr['dayname']=__('Event Day Name','eventon');
			$arr['eventyear']=__('Event Start Year','eventon');
			$arr['eventendyear']=__('Event End Year (If different than start year)','eventon');
			$arr['organizer']=__('Event Organizer','eventon');

			// add custom fields
			for($x=1; $x < ($num+1); $x++){
				if(!empty($this->evcal_opt[1]['evcal_af_'.$x])  && $this->evcal_opt[1]['evcal_af_'.$x]=='yes' && !empty($this->evcal_opt[1]['evcal_ec_f'.$x.'a1']) ){

					// disable textarea fields
					if( $this->evcal_opt[1]['evcal_ec_f'.$x.'a2'] != 'textarea'){
						$arr['cmd'.$x] = $this->evcal_opt[1]['evcal_ec_f'.$x.'a1'] .' ('. __('Field Type','eventon') .': '. $this->evcal_opt[1]['evcal_ec_f'.$x.'a2'].')';	
					}
									
				}else{ break;}
			}

			return $arr;
		}

		public function eventtop_tags(){
			$arr = array(
				'virtual'=>__('Virtual Event','eventon'),
				'virtual_physical'=>__('Virtual/ Physical Event','eventon'),
				'status'=>__('Event Status eg. cancelled, reschedule etc.','eventon'),			
				'featured'=>__('Featured','eventon'),			
			);

			return $arr;
		}

		function event_type_options(){
			$event_type_names = evo_get_ettNames($this->evcal_opt[1]);
			// event types category names		
			$ett_verify = evo_get_ett_count($this->evcal_opt[1] );

			$event_type_options = array();
			
			$event_type_options['event_past_future'] = __('Past & Future Event Filtering','eventon');
			$event_type_options['event_virtual'] = __('Virtual Event Filtering','eventon');
			$event_type_options['event_status'] = __('Event Status Filtering','eventon');

			for($x=1; $x< ($ett_verify+1); $x++){
				$ab = ($x==1)? '':'_'.$x;
				$event_type_options['event_type'.$ab] = $event_type_names[$x];
			}

			$event_type_options['event_location'] = __('Event Location','eventon');
			$event_type_options['event_organizer'] = __('Event Organizer','eventon');

			$event_type_options['event_tag'] = __('Event Tags','eventon');
			
			return apply_filters('evo_settings_filtering_taxes',$event_type_options);
		}

	// rearrange fields
		function rearrange_code(){	
			$HH = new evo_cal_help();
			return $HH->get_eventcard_fields( true);
		}

	// HTML for eventcard designer
		function eventcard_meta_fields(){
			ob_start();

			$cal_help = new evo_cal_help();

			$event_card_fields = $this->rearrange_code();

			$all_fields = array();
			foreach($event_card_fields as $FK=>$FF){
				if( empty($FF)) continue;
				$all_fields[] = $FK;
			}

			// variable to save this data -- evo_ecl - eventcard layout
			$evo_ecl = $cal_help->get_eventcard_structure_array( $this->evcal_opt[1] );

			// preprocess legacy settings to new version
			if( empty($evo_ecl)){

				$fields = $hidden_items = array();

				// previous saved event order
				if( !empty($this->evcal_opt[1]['evoCard_order'])){
					$old_order = $this->evcal_opt[1]['evoCard_order'];
					
					$fields = explode(',', $old_order);
					$hidden_items = !empty($this->evcal_opt[1]['evoCard_hide']) ? $this->evcal_opt[1]['evoCard_hide']: '';
					$hidden_items = explode(',', $hidden_items);
				}else{
					$fields = $all_fields;
				}

				$count = 1;
				foreach($fields as $ii){

					if( empty($ii)) continue;
					if( in_array($ii, array('time','location','learnmore','learnmore'))) continue;

					if( $ii == 'timelocation'){
						$evo_ecl[ $count][1] = array(
							'n' =>'time','h'=> (in_array($ii, $hidden_items) ? 'y': ''),
						);
						$evo_ecl[ $count][2] = array(
							'n' =>'location','h'=> (in_array($ii, $hidden_items) ? 'y': ''),
						);
						$count++; continue;
					}

					if( $ii == 'learnmoreICS'){
						$evo_ecl[ $count][1] = array(
							'n' =>'learnmore','h'=> (in_array($ii, $hidden_items) ? 'y': ''),
						);
						$evo_ecl[ $count][2] = array(
							'n' =>'addtocal','h'=> (in_array($ii, $hidden_items) ? 'y': ''),
						);
						$count++; continue;
					}

					$evo_ecl[ $count][1] = array(
						'n' =>$ii,'h'=> (in_array($ii, $hidden_items) ? 'y': ''),
					);
					$count++;
				}
			}

			$default_evc_color = EVO()->cal->get_prop('evcal__bc1in','evcal_1');
			if( !$default_evc_color) $default_evc_color = 'f3f3f3';

			$processed_fields = array();

			?>
			<div class='evo_card_designer' data-dc='<?php echo $default_evc_color;?>'>
				<div class='evocard_design_holder'>
					<?php 

					$used_fields = array();

					//print_r($evo_ecl);

					foreach($evo_ecl as $R=>$boxes){

						$L = ( array_key_exists('L1', $boxes)) ? ' L':'';
						$CC = '';
						
						foreach($boxes as $B=>$DD){
							if( !isset($DD['n'])) continue;
							$N = $DD['n'];

							if( in_array($N, $all_fields)) $used_fields[] = $N;
							
							$H = isset($DD['h']) ? $DD['h']:'';
							$C = !empty($DD['c']) ? $DD['c']:$default_evc_color;

							if( !isset( $event_card_fields[$N][1] )) continue;

							// if already processed
							if( in_array( $N, $processed_fields)) continue;
							$processed_fields[] = $N;
							

							if( $B == 'L1' || $B == 'R1') $CC .= "<span class='ecd_row_box_h'>";

							// if display the color reset button
							$clr_reset = $default_evc_color == $C ? ' dn':'';
							
							$name = $event_card_fields[$N][1];
							$CC .= "<span class='ecd_row_box". ($H ? ' hidden':'') ."' data-b='{$B}' data-n='{$N}' data-h='{$H}' data-c='{$C}'> 
								<span class='ecd_act1'>
									<i class='vis fa fa-eye". ($H ? '-slash':'') ."'></i>
									<span class='colorselector clr' hex='{$C}' style='background-color:#{$C}' title='". __('Field Color','eventon')."'></span>
									<span class='clr_reset{$clr_reset}' data-hex='{$default_evc_color}' style='background-color:#{$default_evc_color}' title='". __('Reset to Default Color','eventon')."'></span>
								</span>
								<em>{$name}</em>
								<span class='ecdad_act'><i class='fa fa-minus-circle'></i></span>
								</span>";

							if( $B == 'L2' || $B == 'R2') $CC .= "</span>";
						}

						if( empty($CC)) continue;

						echo "<p class='ecd_row{$L}' data-r='{$R}'><span class='ecd_row_in'>".$CC."</span><i class='fa fa-minus-circle ecd_del_row'></i></p>";
					}	

					$unused_fields = array_diff($all_fields , $used_fields);

					?>

				</div>
				<input type='hidden' id='evo_card_fields' value='<?php echo json_encode($evo_ecl);?>' name='evo_ecl'/>
				
				<p id='ecd_adding_buttons'>
					<b>+ Add a row</b>
					<span class='ecd_add_rows full' data-c='1'><b></b></span> 
					<span class='ecd_add_rows half' data-c='2'><b></b><b></b></span>
					<span class='ecd_add_rows onethird' data-c='3'><b></b><b></b><b></b></span>	
					<span class='ecd_add_rows halfL' data-hc='2' data-hl='L' data-c='1'><em><b></b><b></b></em><b></b></span>	
					<span class='ecd_add_rows halfR' data-hc='2' data-hl='R' data-c='1'><b></b><em><b></b><b></b></em></span>	
				</p>
				<div id='evo_card_field_selector' class=''>
					<h4 style='margin:0 0 10px'>Unused Event Card Fields</h4>
					<div id='evo_card_field_selector_f'>
						<?php
						if( is_array($unused_fields) && count($unused_fields)>0){
							foreach($unused_fields as $ff){
								if( in_array($ff, array('timelocation','learnmoreICS'))) continue;
								echo "<span data-n='{$ff}'>". $event_card_fields[$ff][1] ."</span>";
							}
						}
						?>
					</div>
					<p class='nothing' style='<?php echo count($unused_fields) > 0 ? "display:none":'';?>'>You are using all the available fields!</p>
					<span style='margin-top:10px' id='evo_card_field_selector_c' class='evo_admin_btn btn_triad'>Cancel</span>
				</div>


			</div>

			<?php

			return ob_get_clean();
		}
		
	// custom meta fields
		function custom_meta_fields(){
			// reused array parts
			$__additions_009_1 = apply_filters('eventon_cmd_field_types', array(
				'text'=>__('Single line Text','eventon'),
				'textarea'=>__('Multiple lines of text (Editor)','eventon'), 
				'textarea_basic'=>__('Multiple lines of text (Text Field)','eventon'), 
				'button'=>__('Button','eventon')
			) );

			// additional custom data fields
			for($cm=1; $cm<evo_max_cmd_count(); $cm++){
				$__additions_009_a[$cm]= $cm;
			}

			// fields for each custom field
			$cmf_count = !empty($this->evcal_opt[1]['evcal_cmf_count'])? $this->evcal_opt[1]['evcal_cmf_count']: 3;
			
			$cmf_addition_x= array(
				array('id'=>'evcal__note','type'=>'note',
					'name'=> '<b>'. __('NOTE','eventon'). ': </b>'. 
						__('Once new data field is activated go to <b>myEventon> Settings> EventCard</b> and rearrange the order of this new field and save changes for it to show on front-end. Custom field types Textarea is not supported for showing on eventtop.','eventon').'<br/>'.
						__('If you change field name for custom fields make sure it is updated in <b>myEventon > Language</b> as well.','eventon').
						'<br/>(* '. __('Required values','eventon'). ')'
				),
				
				array('id'=>'evcal_cmf_count','type'=>'dropdown','name'=>__('Number of Additional Custom Data Fields','eventon'), 'options'=>$__additions_009_a, 'default'=>3),);

			for($cmf=0; $cmf< $cmf_count; $cmf++){
				$num = $cmf+1;

				$cmf_addition = array( 
					array('id'=>'evcal_af_'.$num,'type'=>'yesno',
						'name'=>__('Activate Additional Field #','eventon').$num,
						'legend'=> __('This will activate additional event meta field.','eventon'),
						'afterstatement'=>'evcal_af_'.$num.''),
					array('id'=>'evcal_af_'.$num,'type'=>'begin_afterstatement'),
					array('id'=>'evcal_ec_f'.$num.'a1','type'=>'text','name'=>__('Field Name*','eventon')),
					array('id'=>'evcal_ec_f'.$num.'a2','type'=>'dropdown','name'=>__('Content Type','eventon'), 'options'=>$__additions_009_1),
					array('id'=>'evcal__fai_00c'.$num.'','type'=>'icon','name'=>__('Icon','eventon'),'default'=>'fa-asterisk'),
					array('id'=>'evcal_ec_f'.$num.'a3','type'=>'yesno','name'=>__('Hide this field from front-end calendar','eventon')),
					array('id'=>'evcal_ec_f'.$num.'a4','type'=>'dropdown','name'=>__('Visibility Type','eventon'), 
						'options'=>array('all'=>'Everyone','admin'=>'Admin Only','loggedin'=>'Logged-in Users Only')
						),
					array('id'=>'evcal_ec_f'.$num.'a5','type'=>'yesno','name'=>__('Show login required message, if visibility type is Logged-in users only','eventon'),'legend'=>__('This will show the data row in eventcard but instead of the actual data it will show a message asking the user to login to see the date for users that are not logged into the site.','eventon')),
					array('id'=>'evcal_af_'.$num,'type'=>'end_afterstatement')
				);

				$cmf_addition_x = array_merge($cmf_addition_x, $cmf_addition);
			}

			return $cmf_addition_x;
		}
	// event type categories
		function event_type_categories(){
			global $eventon;

			$etc = array(
				array('id'=>'evcal_fcx','type'=>'note','name'=>__('Use this to assign custom names for the event type taxonomies which you can use to categorize events. Note: Once you update these custom taxonomies refresh the page for the values to show up.','eventon')),
				array('id'=>'evcal_eventt','type'=>'text','name'=>__('Custom name for Event Type Category #1','eventon')),
				array('id'=>'evcal_eventt2','type'=>'text','name'=>__('Custom name for Event Type Category #2','eventon')),
				array('id'=>'evcal_fcx','type'=>'note','name'=>__('In order to add additional event type categories make sure you activate them in order. eg. Activate #4 after you activate #3','eventon')),
			);
			
			for($x=3; $x<= evo_max_ett_count(); $x++){
				$etcx = array(
					array('id'=>'evcal_ett_'.$x,'type'=>'yesno',
						'name'=>__('Activate Event Type Category #','eventon').$x,
						'legend'=> __('This will activate additional event type category.','eventon'),
						'afterstatement'=>'evcal_ett_'.$x),
					array('id'=>'evcal_ett_'.$x,'type'=>'begin_afterstatement'),
						array('id'=>'evcal_eventt'.$x,'type'=>'text',
							'name'=>__('Category Type Name','eventon')),
					array('id'=>'evcal_ett_'.$x,'type'=>'end_afterstatement'),
				);
				$etc = array_merge($etc, $etcx);
			}

			// Note
				$etc[] = array('id'=>'evo_note','type'=>'note','name'=>sprintf(__('Want more than 5 event categories? <br/><br/><a href="%s" target="_blank"class="evo_admin_btn btn_triad">Extend categories using pluggable functions</a>' ,'eventon'), 'http://www.myeventon.com/documentation/increase-event-type-count/') );

			return $etc;
		}

	/**
	 * theme pages and templates
	 * @return  
	 */
		function event_pages(){
			$pages = new WP_Query(array('post_type'=>'page','posts_per_page'=>-1));
			$_page_ar[]	='--';
			while($pages->have_posts()	){ $pages->the_post();								
				$page_id = get_the_ID();
				$_page_ar[$page_id] = get_the_title($page_id);
			}
			wp_reset_postdata();
			return $_page_ar;
		}
		function theme_templates(){
			// get all available templates for the theme
			$templates = get_page_templates();
			$_templates_ar['archive-ajde_events.php'] = 'Default Eventon Template';
			$_templates_ar['page.php'] = 'Default Page Template';
		   	foreach ( $templates as $template_name => $template_filename ) {
		       $_templates_ar[$template_filename] = $template_name;
		   	}
		   	return $_templates_ar;
		}

	function content_shortcodes(){
		ob_start();
		?>
			<p><?php _e('Use the "Generate shortcode" button to open lightbox shortcode generator to create your desired calendar shortcode.','eventon');?></p><br/>
			
			<a id="evo_shortcode_btn" class="ajde_popup_trig evo_admin_btn btn_prime" title="eventON Shortcode generator" data-popc='eventon_shortcode' href="#" data-textbox='evo_set_shortcodes'>[ ] <?php _e('Generate shortcode','eventon');?></a><br/>
			<p id='evo_set_shortcodes'></p>

			<p style='padding-top:10px'><b><?php _e('Frequently Used Shortcodes','eventon');?></b></p>
			<p><?php _e('[add_eventon] -- Default month calendar','eventon');?></p>
			<p><?php _e('[add_eventon_list number_of_months="5" hide_empty_months="yes" ] -- 5 months events list with empty months hidden from view','eventon');?></p>
			<p><?php _e('[add_eventon_list number_of_months="5" month_incre="-5" ] -- Show list of 5 past months','eventon');?></p>
			<p><i><?php _e('NOTE: For more shortcode examples and usage please visit demo.myeventon.com','eventon');?></i></p>

		<?php

		// throw shortcode popup codes
		EVO()->evo_admin->eventon_shortcode_pop_content();

		return ob_get_clean();
		
	}
		
	// Appearnace class
		public function appearance(){
			$appearance = new evoadmin_set_appearance($this->evcal_opt);
			return $appearance->get( );
		}
	// scripts class
		public function scripts(){
			$SCR = new Evo_Admin_Settings_Scripts();
			return $SCR->get();
		}
}
