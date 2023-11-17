/**
EventON Elementor
@version 2.9
**/

jQuery(document).ready(function($){ 
	var SC = '';
	var code_field_obj = '';

// open the shortcode generator
	$('body').on('click','.trigger_shortcode_generator', function(){

		elm_controls =  $(this).closest('#elementor-controls')
		code_field_obj = elm_controls.find('.elementor-control-evo_shortcode textarea');
		
		SC = code_field_obj.val();

		$('body').trigger('evo_open_shortcode_generator',[ SC, 'elementor']);		
	});

	$('body').on('evo_shortcode_generator_saved',function(event, code, data){  

        if( 'type' in data && data.type == 'elementor'){
        	SC = code;
        	code_field_obj.val( SC ).trigger('change');
        	console.log( SC);
        }
    });
});