<?php
class Welcome_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertCSV($data)
            {
                $x=$this->db->query("SELECT * FROM manual_contacts WHERE contact_owner_name='".$data['contact_owner_name']."' AND company_name='".$data['company_name']."' AND company_website='".$data['company_website']."' AND phoneNumber='".$data['phoneNumber']."' AND contact_name='".$data['contact_name']."' AND contact_job_title='".$data['contact_job_title']."' AND contact_email='".$data['contact_email']."' AND project_address='".$data['project_address']."' AND month_of_entery='".$data['month_of_entery']."' AND month_of_last_entry='".$data['month_of_last_entry']."' AND most_recent_contact_date='".$data['most_recent_contact_date']."' AND marketing_contact='".$data['marketing_contact']."'");
                $q=$x->row_array();

                if($q>0){

                }
                else{
                    $this->db->insert('manual_contacts', $data);
                    return TRUE;
                }
            }



	public function view_data(){
        $query=$this->db->query("SELECT im.*
                                 FROM import im 
                                 ORDER BY im.id DESC
                                 limit 10");
        return $query->result_array();
    }

}