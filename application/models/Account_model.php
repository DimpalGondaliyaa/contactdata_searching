<?php 
	class Account_model extends CI_Model{
	
	
	public function userLogin($data)
	{
		$email = $data['email'];
		$password = $data['password'];
		$sql = $this->db->query("SELECT * FROM users WHERE email='$email' and password = '$password'");
		if($sql->num_rows()==1)
		{
			$sql= array('status' => "ok",
			'message' => "login ok" );
			$this->session->set_userdata('email',$email);
		}
		else
		{
			$sql= array('status' => "no",
			'message' => "login fail"  );
		}
		return $sql;
	}

	public function logindata($data)
	{
		$email = trim($data['email']);
		$pass = trim($data['password']);

		$sql = $this->db->query("select * from users where email='$email' and password='$pass'");
		if($sql->num_rows()==1)
		{
			$sql= array('status' => "ok",
			'message' => "login ok" );
			$email=$this->session->set_userdata('email',$email);		
		}
		else
		{
			$sql= array('status' => "no",
			'message' => "login fail"  );
		}
		return $sql;
	}	

}
?>