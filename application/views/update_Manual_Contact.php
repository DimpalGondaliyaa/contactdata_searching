
<div class="col s12 m12">
	<h6><b>Update Contact </b></h6>
</div>
<div class="up-con-box">
	<form name="upMancontact" id="upMancontact" method="POST">
	<input type="hidden" name="c_id" value="<?= $c_id;?>">
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="contact_owner_name" placeholder="Contact Owner Name" value="<?php echo $contact_owner_name; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="company_name" placeholder="Company Name" value="<?php echo $company_name; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="company_website" placeholder="Company Website" value="<?php echo $company_website; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="note" placeholder="Note" value="<?php echo $note; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="lid" placeholder="LID" value="<?php echo $lid; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="client_firm_size" placeholder="Client Firm Size" value="<?php echo $client_firm_size; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="phoneNumber" placeholder="Phone Number" value="<?php echo $phoneNumber; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="suburb_where_looked" placeholder="Suburb Where Looked" value="<?php echo $suburb_where_looked; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="contact_name" placeholder="Contact Name" value="<?php echo $contact_name; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="contact_job_title" placeholder="Contact Job Title" value="<?php echo $contact_job_title; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="discipline" placeholder="Discipline" value="<?php echo $discipline; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="contact_email" placeholder="Contact Email" value="<?php echo $contact_email; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="project_address" placeholder="Project Address" value="<?php echo $project_address; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="month_of_entery" placeholder="Month of Entry" value="<?php echo $month_of_entery; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="month_of_last_entry" placeholder="Month of Last Entry" value="<?php echo $month_of_last_entry; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="most_recent_contact_date" placeholder="Most Recent Contact Date" value="<?php echo $most_recent_contact_date; ?>">
	</div>
	<div class="col s12 m6 small-box-input ">
		<input type="text" name="marketing_contact" placeholder="Marketing Contact" value="<?php echo $marketing_contact; ?>">
	</div>
	</form>
</div>