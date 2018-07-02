<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadcsv extends CI_Controller {

public function __construct()
{
    parent::__construct();
    /*$this->load->helper('url'); */                  
    $this->load->model('Welcome_model','welcome');
}

public function index()
{

    $data=$this->data['view_data']= $this->welcome->view_data();

    $headerData = array(
      "pageTitle" => "Add Contact",
      "stylesheet" => array("add_contact.css","importcsv.css")
    );
    $footerData = array(
      "jsFiles" => array("add_contact.js","importcsv.js")
    );
    $viewData = array(
      "viewName" => "excelimport",
      "viewData" => array('data'=>$data),
      "headerData" => $headerData,
      "footerData" => $footerData 
    );
    $this->load->view('template',$viewData);

	/*$this->data['view_data']= $this->welcome->view_data();
  $this->load->view('excelimport', $this->data, FALSE);*/
}

	//////////////////Import subscriber emails ////////////////////////////////
public function importbulkemail(){
	$this->load->view('excelimport');
}

public function import()
  {

    $this->load->helper('date');
    date_default_timezone_set("UTC");
    if (function_exists('date_default_timezone_set'))
    {
      date_default_timezone_set('Asia/Kolkata');
    }
    date_default_timezone_set('Asia/Kolkata');

    $c_date=date("Y-m-d H:i:s");

    $eml=$this->session->userdata('email');
    if(isset($_POST["import"]))
    {
        $filename=$_FILES["file"]["tmp_name"];
        if($_FILES["file"]["size"] > 0)
          {
            $file = fopen($filename, "r");
             while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
             {
                    $data = array(
                        'contact_owner_name'=>$eml,
                        'company_name' => $importdata[0],
                        'company_website' =>$importdata[1],
                        'note'=>$importdata[2],
                        'lid'=>$importdata[3],
                        'client_firm_size'=>$importdata[4],
                        'phoneNumber'=>$importdata[5],
                        'suburb_where_looked'=>$importdata[6],
                        'contact_name'=>$importdata[7],
                        'contact_job_title'=>$importdata[8],
                        'discipline'=>$importdata[9],
                        'contact_email'=>$importdata[10],
                        'project_address'=>$importdata[11],
                        'month_of_entery'=>$importdata[12],
                        'month_of_last_entry'=>$importdata[13],
                        'most_recent_contact_date'=>$importdata[14],
                        'marketing_contact'=>$importdata[15],
                        'createdOn' =>$c_date
                        );
             $insert = $this->welcome->insertCSV($data);
             }                    
            fclose($file);
			$this->session->set_flashdata('message', 'Data are imported successfully..');
				redirect('ManualContactList');
          }else{
			$this->session->set_flashdata('message', 'Something went wrong..');
			redirect('ManualContactList');
		}
    }
}


/////////////////////////////////Import subscriber emails ////////////////////////////////

}
