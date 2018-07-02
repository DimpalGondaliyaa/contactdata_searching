/*createAccount*/
$(function()
{
	var baseurl = $("#base_url").val();

	$(".creatacc").on("click",function(){


    var fname = document.forms["redform"]["fname"].value;
    var l_name = document.forms["redform"]["l_name"].value;
    var email = document.forms["redform"]["email"].value;
    var password = document.forms["redform"]["password"].value;

    if(fname==''){
      swal('Enter First Name');
      return false;
      $(this).focus();
    }

    else if(l_name==''){
      swal('Enter Last Name');
      return false;
    }
    else if(email==''){
      swal('Enter Email');
      return false;
    }

    else if(password==''){
      swal('Enter Password');
      return false;
    }

    else{

	  var form = new FormData($("#redform")[0]);
        $.ajax({
          url : baseurl+"CreateAccount/adddata/",
          data : form,
          type:"POST",
          contentType:false,
          processData:false,
          success:function(res)
          {
            swal("Account Craeted successfully.");
           //window.location.href=baseurl+"Home";
          }
        }); 
      }
    });  

 }); 


  $('#c_email').keyup(function(){
      var baseurl = $("#base_url").val();
      var ref_code=$("#c_email").val();
        $.ajax({
              type:'post',
              url:baseurl+"CreateAccount/getEmail/",
              data:{ref_code: ref_code},
            data:{ref_code: ref_code},
        success:function(msg){
            if(msg.indexOf('Email Already Exist') > -1){
                 $('#MobileMsg').html('<span style="color: red;">'+msg+"</span>");  
                     $('.creatacc').attr("disabled", "disabled");
                }
            else{ 
              $('#MobileMsg').html('');
              $('.creatacc').removeAttr('disabled');
            }
          }
      });
  });


