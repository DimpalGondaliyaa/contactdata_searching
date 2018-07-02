/*manul_contact_list*/

$(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true
    } );

} );

$(function(){

 	
	var baseurl=$('#base_url').val();

	 $("#example").on("click",".btn-edt-manl",function(){
 		$(".modal").modal();
 		$("#editManualData .modal-content").html("");
 		$("#editManualData").modal("open");
 		 var id = $(this).data("value");

	    $.post(baseurl+"ManualContactList/getContactData/"+id,function(postid)
	    {
	      $("#editManualData .modal-content").html(postid);
	    });
 	});


	/*Update Contacts*/


	$(".btn-up-man-cont").on("click",function()
	{
		var upMancontact = new FormData($("#upMancontact")[0]);
        $.ajax({
	          url : baseurl+"ManualContactList/updateManContacts/",
	          data : upMancontact,
	          type:"POST",
	          contentType:false,
	          processData:false,
	          success:function(res)
	          {
	            window.location.reload();
	          }
        }); 
	});




	/*Delete Manual Contact*/

	$("#example").on("click",".del-man-cont", function()
	{
		 var id = $(this).data("value");
		 swal({
				  title: "Are you sure?",
				  text: "Once deleted, you will not be able to recover this Contact!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				$.ajax({

				url : baseurl+"ManualContactList/delManCont/"+id,
				type :"POST",
				contentType:false,
				processData:false,
				success:function(res)
				{
					swal("Poof! Your Contact has been deleted!", {
					          icon: "success",
					    });
					$('.swal-button').on('click',function(){
							window.location.reload();
						});       
				}
			});
			} else {
			      swal("Your Data is safe!");
			  }
			});
    }); 



})