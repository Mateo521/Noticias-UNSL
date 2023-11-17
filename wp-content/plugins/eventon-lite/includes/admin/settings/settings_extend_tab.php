<?php
/**
 * EventON Settings Tab for extending
 * @version Lite 2.2
 */

?>

<div id="evcal_4" class="postbox evcal_admin_meta curve" style='overflow: hidden;padding:20px'>		

	<div class='evo_extend_page inside'>		
		

		<div class='evo_ft_compare'>
			
			<div class=''>
				<p><a href='https://myeventon.com/lite' target='_blank'><?php _e('Extend the features of EventON Lite with EventON Full','eventon');?> --></a></p>
				<h3 style='    text-transform: uppercase;font-size: 36px; font-weight: 900;'><?php _e('Compare Calendars','eventon');?></h3>
			</div>

			<div class='evoft_row fixed_top'>
				<div class='evoft_cell' style='background-color: #42c2f3'>
					<h3><a href='https://myeventon.com' target='_blank'><?php _e('EventON','eventon');?></a> <?php _e('Full Version','eventon');?></h3>
				</div>
				<div class='evoft_cell' style='background-color: #ffd548'>
					<h3><a href='https://myeventon.com/lite' target='_blank'><?php _e('EventON Lite','eventon');?></a></h3>
				</div>
			</div>

			<?php 

			// 2023.9.11
			foreach( array(
			array(__('Support daily, hourly, weekly, monthly, yearly and custom repeat events','eventon'),
				'Support daily, weekly, monthly, yearly and custom repeat events',
					__('General Features','eventon')),
			array(__('Interactive Shortcode Generator','eventon'),__('Interactive Shortcode Generator','eventon')),
			//array(__('','eventon'),__('','eventon')),
			array('Language corresponding events','—'),
			array('Event custom timezone text','—'),
			array('Autonomous Functions - Auto move past events to trash and set all past events as completed','No Autonomous Functions'),
			array('Remove EventON generated meta data from website header','Meta data stays on all the time'),
			array('Hide add eventon shortcode generator button from wp-admin','Can not hide'),
			array('Custom event calendar WP_Query methods for faster loading','Basic WP_Query method'),
			array('Add additional images to an event','Support one featured event image'),
			array('Gutenberg Calendar Block','same'),
			array('Elementor Basic Widget','same'),
			array('Diagnose eventon environment','No Diagnostics'),
			array('Additional search queries support - taxonomies, subtitle & postmeta values','Search event title and event details'),
			array('Healthcare Guidelines','same'),
			array('Virtual and physical event support','same'),
			array('Event Subtitle','same'),
			array('Various Event User Interaction Methods (On click, slide down, open single event page, open as lightbox, open external link or do nothing)','same'),
			array('Related Events Support','same'),			
			array('Customize no events section','—'),
			array('Event edit content load via ajax','Event edit content load on page'),
			array('Supports all EventON Addon','Require EventON'),
			
			array('Main Interactive Calendar','same','Calendar Design & Styles'),
			array('Live now calendar','same'),
			array('Schedule View with additional data','Schedule View'),
			array('Basic Events lists','same'),
			array('Various Event Tiles','same'),
			array('Separate Mobile Only User Interaction','Global User Interaction Only'),			
			array('Support Calendar Multi view switcher','—'),
			array('Tabbed Calendar view with multiple shortcodes (Beta)','—'),
			array('Gradient EventTop Colors','same'),

			array('Virtual event stream links with pass','Virtual event stream links with pass','Virtual Events'),
			array('Support after event content in virtual event box','—'),
			array('Ability to set when to show after event content','—'),

			array('Google API based maps','Google API based maps','Maps'),
			array('Support custom map styles','Default 1 map style'),
			array('Generate maps from address by default','Must enable when saving'),
			array('Restrict location info to loggedin users','No location info restrictions'),

			array('Support sorting options','same', 'Sorting & Filtering'),
			array('Support filter options','Support filter option'),
			array('Globally hide sort & filter bar on calendar','Can hide via shortcode'),
			array('Filter active indication','—'),
			array('Ability to reset filters on calendar','—'),

			array('Ability to disable JS libraries','Ability to disable JS libraries', 'Scripting'),
			array('Concatenate all eventon addon styles (Beta)','Require EventON'),

			array('Single Event Box Anywhere','same','Single Event'),
			array('Show only certain event data values','same'),
			array('Link to single event from anywhere','—'),
			array('Override event colors with event type colors on single event page','—'),
			array('Load current repeat event by default on single event page','—'),
			
			array('Support enabling/disabling various data fields','Support enabling/disabling various data fields','EventTop'),
			array('Show edit event button for each event on frontend for admin','—'),
			array('Ability to set default eventtop style','same'),
			array('White wash bubble event date style','same'),
			array('Show event custom meta data on eventtop','—'),
			array('EventTop Designer','—'),
			array('Crystal clear design style','—'),
			array('Immersive flow single event page design style','—'),

			array('EventCard Designer','EventCard Designer','EventCard'),			
			array('7 Eventcard designer layouts','5 Eventcard designer layouts'),
			array('Ability to set default event image','—'),
			array('ICS/iCAL and google calendar','ICS/iCAL and google calendar'),
			array('Various event image display styles','Various event image display styles'),

			array('Supports 5 default categories','Supports 5 default categories', 'Categories'),
			array('Ability to extend category count','Ability to extend category count'),
			array('Support multi data types','—'),
			array('Support event location & organizer taxonomy','Support event location & organizer taxonomy'),
			array('Support multiple organizers for an event','—'),
			
			array('Basic Paypal API support','Basic Paypal API support','3rd Party APIs'),
			array('Jitsi Integration','Jitsi Integration'),
			array('Zoom Integration','—'),
			array('Webhook Support','—'),
			
			array('Primary Support via helpdesk.ashanjay.com','Basic support via wordpress.org','Software Support'),
							
		) as $row){
				if( empty($row[0])) continue;
				?>
				<div class='evoft_row'>
					<div class='evoft_header <?php echo isset($row[2])?'rowheader_style':'';?>'><span><?php echo isset($row[2])?$row[2]:'';?></span></div>
					<div class='evoft_cell evoft_cell_1'><span><?php echo $row[0];?></span></div>
					<div class='evoft_cell'><span><?php echo $row[1] == 'same'? $row[0]: $row[1];?></span></div>
				</div>
				<?php
			}

			?>
		</div>
	</div>
	
</div>