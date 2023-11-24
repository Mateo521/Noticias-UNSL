<?php
/**
 * Global EventON templates
 */

class EVO_Temp{
	// return the template HTML
	function get($type){

		ob_start();
		switch($type){
			case has_action("evo_temp_{$type}"):
				do_action("evo_temp_{$type}");	
			break;
			case 'event_something':
			?>
			
			<div class='evotx'>

			</div>

			<?php
			break;
		}

		return ob_get_clean();
	}
}