<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManualContactList extends CI_Controller {


	public function index()
	{		
		$e=$this->session->userdata('email');
		$cnt=$this->db->query("SELECT * FROM manual_contacts WHERE contact_owner_name='".$e."'");
		$allContact=$cnt->result_array();

		$headerData = array(
			"pageTitle" => "Manul Contact List",
			"stylesheet" => array("manul_contact_list.css")
		);
		$footerData = array(
			"jsFiles" => array("manul_contact_list.js")
		);
		$viewData = array(
			"viewName" => "manul_contact_list",
            "viewData" => array('allContact'=>$allContact),
			"headerData" => $headerData,
			"footerData" => $footerData	
		);
		$this->load->view('template',$viewData);
	}

	/*GEt all Data*/

	public function getContactData($id)
	{
		$c=$this->db->query("SELECT * FROM manual_contacts WHERE c_id='".$id."'");
		$data=$c->row_array();
		$this->load->view("update_Manual_Contact",$data);
	}

	/*Update Details*/

	public function updateManContacts(){

		$this->load->helper('date');
		date_default_timezone_set("UTC");
    	$date=gmdate("F j, Y");
		if (function_exists('date_default_timezone_set'))
		{
		  date_default_timezone_set('Asia/Kolkata');
		}
		date_default_timezone_set('Asia/Kolkata');
		$c_date=date("Y-m-d H:i:s");

		$up_id=$this->input->post('c_id');
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
				);

		$this->db->where('c_id',$up_id);
		$this->db->update('manual_contacts', $data);
	}

	/*Delete Manul Contact*/

	public function delManCont($id){
		
		$this->db->Where('c_id', $id);
		$this->db->delete('manual_contacts');
	}




	/*Import CSV File*/

	function readExcel()
	{
	        $this->load->library('csvreader');
	        $result =   $this->csvreader->parse_file('Test.csv');//path to csv file

	        $data['csvData'] =  $result;
	 		echo '<pre>';
	 		print_r($data);
	}

}
?>



