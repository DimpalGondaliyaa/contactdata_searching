<?php 
	class Contact_result_model extends CI_Model{

		public function getContactData($id)
		{
			$e = $this->db->query("select * from gmail_contact where user_id='$id'");
	 		$r = $e->row_array();
	 		return $r;
		}

		public function updateData($id,$data){


			$this->db->where('user_id',$id);
			$up=$this->db->update('gmail_contact',$data);

			if($up>0){
			?>
			<script type="text/javascript">
				alert('success');
				swal("Good job!", "Updated Successfully!", "success");
				window.location.reload();
			</script>

			<?php
			}
		}

		public function searchContactData($e,$v){

			$r=$this->db->query("SELECT * FROM gmail_contact WHERE contact_email LIKE '".$v."' AND contact_owner_name='".$e."'");
				$row=$r->result_array();

				return $row;
				/*if($row >0){
					foreach ($row as $key => $value) {
						echo $value['name'];
					}
				}*/
				
		}

		public function getoutlookContactData($id){

			$e = $this->db->query("select * from outlook_contact where user_id='$id'");
			$r = $e->row_array();
			return $r;
		}



   		public function updateoutData($id,$data){

			$this->db->where('user_id',$id);
			$up=$this->db->update('outlook_contact',$data);

			if($up>0){
			?>
			<script type="text/javascript">
			alert('success');
			swal("Updated Successfully!", "success");
			window.location.reload();
			</script>

			<?php
			}
		}



	}
	
?>
	
