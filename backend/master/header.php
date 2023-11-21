<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title> Admin </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.php"><?php echo strtoupper($_SESSION['role']) ?></a>
      <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i> <?php echo $_SESSION['name'] ?></a></li>
            <li><a class="dropdown-item" href="index.php?page=D_edit_profile"><i class="fa fa-cog fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="controller/logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar" ></div>
  
    <aside class="app-sidebar" style="z-index:1029">
 
      <div class="app-sidebar__user"> <div>
          <p class="app-sidebar__user-name"><?php echo strtoupper($_SESSION['role']) ?> PANEL</p>
        </div>
      </div>
      <ul class="app-menu">
        
        <li><a class="app-menu__item" href="index.php?page=printsRJ"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <?php
        if($_SESSION['role']=="admin"){ ?>
        <li class="treeview "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">User</span><i class="treeview-indicator fa fa-angle-right"></i></a> 
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="index.php?page=D_addUser&flag=1"><i class="icon fa fa-circle-o"></i> Add User</a></li>
            <li><a class="treeview-item" href="index.php?page=D_addUser&flag=2"><i class="icon fa fa-circle-o"></i> User List</a></li>

          </ul>
        </li> 
        <?php }?>
        <li style="margin-top:20;padding-left:15px">Members</li>
        <li><a class="app-menu__item" href="index.php?page=registration"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Registrations</span></a></li>
        <li><a class="app-menu__item" href="index.php?page=payments"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Payments</span></a></li>
        
        <li style="margin-top:20;padding-left:15px">WEBSITE</li>
        <li style="margin-top:20;padding-left:15px"><a class="treeview-item" href="../index.php"><i class="icon fa fa-circle-o"></i> View Website</a></li>
        <li style="margin-top:20;padding-left:15px">SERVICES</li>
        <!-- <li style="margin-top:20;padding-left:15px"><a class="treeview-item" href="index.php?page=page-detail"><i class="icon fa fa-circle-o"></i> View Profile</a></li> -->
        <li style="margin-top:20;padding-left:15px"><a class="treeview-item" href="index.php?page=D_edit_profile"><i class="icon fa fa-circle-o"></i>Profile</a></li>
        <li style="margin-top:20;padding-left:15px"><a class="treeview-item" href="controller/logout.php"><i class="icon fa fa-circle-o"></i> Log Out</a></li>
       </ul>
     
     
    </aside>
   