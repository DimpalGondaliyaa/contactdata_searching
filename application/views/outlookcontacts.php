


<!DOCTYPE html>
<html lang="en">
<head>
  <script src="//kjur.github.io/jsrsasign/jsrsasign-latest-all-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>
  <script src="<?php echo base_url(); ?>graph-js-sdk-web.js"></script>
  <script src="<?php echo base_url(); ?>outlook-demo.js"></script>
</head>

<div id="loader-wrapper" class="ldr">
  <h4 style="z-index: 12;
    left: 0;
    right: 0;
    text-align: center;
    position: absolute;
    top: 40%;
    color: #000;
    -webkit-background-clip: text;
    background-image: linear-gradient(115deg, #FF00FF,#406bca, #2fddef);
    color: transparent;
    max-width: max-content;
    margin: 0 auto;
    ">LOADING...</h4>
  <div id="loader">
    
  </div>
  
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>
<style type="text/css">
  
/* The Loader */
#loader-wrapper {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 10;
  overflow: hidden;
}

.no-js #loader-wrapper {
  display: none;
}

#loader {
    display: block;
    position: relative;
    left: 50%;
    top: 30%;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #9370DB;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
    z-index: 11;
}
#loader:before {
  content: "";
    position: absolute;
    top: 5px;
    left: 5px;
    right: 5px;
    bottom: 5px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #BA55D3;
    -webkit-animation: spin 3s linear infinite;
    animation: spin 3s linear infinite;
}
#loader:after {
  content: "";
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #FF00FF;
    -webkit-animation: spin 1.5s linear infinite;
    animation: spin 1.5s linear infinite;
}

@-webkit-keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
  }
}
@keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-webkit-keyframes spin-reverse {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(-360deg);
  }
}
@keyframes spin-reverse {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(-360deg);
    transform: rotate(-360deg);
  }
}
#loader-wrapper .loader-section {
  position: fixed;
  top: 0;
  width: 51%;
  height: 100%;
  background: linear-gradient(0deg,#fafafA,ghostwhite);
  z-index: 10;
}

#loader-wrapper .loader-section.section-left {
  left: 0;
}

#loader-wrapper .loader-section.section-right {
  right: 0;
}

/* Loaded styles */
.loaded #loader-wrapper .loader-section.section-left {
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
  transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.loaded #loader-wrapper .loader-section.section-right {
  -webkit-transform: translateX(100%);
          transform: translateX(100%);
  transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.loaded #loader {
  opacity: 0;
  transition: all 0.3s ease-out;
}

.loaded #loader-wrapper {
  visibility: hidden;
  -webkit-transform: translateY(-100%);
          transform: translateY(-100%);
  transition: all 0.3s 1s ease-out;
}

