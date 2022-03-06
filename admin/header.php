<?php 
session_start();
$URL = $_SERVER['REQUEST_URI'];
$url=explode('/',$URL);
$URL=$url[count($url)-1];
if(isset($_GET['unset'])){
 unset($_SESSION['admin']);
 unset($_SESSION['login']);
 header('location:login.php');
}
if(isset($_POST['search'])){
  $name=$_POST['name'];

$pos = strpos("blog", $name);
if ($pos !==  false) 
  header('location:blog.php');

$pos = strpos("candidates", $name);
  if ($pos !==  false) 
    header('location:candidates.php');

$pos = strpos("offres", $name);
    if ($pos !==  false) 
      header('location:offres.php');

$pos = strpos("recruteur", $name);
    if ($pos !==  false) 
      header('location:company.php');

$pos = strpos("home", $name);
    if ($pos !==  false) 
      header('location:home.php');

 $pos = strpos("index", $name);
      if ($pos !==  false) 
        header('location:home.php');

 $pos = strpos("profile", $name);
        if ($pos !==  false) 
          header('location:profile.php');
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <!-- Custom fonts for this template-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-0">
                        <img src="img/logo.png" width="64px" />
                    </div>
                    <div class="sidebar-brand-text mx-3">Khedamti</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pages</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Les listes :</h6>
                            <a class="collapse-item" href="candidates.php">les candidates</a>
                            <a class="collapse-item" href="company.php">les recruteur</a>
                            <a class="collapse-item" href="offres.php">les Offres</a>
                            <a class="collapse-item" href="blog.php">les blog</a>
                        </div>
                    </div>
                </li>

            
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            

                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" name="name" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" name="search" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <?php 
include '../connexion.php'; 
$sqll="SELECT *,Month(created_at) mois,Day(created_at) jour,YEAR(created_at) annee FROM contact";
$reqq=$db->query($sqll) or die("err");
$conut=$reqq->num_rows;
?>
                                <!-- Nav Item - Messages -->
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-envelope fa-fw"></i>
                                        <!-- Counter - Messages -->
                                        <span class="badge badge-danger badge-counter"><?php echo $conut; ?></span>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                        <h6 class="dropdown-header">
                  Message Center
                </h6>

                                        <?php 
while($tab=$reqq->fetch_array()){
?>
                                            <a class="dropdown-item d-flex align-items-center" href="contact.php?id_contact=<?php echo $tab['id_contact']; ?>">
                                                <div>
                                                    <div class="text-truncate">
                                                        <?php echo substr($tab['comnt'],0,200); ?>
                                                    </div>
                                                    <div class="small text-gray-500">
                                                        <?php echo $tab['email']; ?> &ensp;<font color=red><?php echo $tab['jour']."/".$tab['mois']."/".$tab['annee']; ?></font></div>
                                                </div>
                                            </a>

                                            <?php } ?>

                                                <a class="dropdown-item text-center small text-gray-500" href="contact.php">Read More Messages</a>
                                    </div>
                                </li>

                                <div class="topbar-divider d-none d-sm-block"></div>

                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['admin']; ?></span>
                                        <img class="img-profile rounded-circle" src="img/admin.png">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="profile.php">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php  echo $URL;?>?unset">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                        </a>
                                    </div>
                                </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <style type="text/css">
                        input.largerCheckbox {
                            width: 30px;
                            height: 30px;
                        }
                    </style>