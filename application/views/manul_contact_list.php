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
				<div class="top">
					<div class="left">
						<h5>List Of Manual Contact:</h5>
					</div>
					<div class="right">
						<a href="<?= base_url(); ?>AddContact"><button type="button" class="btn green white-text">Add New Record</button></a>
					</div>
				</div>
				<table id="example" class="display compact nowrap table" style="width:100%">
				    <thead>
				    	<tr>
				    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			        		<td>
			        			<select id="c_nm">
			                		<option value="">-Contact Name-</option>
			                		<?php foreach ($allContact as $key => $contact) { ?>
			                			<option value="<?php echo $contact['contact_name']; ?>"><?php echo $contact['contact_name']; ?></option>
			                		<?php } ?>
			                	</select>
			        		</td>
			        		<td>
			        			<select id="c_pro_job_ttl">
			                		<option value="">-Contact Name-</option>
			                		<?php foreach ($allContact as $key => $contact) { ?>
			                			<option value="<?php echo $contact['contact_job_title']; ?>"><?php echo $contact['contact_job_title']; ?></option>
			                		<?php } ?>
			                	</select>
			        		</td>
			        		<td></td><td></td>
			        		<td>
			        			<select id="c_projectAddr">
			                		<option value="">-Contact Name-</option>
			                		<?php foreach ($allContact as $key => $contact) { ?>
			                			<option value="<?= $contact['project_address']; ?>"><?= $contact['project_address']; ?></option>
			                		<?php } ?>
			                	</select>	
			        		</td>
			        		<!-- <td></td><td></td><td></td><td></td><td></td> -->
			        	</tr>
			           <tr class="clisttr">
			                <th>contact owner name</th>
			                <th>Company Name</th>
			                <th>Website</th>
			                <th>Note</th>
			                <th>LID</th>
			                <th>Client Firm Size</th>
			                <th>phoneNumber</th>
			                <th>Suburb Where Looked</th>
			                <th>Contact Name </th>
			                <th>Job Title</th>
			                <th>Discipline</th>
			                <th>Email</th>
			                <th>Project Address</th>
			                <th>Month of Entery</th>
			                <th>Month of Last Entry</th>
			                <th>Most Recent Contact Date</th>
			                <th>Marketing Contact</th>
			                <th>action</th>
			            </tr>
			        </thead>
				    <tbody>
			        	<?php foreach ($allContact as $key => $contact) { ?>
			            <tr>
			                <td><?php echo $contact['contact_owner_name']; ?></td>
			                <td><?php echo $contact['company_name']; ?></td>
			                <td><?php echo $contact['company_website']; ?></td>
			                <td><?php echo $contact['note']; ?></td>
			                <td><?php echo $contact['lid']; ?></td>
			                <td><?php echo $contact['client_firm_size']; ?></td>
			                <td><?php echo $contact['phoneNumber']; ?></td>
			                <td><?php echo $contact['suburb_where_looked']; ?></td>
			                <td><?php echo $contact['contact_name']; ?></td>
			                <td><?php echo $contact['contact_job_title']; ?></td>
			                <td><?php echo $contact['discipline']; ?></td>
			                <td><?php echo $contact['contact_email']; ?></td>
			                <td><?php echo $contact['project_address']; ?></td>
			                <td><?php echo $contact['month_of_entery']; ?></td>
			                <td><?php echo $contact['month_of_last_entry']; ?></td>
			                <td><?php echo $contact['most_recent_contact_date']; ?></td>
			                <td><?php echo $contact['marketing_contact']; ?></td>
			                <td><a class="btn modal-trigger btn-edt-manl" href="#!" data-value="<?php echo $contact['c_id']; ?>"><i class="material-icons">create</i></a>
			                <a class="btn del-man-cont" href="#!" data-value="<?php echo $contact['c_id']; ?>"><i class="material-icons">delete</i></a>
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


<div id="editManualData" class="modal">
    <div class="modal-content">
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat btn-up-man-cont">Agree</a>
    </div>
</div>




<script type="text/javascript">
	$(function(){
		/*var table = $('#example').DataTable();*/
		$('#c_nm').on('change', function(){
			var pa=$('#c_projectAddr').val();
			var jt=$('#c_pro_job_ttl').val();
			var v = $(this).val();
			$('#example').DataTable().search(pa+' '+jt+' '+v).draw();
		
		    /*var table = $('#example').DataTable();
	    	$('.subCat-box').click(function (){
	    		var i =$(this).data('value');
	           table.search(i).draw();
	       	});*/

		});

		$('#c_projectAddr').on('change',function(){
			var s=$('#c_nm').val();
			var jt=$('#c_pro_job_ttl').val();
			/*var s=$('input[type="search"]').val();*/
			var v = $(this).val();
			$('#example').DataTable().search(s+' '+jt+' '+v).draw();
		
		});

		$('#c_pro_job_ttl').on('change',function(){
			var s=$('#c_nm').val();
			var pa=$('#c_projectAddr').val();
			/*var s=$('input[type="search"]').val();*/
			var v = $(this).val();
			$('#example').DataTable().search(s+' '+pa+' '+v).draw();
		
		});

		
	});
</script>