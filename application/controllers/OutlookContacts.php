<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutlookContacts extends CI_Controller {


	public function index()
	{		
		$headerData = array(
			"pageTitle" => "outlookcontacts",
			"stylesheet" => array('outlookcontacts.css')
		);
		$footerData = array(
			"jsFiles" => array("outlookcontacts.js")
		);
		$viewData = array(
			"viewName" => "outlookcontacts",
            "viewData" => array(),
			"headerData" => $headerData,
			"footerData" => $footerData	
		);
		$this->load->view('template',$viewData);
	}

	public function addoutdata()
	{
		$email=$this->session->userdata('email');

		$data[] = array('name' =>$_POST['name'],
		'contact_email' =>$_POST['contact_email'],
		'phoneNumber' =>$_POST['phoneNumber'],
		'birthdate' =>$_POST['birthdate'], 
		'company_name' =>$_POST['company_name'],
		'contact_job_title' =>$_POST['contact_job_title']);
	
	/*	echo '<pre>';
		print_r($data);*/


		foreach ($data as $key => $v) {
			
		}
		$totleRow= count($v['name']);

		$i=0;

		for ($i=0; $i<$totleRow ; $i++) { 
		foreach ($data as $key => $value) {
	    	/*$d=array(
        		'name'=>$value['name'][$i],
        		'contact_email' =>$_POST['contact_email'][$i],
				'phoneNumber' =>$_POST['phoneNumber'][$i],
				'birthdate' =>$_POST['birthdate'][$i], 
				'company_name' =>$_POST['company_name'][$i],
				'contact_job_title' =>$_POST['contact_job_title'][$i]);*/


			$name=$value['name'][$i];
    		$contact_email =$_POST['contact_email'][$i];
			$phoneNumber =$_POST['phoneNumber'][$i];
			$birthdate =$_POST['birthdate'][$i];
			$company_name =$_POST['company_name'][$i];
			$contact_job_title =$_POST['contact_job_title'][$i];

        	/*foreach ($d as $key => $val) {
        	}*/
        	

        	$getData=$this->db->query("SELECT * FROM outlook_contact WHERE name='".$name."' OR contact_email='".$contact_email."' OR phoneNumber='".$phoneNumber."' OR birthdate='".$birthdate."' OR company_name='".$company_name."' OR contact_job_title='".$contact_job_title."' ");   	
        	
        	$ExistsData=$getData->row_array();

        	if($ExistsData>0){
        		echo 'exit';
        		$this->db->query("UPDATE  outlook_contact SET contact_owner_name='".$email."', name='".$name."', contact_email='".$contact_email."', phoneNumber='".$phoneNumber."', birthdate='".$birthdate."', company_name='".$company_name."',  contact_job_title='".$contact_job_title."' WHERE contact_email='".$contact_email."'"); 
        	}
        	else{
        	$this->db->query("INSERT INTO outlook_contact(contact_owner_name,name,contact_email,phoneNumber,birthdate,company_name,contact_job_title) VALUES('".$email."','".$name."','".$contact_email."','".$phoneNumber."','".$birthdate."','".$company_name."','".$contact_job_title."')");   	
        	}
        	}
   		}

		/*foreach ($data as $key => $value) {
			$d=array('name'=>$value);
			$this->db->insert("outlook_contact",$d);
		}*/
	
		//$this->db->insert("outlook_contact",$value);
		/*foreach ($data as $key => $value) {
			
			$d = array('name' =>$value['name'],
			'contact_email' =>$value['contact_email'],
			'phoneNumber' =>$value['phoneNumber'],
			'birthdate' =>$value['birthdate'], 
			'company_name' =>$value['company_name'],
			'contact_job_title' =>$value['contact_job_title']);

			$this->db->insert("outlook_contact",$d);		
			*/
		
		
	}

	
}
?>