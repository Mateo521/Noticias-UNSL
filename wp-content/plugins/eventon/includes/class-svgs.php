<?php
/**
 * EventON SVG Icons
 * @version 2.6.8
 */

class EVO_Svgs{
	private $svgs = array();
	public function __construct(){
		$this->load_all_svgs();
	}

	

	function get_all(){return $this->svgs;}

	function get_icon($slug){
		$svgs = $this->svgs;
		if(!isset($svgs[$slug])) return false;

		return stripslashes($svgs[$slug]);
	}

	function load_all_svgs(){
		$this->svgs = get_option('_evo_svgs');
		if(count($this->svgs)>0 && is_array($this->svgs)){
			$ss = array();
			foreach($this->svgs as $slug=>$code){
				$ss[$slug] = stripslashes($code);
			}

			$this->svgs = $ss;
		}
	}

	function _new($name, $code){
		$slug = str_replace(' ', '_', $name);
		$slug = str_replace('/[^A-Za-z0-9\-]/', '', $slug);
		$this->svgs[$slug] = $code;
		$this->save();
	}
	function delete($slug){
		if(!isset($this->svgs[$slug])) return true;
		unset($this->svgs[$slug]);
		$this->save();
	}
	private function save(){
		update_option('_evo_svgs',$this->svgs);
		$this->load_all_svgs();
	}


	function get_form(){
		$O = '';

		$F = new EVO_Forms();

		return $F->get_view(
			array(
				'plain'=>array(
					'markup'=>'h3',
					'name'=>'Welcome'
				),
				'input_2'=>array(
					'name'=>'Title', 'F'=>'title'
				),'textarea'=>array(
					'name'=>'SVG Icon Code','F'=>'code'
				),'submit'=>array(
					'name'=>'Add New',
					'class'=>'evo_admin_btn btn_prime evo_admin_submit_svg'
				)
			),
			array()
		);
	}
}