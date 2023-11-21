<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id = $_SESSION['loginid'];
$api_key = $_SESSION['api_key'];


?>

<div class="app-title">
  <div>
    <h1><i class="fa fa-edit"></i> Payments Details</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">dashboard</li>
    <li class="breadcrumb-item"><a href="#">Payments Details</a></li>
  </ul>
</div>

<div class="tile">
  <div class="tile-body">
    <?php
    if ($_SESSION['role'] == "admin") {
      $db->showInTableWithoutTool("payments");
    } else {
      $db->showInTableWithoutTool("payments");
    } ?>

  </div>
</div>