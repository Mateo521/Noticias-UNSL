<?php
/**
 * Virtual Event Settings 
 * @version 4.2.2
 */	


$vir_type = $EVENT->virtual_type();	
$vir_link_txt = __('Zoom Meeting URL to join','eventon');
$vir_pass_txt = __('Zoom Password','eventon');
$vir_o = '';

?>
<div id='evo_virtual_details_in' style='padding:25px;'>
<form class='evo_virtual_settings'>
<input type="hidden" name="event_id" value='<?php echo $EVENT->ID;?>'>
<input type="hidden" name="action" value='eventon_save_virtual_event_settings'>

<?php 
if( !$EVENT->is_virtual_data_ready()): ?>
<p class='evo_notice'><?php _e('Either Virtual URL or Embed content is required!','eventon');?>!</p>
<?php endif;?>

<p class='row' style='padding-bottom: 15px;'>
	<label><?php _e('Virtual Event Boradcasting Method','eventon');?></label>
	<span style='display: flex'>
	<select name='_virtual_type' class='evo_eventedit_virtual_event'>
		<?php foreach(array(
			'zoom'=> array(
				__('Zoom','eventon'),
				__('Zoom Meeting URL to join','eventon'),
				__('Zoom Password','eventon'),
			),
			'youtube_live'=>array(
				__('Youtube Live','eventon'),
				__('Youtube Channel ID','eventon'),
				__('Optional Access Pass Information','eventon'),
				__('Find channel ID from https://www.youtube.com/account_advanced','eventon')
			),
			'youtube_private'=> array(
				__('Youtube Private Recorded Event','eventon'),
				__('Youtube Video URL','eventon'),
				__('Optional Access Pass Information','eventon'),
			),
			'google_meet'=>array(
				__('Google Meet','eventon'),
				__('Google Meet URL','eventon'),
				__('Optional Access Pass Information','eventon'),
			),
			'jitsi'=>array(
				__('Jit.si','eventon'),
				__('Jit.si meet URL ID','eventon'),
				__('Optional Password','eventon'),
			),
			'vimeo'=>array(
				__('Vimeo','eventon'),
				__('Vimeo Live Video URL','eventon'),
				__('Optional Vimeo Password','eventon'),
				__('Optional Vimeo Embed HTML code','eventon'),
			),
			'twitch'=>array(
				__('Twitch','eventon'),
				__('Twitch Live Video URL','eventon'),
				__('Optional Twitch Password','eventon'),
				__('Optional Twitch Embed HTML code','eventon'),
			),
			'facebook_live'=>array(
				__('Facebook Live','eventon'),
				__('Facebook Live Video URL','eventon'),
				__('Optional Access Pass Information','eventon'),
			),
			'periscope'=>array(
				__('Periscope','eventon'),
				__('Periscope Video URL','eventon'),
				__('Optional Access Pass Information','eventon'),
			),
			'wistia'=>array(
				__('Wistia','eventon'),
				__('Wistia Video URL','eventon'),
				__('Optional Wistia Password','eventon'),
				__('Optional Wistia Embed HTML code','eventon'),
			),
			'rtmp'=>array(
				__('RTMP Stream','eventon'),
				__('RTMP URL','eventon'),
				__('Optional Access Pass Information','eventon'),
				__('Optional RTMP Embed HTML code','eventon'),
			),
			'other_live'=>array(
				__('Other Live Stream','eventon'),
				__('Live Event URL','eventon'),
				__('Optional Access Pass Information','eventon'),
			),
			'other_recorded'=>array(
				__('Other Pre-Recorded Video of Event','eventon'),
				__('Recorded Event Video URL','eventon'),
				__('Optional Access Pass Information','eventon'),
			),
		) as $F=>$V){
			if($vir_type == $F){
				$vir_link_txt = $V[1];
				$vir_pass_txt = $V[2];
				if(isset($V[3])) $vir_o = $V[3];
			}
			echo "<option value='{$F}' ". ($vir_type ==$F ? 'selected="selected"':'') ." data-l='{$V[1]}' data-p='{$V[2]}' data-o='". (isset($V[3])? $V[3]:''). "'>{$V[0]}</option>";
		}?>
	</select>											
</p>


<p class='row vir_link'>
	<label><?php echo $vir_link_txt;?></label>
	<input name='_vir_url' value='<?php echo $EVENT->get_virtual_url();?>' type='text' style='width:100%'/>
	<em><?php echo ($vir_o) ? $vir_o:''?></em>
</p>

