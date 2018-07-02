<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddContact extends CI_Controller {


	public function index()
	{		
		$headerData = array(
			"pageTitle" => "Add Contact",
			"stylesheet" => array("add_contact.css")
		);
		$footerData = array(
			"jsFiles" => array("add_contact.js")
		);
		$viewData = array(
			"viewName" => "add_contact",
            "viewData" => array(),
			"headerData" => $headerData,
			"footerData" => $footerData	
		);
		$this->load->view('template',$viewData);
	}

	public function AddContactData(){

		$this->load->helper('date');
		date_default_timezone_set("UTC");
    	$date=gmdate("F j, Y");
		if (function_exists('date_default_timezone_set'))
		{
		  date_default_timezone_set('Asia/Kolkata');
		}
		date_default_timezone_set('Asia/Kolkata');
		$c_date=date("Y-m-d H:i:s");


		$data=array('contact_owner_name'=>$this->session->userdata('email'),
					'company_name'=>$this->input->post('company_name'),
					'company_website'=>$this->input->post('company_website'),
					'note'=>$this->input->post('note'),
					'lid'=>$this->input->post('lid'),
					'client_firm_size'=>$this->input->post('client_firm_size'),
					'phoneNumber'=>$this->input->post('phoneNumber'),
					'suburb_where_looked'=>$this->input->post('suburb_where_looked'),
					'contact_name'=>$this->input->post('contact_name'),
					'contact_job_title'=>$this->input->post('contact_job_title'),
					'discipline'=>$this->input->post('discipline'),
					'contact_email'=>$this->input->post('contact_email'),
					'project_address'=>$this->input->post('project_address'),
					'month_of_entery'=>$this->input->post('month_of_entery'),
					'month_of_last_entry'=>$this->input->post('month_of_last_entry'),
					'most_recent_contact_date'=>$this->input->post('most_recent_contact_date'),
					'marketing_contact'=>$this->input->post('marketing_contact'),
					'createdOn'=>$c_date
				);

		$this->db->insert('manual_contacts', $data);
	}

	
}
?>