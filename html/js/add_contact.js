/*add_contact*/

$(function(){

	var baseurl=$('#base_url').val();
	/*Add Contacts*/

	  $(".btn-save-new-contact").on("click", function()
	  {
	    var t1 = $("#company_name").val();
	    /*var t2 = $("#asgn_email_to").val();*/

	    if(t1==''){
	      swal('Company Name Must be Required.');
	    } 
/*	    else if(t2==''){
	      swal('select User to Assign with');
	    } 
*/	    else{
	    var addContact = new FormData($("#addContact")[0]); 
	    $.ajax({
	      url : baseurl+"AddContact/AddContactData",
	      type :"POST",
	      data :addContact,  
	      contentType:false,
	      processData:false,
	      success:function(res)
	      {
	        swal("Good job!", "User Assigned Successfully!", "success")
	        $('.swal-button--confirm').on('click',function(){
	          window.location.reload();
	        });
	      }
	     });
	    }
	  });

});