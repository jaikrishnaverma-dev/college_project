<?php
  
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
$id = $_SESSION['loginid'];
$api_key = $_SESSION['api_key'];


?>

<div class="app-title">
  <div>
    <h1><i class="fa fa-edit"></i> Registrations</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">dashboard</li>
    <li class="breadcrumb-item"><a href="#">Registrations</a></li>
  </ul>
</div>

<div class="tile">
  <div class="tile-body">
  <?php 
  if($_SESSION['role']=="admin"){ 
     $db->showInTable("members", "id,name,dob,qualification,designation,college_name,university_name,address,phone,email,books_published,article_published,membership_session,amount,comment,created_date", "", "delete", ""); 
  }
  else{
    $db->showInTable("members", "*",array("byuser" =>$_SESSION['userid']), "delete", ""); 
   }?>

  </div>
</div>