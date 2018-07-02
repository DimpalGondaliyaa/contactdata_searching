
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



 <!-- Modal Structure -->
  <div id="editData" class="modal">
    <div class="modal-content">
     
    </div>
    <div class="modal-footer">
<!--       <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a> -->
    </div>
  </div>
