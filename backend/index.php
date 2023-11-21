<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
 <?php 
  session_start();

  $id = $_SESSION['loginid'];
  $api_key = $_SESSION['api_key'];
  include 'Config/ConnectionObjectOriented.php';
  include 'Config/DB.php';
  $db = new DB($conn);
  
if (isset($_SESSION["loginid"])) {
	$users=$db->select("user","*",array("id"=>$_SESSION["loginid"]));
	$user=$users->fetch_assoc();
}else{
    $db->sendTo('../index.php');
}

    include("master/header.php");?>
    <main class="app-content">
    
    <?php
      if(isset($_REQUEST['status']))
      {
        if($_REQUEST['status']=='failed'){
          $_REQUEST['status']='danger';
        }
        $temp=$_REQUEST['message'];
       echo '<div class="bs-component" style="">
       <div class="alert alert-dismissible alert-'.$_REQUEST['status'].'">
         <button class="close" type="button" data-dismiss="alert">×</button><strong>Notify : </strong><a class="alert-link" href="#"></a>'.$temp.'.
       </div>
      </div>';  
      
      }
    // if($_SESSION["role"]=="admin"){
    if(!$_GET['page']){
      include('registrations.php');
    }
  else{
    switch ($_GET['page'])
    { 
      case 'update' : include('update.php');
      break;
      case 'users' : include('users.php');
      break;
      case 'registration' : include('registrations.php');
      break;
      case 'payments' : include('payments.php');
      break;
      case 'D_addUser' : include('D_addUser.php');
      break;
      case 'D_edit_profile' : include('D_edit_profile.php');
      break;
    }
  }
  
    ?>
    </main>
    <?php 
    include("master/footer.php");?>