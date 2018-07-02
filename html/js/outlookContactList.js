$(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true
    } );
} );

$(function(){

	var baseurl=$('#base_url').val();

	 $("#example").on("click",".btn-editContact",function(){
 		$(".modal").modal();
 		$("#editData .modal-content").html("");
 		$("#editData").modal("open");
 		 var id = $(this).data("value");

	    $.post(baseurl+"OutlookContactList/getContactData/"+id,function(postid)
	    {
	      $("#editData .modal-content").html(postid);
	    });
 	});

	 $('#example').on("click",".deleteeoutcon",function(){
 		 var id = $(this).data("value");
 		 if(confirm("are you sure to delete this?")){
		$.post(baseurl+"OutlookContactList/deleteoutContactData/"+id,function(postid)
	    {
	         window.location.reload(); 
	    });
	    }
 	});



	 /*Update Contact DAta*/

	$(".btn-search").on("click",function()
	{
		var srchData = new FormData($("#srchData")[0]);
        $.ajax({
	          url : baseurl+"OutlookContactList/searchContactData/",
	          data : srchData,
	          type:"POST",
	          contentType:false,
	          processData:false,
	          success:function(res)
	          {
	            //window.location.reload();
	          }
        }); 
	});



	$('#search').keyup(function(){
	
      	var ref_code=$("#search").val();
          $.ajax({
               	type:'post',
               	url:baseurl+"OutlookContactList/getEmail/",
               	data:{ref_code: ref_code},
            	data:{ref_code: ref_code},
			    success:function(msg){
	            if(msg.indexOf('msg') > -1){
	            		 $('#MobileMsg').html('<span style="color: red;">'+msg+"</span>");  
	                     $('.user_Register').attr("disabled", "disabled");
	                }
	            else{ 
			        	$('#MobileMsg').html('');
			        	$('.user_Register').removeAttr('disabled');
		        	}
	            }
     		});

		});


});