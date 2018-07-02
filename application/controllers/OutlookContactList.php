<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OutlookContactList extends CI_Controller {


	public function index()
	{		
		$headerData = array(
			"pageTitle" => "OutlookContactList",
			"stylesheet" => array("contactList.css")
		);
		$footerData = array(
			"jsFiles" => array("outlookContactList.js")
		);
		$viewData = array(
			"viewName" => "outlookContactList",
            "viewData" => array(),
			"headerData" => $headerData,
			"footerData" => $footerData	
		);
		$this->load->view('template',$viewData);
	}

	public function getContactData($id)
	{
		$this->load->model("Contact_result_model");
		$data = $this->Contact_result_model->getoutlookContactData($id);
		$this->load->view("update_outlook_data",$data);
	}

	public function updateoutContactList()
	{
		$this->load->model('Contact_result_model');

		$id = $_POST['user_id'];
		$data = array('name' => $_POST['name'],
		'contact_email' => $_POST['contact_email'],
		'phoneNumber' => $_POST['phoneNumber'],
		'work_phoneNumber' => $_POST['work_phoneNumber'],
		'website' => $_POST['website'], 
		'address' => $_POST['address'],
		'note' => $_POST['note'],
		'company_name' => $_POST['company_name'],
		'company_website' => $_POST['company_website'],
		'LID' => $_POST['LID'],
		'client_firm_size' => $_POST['client_firm_size'],
		'ofc_phone_no' => $_POST['ofc_phone_no'],
		'company_street_address' => $_POST['company_street_address'],
		'suburb_where_looked' => $_POST['suburb_where_looked'],
		'contact_name' => $_POST['contact_name'],
		'contact_job_title' => $_POST['contact_job_title'],
		'discipline' => $_POST['discipline'],
		'project_address' => $_POST['project_address'],
		'lid_staff' => $_POST['lid_staff'],
		'watermar_issued' => $_POST['watermar_issued'],
		'month_of_entery' => $_POST['month_of_entery'],
		'month_of_last_entry' => $_POST['month_of_last_entry'],
		'most_recent_contact_date' => $_POST['most_recent_contact_date'],
		'marketing_contact' => $_POST['marketing_contact'],
		'ED' => $_POST['ED'],

		);

		$this->Contact_result_model->updateoutData($id,$data);
		
	}

	public function searchContactData(){

		$this->load->model('Contact_result_model');
		$data=array('search'=>$_POST['search']);

		$this->Contact_result_model->searchContactData($data);

	}

	public function deleteoutContactData($id)
	{
		$this->db->where("user_id",$id);
		$this->db->delete("outlook_contact");
	}

	function getEmail(){
		$this->load->model('Contact_result_model');
		
		$e=$this->session->userdata('email');
		$v=$this->input->post('ref_code');

		$m=$this->Contact_result_model->searchContactData($e,$v);

		foreach ($m as $key => $value) {
			echo 'msg';
			echo $value['name'];
		}
		return $m;
	}

}
?>