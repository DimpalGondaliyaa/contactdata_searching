<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">


<div class="mainBox">
	<div class="row">
		<div class="contact-result-container">
			<div class="max-width">
					<table id="example" class="display compact nowrap" style="width:100%">
					        <thead>
					            <tr>
					                <th>Contact Owner Name</th>
					                <th>Contact Sync From</th>
					                <th>Name</th>
					                <th>Contact Email</th>
					                <th>Mobile Phone</th>
					                <th>work Phone</th>
					                <th>Image</th>
					                <th>Organization</th>
					                <th>Organization Title</th>
					                <th>Category</th>
					                <th>File</th>
					                <th>Birthdate</th>
					                <th>Website</th>
					                <th>Company Name</th>
					                <th>Company Website</th>
					                <th>Address</th>
					                <th>Client Firm Size</th>
					                <th>Ofc Phone No</th>
					                <th>Company Street Address</th>
					                <th>Suburb Where Looked</th>
					                <th>Contact Name</th>
					                <th>Contact Job Title</th>
					                <th>Discipline</th>
					                <th>Project Address</th>
					                <th>Lid Staff</th>
					                <th>Watermark Issued</th>
					                <th>Month of Entery</th>
					                <th>Month of Last Entry</th>
					                <th>Most Recent Contact Date</th>
					                <th>Marketing Contact</th>
					                <th>ED</th>
					                <th>LID</th>
					                <th>Note</th>
					                <th>Action</th>
					            </tr>
					        </thead>

					        <?php 
								$email=$this->session->userdata('email');
								$get=$this->db->query("SELECT * FROM gmail_contact WHERE contact_owner_name ='".$email."'");
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
					                <td>	
					                		<?php if($contact['image']=='UGhvdG8gbm90IGZvdW5k') {?>
									<img src="<?php echo base_url() ?>/html/images/user_placeholder.jpg" width="50" class="
									responsive-img circle">
									<?php } else {?>
									<img src="data:image/jpeg;base64,<?php echo $contact['image']; ?>" width="50" class="responsive-img circle">
									<?php } ?>

					                	<?php //echo $contact['image']; ?></td>
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
					                <!-- <td><?php echo $contact['']; ?></td> -->
					                 <td><a class="btn modal-trigger btn-editContact" href="#!" data-value="<?php echo $contact['user_id']; ?>"><i class="material-icons">create</i></a>

					                <a class="btn deleteecon" href="#!" data-value="<?php echo $contact['user_id']; ?>"><i class="material-icons">delete</i></a>
					            </td>
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




<!-- 
<div class="mainBox">
	<div class="row">
		<div class="contact-result-container">
			<div class="max-width">
				<div class="resultBox">
					<div class="heading">
					<h4>Contact List of <span class="active"><?php echo $this->session->userdata('email'); ?></span></h4>
					</div>
					<div class="row">
						<div class="col s12 m6"></div>
						<div class="col s12 m6">
							<form name="srchData" id="srchData" method="POST">
								<div class="col s12 m8">
									<input type="text" name="search" placeholder="Search" id="search">
								</div>
								<div class="col s12 m4">
									<input type="button" name="srch" value="Search" class="btn btn-search black">
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div id="MobileMsg">
							
						</div>
						<?php //$this->load->view('searchResult'); ?>
					</div>
					<?php 

					$email=$this->session->userdata('email');

					$get=$this->db->query("SELECT * FROM gmail_contact WHERE contact_owner_name ='".$email."'");
					$result=$get->result_array();
					?>
					<div class="row">
						<?php 
						foreach ($result as $key => $contact) {
						?>
						<div class="col s12 m4">
							<div class="contact-box hoverable">
								<div class="box-header">
									<div class="col s4 m4">
									<?php if($contact['image']=='UGhvdG8gbm90IGZvdW5k') {?>
									<img src="<?php echo base_url() ?>/html/images/user_placeholder.jpg" class="
									responsive-img">
									<?php } else {?>
									<img src="data:image/jpeg;base64,<?php echo $contact['image']; ?>" class="responsive-img">
									<?php } ?>
									</div>
									<div class="col s8 m8">
										<h6><?php if($contact['name']==''){?>Anonymous<?php } else{ ?><?php echo $contact['name']; ?><?php } ?></h6>
										 <figcaption>
										  <a class="modal-trigger btn-editContact" href="#!" 
										  data-value="<?php echo $contact['user_id']; ?>">Edit</a>
										   </figcaption>
									</div>
								</div>
								<div class="box-body">
									<div class="box-row">
										<div class="col s2 m2">
										<i class="fas fa-mobile-alt"></i>
										</div>
										<div class="col s10 m10">
											<?php echo $contact['phoneNumber']; ?>
										</div>
									</div>
									<div class="box-row">
										<div class="col s2 m2">
										<i class="far fa-envelope"></i>
										</div>
										<div class="col s10 m10">
											<?php echo $contact['contact_email']; ?>
										</div>
									</div>
									<div class="box-row">
										<div class="col s2 m2">
										<i class="fas fa-briefcase"></i>
										</div>
										<div class="col s10 m10">
											<?php echo $contact['work_phoneNumber']; ?>
										</div>
									</div>
									<div class="box-row">
										<div class="col s2 m2">
										<i class="fa fa-birthday-cake"></i>
										</div>
										<div class="col s10 m10">
											<?php echo $contact['birthdate']; ?>
										</div>
									</div>
									<div class="box-row">
										<div class="col s2 m2">
										<i class="far fa-sticky-note"></i>
										</div>
										<div class="col s10 m10 copy">
											<?php echo $contact['note']; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



 Modal Structure
  
 -->