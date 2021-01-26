<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Maintence {

	private $ci;

	public function __construct() {
      $this->ci =& get_instance();
    }

    public function Debug($data) {

    	if(is_array($data)) {
    		echo "<pre>";
    		print_r($data);
    		echo "</pre>";
    	} else {
    		var_dump($data);
    	}
    	die();
    }
}