<p class='row sel_moderator'>
	<?php 
		$btn_data = array(
			'lbvals'=> array(
				'lbc'=>'sel_moderator',
				't'=>__('Select moderator for event','eventon'),
				'ajax'=>'yes',
				'd'=> array(					
					'eid'=> $EVENT->ID,
					'action'=> 'eventon_select_virtual_moderator',
					'uid'=>'evo_get_vir_mod_events',
					'load_new_content'=>true
				)
			)
		);
	?>
	<label><?php _e('Select moderator for the virtual event','eventon')?></label>
	<span class='evo_btn evolb_trigger' <?php echo $this->helper->array_to_html_data($btn_data);?> data-popc='print_lightbox' data-lb_cl_nm='sel_moderator' data-lb_sz='small' data-t='<?php _e('Select Moderator for Virtual Event','eventon');?>' data-eid='<?php echo $EVENT->ID;?>' style='margin-right: 10px'><?php $EVENT->get_prop('_mod') ? _e('Update Moderator','eventon') : _e('Select Moderator','eventon');?></span>
</p>


<div class='evo_edit_field_box' style='background-color: #e0e0e0;' >
	<p style='font-size: 16px;'><b><?php _e('Other Information','eventon');?></b></p>
	<p class='row vir_pass'>
		<label><?php echo $vir_pass_txt?></label>
		<input name='_vir_pass' value='<?php echo $EVENT->get_virtual_pass();?>' type='text' style='width:100%'/>
	</p>										
	<p class='row'>
		<label><?php _e('(Optional) Embed Event Video HTML Code','eventon');?></label>
		<textarea name='_vir_embed' style='width:100%'><?php echo $EVENT->get_prop('_vir_embed');?></textarea>
	</p>	
	<p class='row'>
		<label><?php _e('(Optional) Other Additional Event Access Details','eventon');?></label>
		<input name='_vir_other' value='<?php echo $EVENT->get_prop('_vir_other');?>' type='text' type='text' style='width:100%'/>
	</p>
</div>


<?php
	echo EVO()->elements->process_multiple_elements(
		array(									
			array(
				'type'=>	'dropdown',
				'id'=>		'_vir_show', 
				'value'=>		$EVENT->get_prop('_vir_show'),
				'input'=>	true,
				'options'=> apply_filters('evo_vir_show', array(
					'always'=>__('Always','eventon'),
					'10800'=>__('3 Hours before the event start','eventon'),	
					'7200'=>__('2 Hours before the event start','eventon'),	
					'3600'=>__('1 Hour before the event start','eventon'),	
					'1800'=>__('30 Minutes before the event start','eventon'),	
					'01'=>__('Right when event starts','eventon'),	
				)),
				'name'=> __('When to show the above virtual event information on event card', 'eventon'),
				'tooltip'=> __( 'This will set when to show the virtual event link and access information on the event card.','eventon')
			),	
			array(
				'type'=>	'yesno_btn',
				'id'=>		'_vir_hide', 
				'value'=>		$EVENT->get_prop('_vir_hide'),
				'input'=>	true,
				'label'=> 	__('Hide above access information when the event is live', 'eventon'),
				'tooltip'=> __('Setting this will hide above access information when the event is live.','eventon'),
			),
			array(
				'type'=>	'yesno_btn',
				'id'=>		'_vir_nohiding', 
				'value'=>		$EVENT->get_prop('_vir_nohiding'),
				'input'=>	true,
				'label'=> 	__('Disable redirecting and hiding virtual event link', 'eventon'),
				'tooltip'=> __('Enabling this will show virtual event link without hiding it behind a redirect url.','eventon'),
			),		
		)
	);	
?>


<?php do_action('evo_editevent_vir_options', $EVENT);?>

<p style='padding-top: 15px;'><em>
	<b><?php _e('Other Recommendations','eventon');?></b><br/><?php _e('Set Event Status value to "Moved Online" so proper schema data will be added to event to help search engines identify event type.','eventon');?>
	<br/><?php echo sprintf( wp_kses( __('Use <a href="%s">Tickets Addon</a> to create paid virtual events or <a href="%s">RSVP Addon</a> to show virtual event access information after customers have RSVPed to event. <a href="%s">Countdown Addon</a> to show countdown till event goes live. <a href="%s">Reviewer Addon</a> to ask attendees to leave a review after the event. <a href="%s">Virtual Plus Addon</a> for even more features.','eventon'), array('a'=> array('href'=>array()) )  ), 
		esc_url('https://www.myeventon.com/addons/event-tickets/'), 
		esc_url('https://www.myeventon.com/addons/rsvp-events/'), 
		esc_url('https://www.myeventon.com/addons/event-countdown/'), 
		esc_url('https://www.myeventon.com/addons/event-reviewer/'), 
		esc_url('https://www.myeventon.com/addons/event-virtual-plus/') 
		) ;?></em></p>

<p><span class='evo_btn save_virtual_event_config ' data-eid='<?php echo $EVENT->ID;?>' style='margin-right: 10px'><?php _e('Save Changes','eventon');?></span></p>	

</form>

</div>
