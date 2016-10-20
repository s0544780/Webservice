<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Malendo Webservice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 <div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-sm-5">
	              <!-- Logo -->
	              <div class="logo">
                      <img style="max-width:100px; margin-top: 7px;" src="images/headerLogo.png" />
	                
	                  
	              </div>

	           </div>
	           <div class="col-md-4">
	            <div class="logo">
	            <h1><a href="dashboard.php">Malendo Webservice</a></h1>
                   </div>
	            </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                <!--  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div> -->
	                </div>
	              </div>
	           </div>
	    
	        </div>
	     </div>
	</div>