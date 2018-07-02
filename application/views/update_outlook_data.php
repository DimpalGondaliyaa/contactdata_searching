<div class="row">
	<div class="updateBox">
		<h5>Update Records</h5>
		<div class="box-container">
			<form name="update_contacts" id="update_out_contacts" method="POST">
				<div class="input-field col s6">
		          <input id="name" name="name" value="<?php echo $name; ?>" type="text" class="validate" placeholder="Enter Name">
		        </div>
		        <div class="input-field col s6">
		          <input id="contact_email" name="contact_email" value="<?php echo $contact_email; ?>" type="text" class="validate" placeholder="Contact Email">
		        </div>
		        <div class="input-field col s6">
		          <input id="phoneNumber" name="phoneNumber" value="<?php echo $phoneNumber; ?>" type="text" class="validate" placeholder="Phone Number">
		        </div>
		        <div class="input-field col s6">
		          <input id="work_phoneNumber" name="work_phoneNumber" value="<?php echo $work_phoneNumber; ?>" type="text" class="validate" placeholder="Work Number">
		        </div>
		        <div class="input-field col s6">
		          <input id="website" name="website" value="<?php echo $website; ?>" type="text" class="validate" placeholder="Website">
		        </div>
		        <div class="input-field col s6">
		          <input id="address" name="address" value="<?php echo $address; ?>" type="text" class="validate" placeholder="address">
		        </div>
		        <div class="input-field col s12">
		          <textarea id="note" name="note" class="materialize-textarea" placeholder="company Note"><?php echo $note; ?></textarea>
		        </div>

		         <input id="user_id" name="user_id" value="<?php echo $user_id; ?>" type="hidden" class="validate" placeholder="id">
<!--===============-->
		          <div class="input-field col s6">
		          		<input name="company_name" value="<?php echo $company_name; ?>" type="text" class="validate" placeholder="company_name">
		          </div>

		          <div class="input-field col s6">
		          		<input name="company_website" value="<?php echo $company_website; ?>" type="text" class="validate" placeholder="company_website">
		          </div>

		           <div class="input-field col s6">
		          		<input name="LID" value="<?php echo $LID; ?>" type="text" class="validate" placeholder="LID">
		          </div>

		           <div class="input-field col s6">
		          		<input name="client_firm_size" value="<?php echo $client_firm_size; ?>" type="text" class="validate" placeholder="client_firm_size">
		          </div>

		           <div class="input-field col s6">
		          		<input name="ofc_phone_no" value="<?php echo $ofc_phone_no; ?>" type="text" class="validate" placeholder="ofc_phone_no">
		          </div>


		           <div class="input-field col s6">
		          		<input name="company_street_address" value="<?php echo $company_street_address; ?>" type="text" class="validate" placeholder="company_street_address">
		          </div>

		           <div class="input-field col s6">
		          		<input name="suburb_where_looked" value="<?php echo $suburb_where_looked; ?>" type="text" class="validate" placeholder="suburb_where_looked">
		          </div>


		           <div class="input-field col s6">
		          		<input name="contact_name" value="<?php echo $contact_name; ?>" type="text" class="validate" placeholder="contact_name">
		          </div>

		           <div class="input-field col s6">
		          		<input name="contact_job_title" value="<?php echo $contact_job_title; ?>" type="text" class="validate" placeholder="contact_job_title">
		          </div>

		           <div class="input-field col s6">
		          		<input name="discipline" value="<?php echo $discipline; ?>" type="text" class="validate" placeholder="discipline">
		          </div>

		           <div class="input-field col s6">
		          		<input name="project_address" value="<?php echo $project_address; ?>" type="text" class="validate" placeholder="project_address">
		          </div>

		           <div class="input-field col s6">
		          		<input name="lid_staff" value="<?php echo $lid_staff; ?>" type="text" class="validate" placeholder="lid_staff">
		          </div>

		           <div class="input-field col s6">
		          		<input name="watermar_issued" value="<?php echo $watermar_issued; ?>" type="text" class="validate" placeholder="watermar_issued">
		          </div>

		           <div class="input-field col s6">
		          		<input name="month_of_entery" value="<?php echo $month_of_entery; ?>" type="text" class="validate" placeholder="month_of_entery">
		          </div>

		           <div class="input-field col s6">
		          		<input name="month_of_last_entry" value="<?php echo $month_of_last_entry; ?>" type="text" class="validate" placeholder="month_of_last_entry">
		          </div>

		           <div class="input-field col s6">
		          		<input name="most_recent_contact_date" value="<?php echo $most_recent_contact_date; ?>" type="text" class="validate" placeholder="most_recent_contact_date">
		          </div>

		           <div class="input-field col s6">
		          		<input name="marketing_contact" value="<?php echo $marketing_contact; ?>" type="text" class="validate" placeholder="marketing_contact">
		          </div>

		           <div class="input-field col s6">
		          		<input name="ED" value="<?php echo $ED; ?>" type="text" class="validate" placeholder="ED">
		          </div>


		     

		        <div class="input-field col s12 m12">
		        	<input type="button" name="updateData" value="Save" class="btn btn-flat btn-upout">
		        </div>

			</form>
		</div>
	</div>
</div>


<script type="text/javascript">
	
  $(".btn-upout").on("click",function()
	{
		var baseurl=$('#base_url').val();

		/*alert("ok");*/
		var updriverform = new FormData($("#update_out_contacts")[0]);
        $.ajax({
	          url : baseurl+"OutlookContactList/updateoutContactList/",
	          data : updriverform,
	          type:"POST",
	          contentType:false,
	          processData:false,
	          success:function(res)
	          {
	            window.location.reload();
	          }
        }); 
	});
</script>


<style type="text/css">
	input.btn.btn-flat.btn-save {
    background: purple;
    color: #fff;
    width: 138px;
    text-align: center;
}
</style>