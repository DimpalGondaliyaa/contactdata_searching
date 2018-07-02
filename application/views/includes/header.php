<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title>ContactBook - <?php echo $pageTitle; ?></title>
    <!-- CSS-->
    <link href="<?php echo base_url(); ?>html/css/style.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->


    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <!-- forn-awesom -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>html/js/script.js"></script>
    <script src="<?php echo base_url(); ?>html/js/materialize.js"></script>
    
    <!-- Sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script> -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

  
    <?php foreach($stylesheet as $fileName){ ?>
    <link href="<?php echo base_url(); ?>html/css/<?php echo $fileName; ?>" rel="stylesheet">
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <header>
        <nav>
            <div class="nav-wrapper">
                <ul id="dropdown1" class="dropdown-content">
                  <li><a href="<?php echo base_url(); ?>ContactList">Contact List</a></li>
                  <li><a href="<?php echo base_url() ?>Dashboard">Import Contacts</a></li>
                </ul>

                  <ul id="outlook" class="dropdown-content">
                  <li><a href="<?php echo base_url(); ?>OutlookContactList">Contact List</a></li>
                  <li><a href="<?php echo base_url() ?>outlookcontacts">Import Contacts</a></li>
                </ul>

                <ul id="dropdown2" class="dropdown-content">
                  <li><a href="<?php echo base_url() ?>/CreateAccount/logout">Sign Out</a></li>
                </ul>

                <ul id="manualContacts" class="dropdown-content">
                  <li><a href="<?= base_url(); ?>AddContact">Add Manual Contacts</a></li>
                  <li><a href="<?= base_url(); ?>Uploadcsv">Import From CSV</a></li>
                  <li class="divider"></li>
                  <li class="#ede7f6 deep-purple lighten-5"><a href="<?= base_url();?>ManualContactList">Manual Contact List</li>
                </ul>

                <a href="<?php echo base_url() ?>Home" class="brand-logo"><img src="<?php echo base_url()?>html/images/logo.jpg" class="reponsive-img"></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li>
                        <?php if($this->session->userdata('email') !=''){ ?>
                            <a class="dropdown-trigger" href="#!" data-target="dropdown1">google<i class="material-icons right">arrow_drop_down</i></a>
                        <?php } else { ?>
                             <button data-target="signin" class="btn modal-trigger btnstyle">Signin</button>
                           </li>
                           <li>
                            <a class="btn" href="<?php echo base_url(); ?>CreateAccount" style="background: #f4a11a;color: #492763;font-weight: 500;">CreateAccount</a>
                        <?php } ?>
                    </li>

                     <li>
                        <?php if($this->session->userdata('email') !=''){ ?>
                            <a class="dropdown-trigger" href="#!" data-target="outlook">outlook<i class="material-icons right">arrow_drop_down</i></a>
                        <?php } ?>
                    </li>


                    <li>
                        <?php if($this->session->userdata('email') !=''){ ?>
                            <a class="dropdown-trigger" href="#!" data-target="dropdown2"><?php echo $this->session->userdata('email'); ?><i class="material-icons right">arrow_drop_down</i></a>
                        <?php } else {?>
                           
                        <?php } ?>
                    </li>
                     <?php if($this->session->userdata('email') !=''){ ?>
                     <li>
                         <a  class="dropdown-trigger" href="#!" data-target="manualContacts"><i class="far fa-plus-square"></i> Add New <i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                  <?php } else { } ?>
                </ul>
    
            <ul id="slide-out" class="sidenav">
                <li>
                <?php if($this->session->userdata('email') !=''){
                ?><a class="waves-effect" href="#!"><?php echo $this->session->userdata('email'); ?></a>
                <?php
                } else {?>
                    <a href="#!" data-target="signin" class="btn modal-trigger">Signin</a>
                    <?php } ?>
                </li>

                <li><a class="subheader">Subheader</a></li>
                 <li><div class="divider"></div></li>
                 <?php if($this->session->userdata('email') !=''){ ?>
				<li><a class="waves-effect" href="<?php echo base_url() ?>">Import Contacts</a></li>
                <li><a class="waves-effect" href="<?php echo base_url() ?>CreateAccount/logout">Sign Out</a></li>
                <?php } else {}?>
            </ul>
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
        </nav>
    </header>
</head>
<body>


  <!-- Modal Structure -->
  <div id="signin" class="modal signinModal">
    <div class="modal-content">
      <h4>User Login</h4>
      <p>signin for Great Experience.</p>
<div class="login Box">
      <div class="row">
    <form class="col s12" name="signinFrom" id="signinFrom" method="POST">
      <div class="row">
        <div class="input-fieldcol s12">
          <input id="email" name="email" type="email" class="validate" placeholder="someone@here.com">
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
      </div>
      <div class="row">
        <div class="input-fieldcol s12">
          <input id="password" name="password" type="password" class="validate" placeholder="**********">
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat btn-login">Sign In</a>
          <a class="" href="#!">Forget Password</a>
        </div>
      </div>
    </form>
  </div>
</div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"></a>
    </div>
  </div>


  <style type="text/css">
    .btnstyle
    {
           background: #f4a11a;
              color: #492763;
              font-weight: 500;
    }
  </style>