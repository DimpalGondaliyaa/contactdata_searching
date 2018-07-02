<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
<style type="text/css">
	.clisttr th
	{
		text-transform: capitalize;
	}
</style>

<div class="mainBox">
	<div class="row">
		<div class="contact-result-container">
			<div class="max-width">
				<table id="example" class="display compact nowrap" style="width:100%">
				    <thead>
			           <tr class="clisttr">
			                <th>contact owner name</th>
			                <th>contact sync from</th>
			                <th>name</th>
			                <th>contact email</th>
			                <th>phone Number</th>
			                <th>work phone Number</th>
			                <th>image</th>
			                <th>organization Name</th>
			                <th>organization Title</th>
			                <th>category</th>
			                <th>file</th>
			                <th>birthdate</th>
			                <th>website</th>
			                <th>company name</th>
			                <th>company website</th>
			                <th>address</th>
			                <th>client firm size</th>
			                <th>office phone number</th>
			                <th>company street address</th>
			                <th>suburb where looked</th>
			                <th>contact name</th>
			                <th>contact job title</th>
			                <th>discipline</th>
			                <th>project address</th>
			                <th>lid staff</th>
			                <th>watermar issued</th>
			                <th>month of entery</th>
			                <th>month of last entry</th>
			                <th>most recent contact date</th>
			                <th>marketing contact</th>
			                <th>ED</th>
			                <th>LID</th>
			                <th>note</th>
			                <th>action</th>
			            </tr>
					</thead>

			        <?php 
						$email=$this->session->userdata('email');
						$get=$this->db->query("SELECT * FROM outlook_contact WHERE contact_owner_name ='".$email."'");
						$result=$get->result_array();
					?>

					<tbody>
			        	<?php foreach ($result as $key => $contact) { ?>
			            <tr>
			                <td><?php echo $contact['contact_owner_name']; ?></td>
			                <td><?php echo $contact['contact_sync_from']; ?></td>
			                <td><?php echo $contact['name']; ?></td>
			                <td><?php echo $contact['contact_email']; ?></td>
			                <td><?php echo $contact['phoneNumber']; ?></td>
			                <td><?php echo $contact['work_phoneNumber']; ?></td>
			                <td><?php echo $contact['image']; ?></td>
			                <td><?php echo $contact['organizationName']; ?></td>
			                <td><?php echo $contact['organizationTitle']; ?></td>
			                <td><?php echo $contact['category']; ?></td>
			                <td><?php echo $contact['file_as']; ?></td>
			                <td><?php echo $contact['birthdate']; ?></td>
			                <td><?php echo $contact['website']; ?></td>
			                <td><?php echo $contact['company_name']; ?></td>
			                <td><?php echo $contact['company_website']; ?></td>
			                <td><?php echo $contact['address']; ?></td>
			                <td><?php echo $contact['client_firm_size']; ?></td>
			                <td><?php echo $contact['ofc_phone_no']; ?></td>
			                <td><?php echo $contact['company_street_address']; ?></td>
			                <td><?php echo $contact['suburb_where_looked']; ?></td>
			                <td><?php echo $contact['contact_name']; ?></td>
			                <td><?php echo $contact['contact_job_title']; ?></td>
			                <td><?php echo $contact['discipline']; ?></td>
			                <td><?php echo $contact['project_address']; ?></td>
			                <td><?php echo $contact['lid_staff']; ?></td>
			                <td><?php echo $contact['watermar_issued']; ?></td>
			                <td><?php echo $contact['month_of_entery']; ?></td>
			                <td><?php echo $contact['month_of_last_entry']; ?></td>
			                <td><?php echo $contact['most_recent_contact_date']; ?></td>
			                <td><?php echo $contact['marketing_contact']; ?></td>
			                <td><?php echo $contact['ED']; ?></td>
			                <td><?php echo $contact['LID']; ?></td>
			                <td><?php echo $contact['note']; ?></td>
			                <td><a class="btn modal-trigger btn-editContact" href="#!" data-value="<?php echo $contact['user_id']; ?>"><i class="material-icons">create</i></a>

			                <a class="btn deleteeoutcon" href="#!" data-value="<?php echo $contact['user_id']; ?>"><i class="material-icons">delete</i></a>
			                </td>
			                <!-- <td><?php echo $contact['']; ?></td> -->
			            </tr>
			        <?php } ?>
			        </tbody>
					</table>
            </div>
        </div>
     </div>
</div>


<div id="editData" class="modal">
    <div class="modal-content">
    </div>
    <div class="modal-footer">
    </div>
</div>

