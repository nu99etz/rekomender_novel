<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once('MainController.php');

class DashboardController extends MainController
{

	public function index()
	{

		$layout = array(
			'dashboard/dashboard'
		);
		$this->getLayout($layout);
	}
}
