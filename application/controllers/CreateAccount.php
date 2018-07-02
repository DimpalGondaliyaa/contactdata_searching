<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateAccount extends CI_Controller {


	public function index()
	{		
		$headerData = array(
			"pageTitle" => "Create Account",
			"stylesheet" => array("createAccount.css")
		);
		$footerData = array(
			"jsFiles" => array("createAccount.js")
		);
		$viewData = array(
			"viewName" => "createAccount",
            "viewData" => array(),
			"headerData" => $headerData,
			"footerData" => $footerData	
		);
		$this->load->view('template',$viewData);
	}

	public function userlog()
	{
		$this->load->model("account_model");
		$data = $_POST['data'];
		$ress = $this->account_model->logindata($data);
		echo json_encode($ress);
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
        $this->session->sess_destroy();
    	$this->session->unset_userdata('userData');
		$this->session->unset_userdata('google_code');
		header("Location:".base_url()."Home");
	}

	public function adddata()
	{
		$data = array('fname' => $_POST['fname'], 
			'l_name' => $_POST['l_name'],
			'email' => $_POST['email'],
			'password' => $_POST['password']);

		$this->db->insert("users",$data);
	}




	/*Get Exits Email*/

	function getEmail(){
	    $this->db->where('email', $this->input->post('ref_code'));
	    $query = $this->db->get('users');
	    if($query->num_rows() >= 1){
	       echo 'Email Already Exist';
	    }
	}

}
?>