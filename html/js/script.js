$(document).ready(function(){

	 $('.sidenav').sidenav();
	 $(".dropdown-trigger").dropdown();
	 $(".dropdown-trigger").dropdown();
	 $('#note').val('');
	 
	 
	 $('.modal').modal();

	 var baseurl = $("#base_url").val();

	$(".btn-login").on("click",function(){
		var data = {
			'email' : $("#email").val(),
			'password' : $("#password").val()
		};
			/*$.post(baseurl+"login/dologin/",{data:data},function(data){*/
			$.post(baseurl+"CreateAccount/userlog/",{data:data},function(data){

				var check = jQuery.parseJSON(data);
				if(check.status=='ok')
				{
					/*alert("ok");*/
					window.location.href=baseurl+"MyDashboard";
					/*$('form[name=signinFrom]').html('');*/
				}
				else if(check.status=='fail')
				{
					alert("login fail");
				}
				else
				{
					alert("Please Check your Login Details.");
					window.location.reload();
					console.log(data);
				}
			});
	});

});