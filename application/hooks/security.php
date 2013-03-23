<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Security {

	public function isLoggedIn() {
		
		$ci =& get_instance();
		
		$param = array(
			'classe' => $ci->router->class,
			'methode' => $ci->router->method
        );
        
       	$checkController = array('manager', 'project', 'gantt');
        
		if(in_array($param['classe'], $checkController)) {
			if($ci->session->userdata('email') == false) {
				redirect('home/restricted');
			}
		}

		
		
	}

}