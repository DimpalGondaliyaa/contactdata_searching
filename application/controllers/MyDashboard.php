<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyDashboard extends CI_Controller {


	public function index()
	{		
		$headerData = array(
			"pageTitle" => "MyDashboard",
			"stylesheet" => array("myDashboard.css")
		);
		$footerData = array(
			"jsFiles" => array("myDashboard.js")
		);
		$viewData = array(
			"viewName" => "myDashboard",
            "viewData" => array(),
			"headerData" => $headerData,
			"footerData" => $footerData	
		);
		$this->load->view('template',$viewData);
	}
}
?>