</style>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div id="navbar" class="navbar-collapse collapse" style="display: inline-block !important;">
        <ul class="nav navbar-nav authed-nav">
          <li id='home-nav'><a href="#">Home</a></li>
          <!-- <li id='inbox-nav'><a href="#inbox">Inbox</a></li>
          <li id='calendar-nav'><a href="#calendar">Calendar</a></li> -->
          <li id='contacts-nav'><a href="#contacts">Contacts</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right authed-nav">
          <li><a href="#signout">Sign out</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container main-container">
    <div id="signin-prompt" class="jumbotron page">
      <p>To Import Your Contact, hit on the <b>Import Contact</b> Button.</p>
      <p>
        <a class="btn btn-lg btn-primary" href="#" role="button" id="connect-button">import Outlook Contacty</a>
      </p>
    </div>
    
    <!-- logged in user welcome -->
    <div id="logged-in-welcome" class="jumbotron page">
      <h1>Outlook Contacts</h1>
      <p>Welcome <span id="username"></span>! Please use the nav menu to access your Outlook data.</p>
      <span id="userEmail">
        
      </span>
    </div>

    <!-- unsupported browser message -->
    <!-- <div id="unsupported" class="jumbotron page">
      <h1>Oops....</h1>
      <p>This page requires browser support for <a href="https://developer.mozilla.org/en-US/docs/Web/API/Web_Storage_API">session storage</a> and <a href="https://developer.mozilla.org/en-US/docs/Web/API/RandomSource/getRandomValues"><code>crypto.getRandomValues</code></a>. Unfortunately, your browser does not support one or both features. Please visit this page using a different browser.</p>
    </div> -->

    <!-- error message -->
    <!-- <div id="error-display" class="page panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title" id="error-name"></h3>
      </div>
      <div class="panel-body">
        <code id="error-desc"></code>
      </div>
    </div> -->

    <!-- inbox display -->
    <!-- <div id="inbox" class="page panel panel-default">
      <div class="panel-heading">
        <h1 class="panel-title">Inbox</h1>
      </div>
      <div id="inbox-status" class="panel-body">
      </div>
      <div class="list-group" id="message-list">
      </div>
    </div> -->

    <!-- calendar display -->
    <!-- <div id="calendar" class="page panel panel-default">
      <div class="panel-heading">
        <h1 class="panel-title">Calendar</h1>
      </div>
      <div id="calendar-status" class="panel-body">
      </div>
      <div class="list-group" id="event-list">
      </div>
    </div> -->

    <!-- contacts display -->
    <div id="contacts" class="page panel panel-default">
      <div class="panel-heading">
        <h1 class="panel-title">Contacts</h1>
      </div>
      <div id="contacts-status" class="panel-body">
      </div>
      <div class="list-group" id="contact-list">
      </div>
    </div>
    <div id="cnt">
      
    </div>


    <!-- token display -->
    <!-- <div id="token-display" class="page panel panel-default">
      <div class="panel-body">
        <h4>Access Token:</h4>
        <code id="token"></code>
        <h4>Expires:</h4>
        <p id="expires-display"></p>
        <h4>ID Token:</h4>
        <code id="id-token"></code>
      </div>
    </div> -->
  </div>

  <!-- Handlebars template for message list -->
  <script id="msg-list-template" type="text/x-handlebars-template">
    {{#each messages}}
    <div class="list-group-item">
      <h3 id="msg-from" class="list-group-item-">{{this.from.emailAddress.name}}</h3>
      <h4 id="msg-subject" class="list-group-item-heading">{{this.subject}}</h4>
      <p id="msg-received" class="list-group-item-heading text-muted"><em>Received: {{formatDate this.receivedDateTime}}</em></p>
      <p id="msg-preview" class="list-group-item-text text-muted"><em>{{this.bodyPreview}}</em></p>
    </div>
    {{/each}}
  </script>

  <!-- Handlebars template for event list -->
  <script id="event-list-template" type="text/x-handlebars-template">
    {{#each events}}
    <div class="list-group-item">
      <h4 id="event-subject" class="list-group-item-heading">{{this.subject}}</h4>
      <p id="event-start" class="list-group-item-heading">Start: {{formatDate this.start.dateTime}}</p>
      <p id="event-end" class="list-group-item-heading">End: {{formatDate this.end.dateTime}}</p>
    </div>
    {{/each}}
  </script>

  <!-- Handlebars template for contact list -->
  <script id="contact-list-template" type="text/x-handlebars-template">
  <form id="confrm">
    {{#each contacts}}
      
       <input type="hidden" name="name[]" value="{{this.givenName}} {{this.surname}}">
       <input type="hidden" data-id="{{this.emailAddresses.0.address}}" name="contact_email[]" value="{{this.emailAddresses.0.address}}">
       <input type="hidden" class='nm' name="phoneNumber[]" value="{{this.mobilePhone}}">
       <input type="hidden" name="birthdate[]" value="{{this.birthday}}" placeholder="birthdate">
       <input type="hidden" name="company_name[]" value="{{this.companyName}}" placeholder="company_name">
       <input type="hidden" name="contact_job_title[]" value="{{this.jobTitle}}" placeholder="contact_job_title">
      <div class="list-group-item" >
    <!--  <h4 id="contact-name" class="list-group-item-heading">{{this.givenName}} {{this.surname}}</h4> -->
    <!-- <p id="contact-email" class="list-group-item-heading">Email: {{this.emailAddresses.0.address}}</p> -->
    <!--  <p id="contact-email" class="list-group-item-heading">CompanyName: {{this.companyName}}</p> -->
    <!--<p id="contact-email" class="list-group-item-heading">Birthday: {{this.birthday}}</p> -->
    <!--   <p id="contact-email" class="list-group-item-heading">Mobile: {{this.mobilePhone}}</p>-->
     <!-- <p id="contact-email" class="list-group-item-heading">Phone: {{this.HomePhone}}</p> -->
     <!--  <p id="contact-email" class="list-group-item-heading">Title: {{this.title}}</p> -->
     <!--  <p id="contact-email" class="list-group-item-heading">Job Title: {{this.jobTitle}}</p> -->
      
    
    </div>
 
    {{/each}}
    <button class='btn' type='button' onclick="return dataShow();" onload="alert('loAD');" >import</button>
   </from>
</script>


<?php 

 

?>

<script type="text/javascript">

   /*$("document").ready( function () {
        alert("Hello, world");
    }); */


    function dataShow(){
       var baseurl=$('#base_url').val();
       var srchData = new FormData($("#confrm")[0]);
        $.ajax({
            url : baseurl+"OutlookContacts/addoutdata/",
            data : srchData,
            type:"POST",
            contentType:false,
            processData:false,
            success:function(res)
            {
              swal('success','Contacts Imported Successfully !');
              $('.swal-button--confirm').on('click',function(){
                window.location.href=baseurl+'OutlookContactList';
              });
            }
        }); 
    }
        
$(document).ready(function() {
 
  // Fakes the loading setting a timeout
    setTimeout(function() {
        $('body').addClass('loaded');
        $('body').addClass('bounce');
        $('body').addClass('bounce');
        $('body').addClass('animated');

    }, 3500);
 
});

</script>

<?php


 ?>

</body>
</html>