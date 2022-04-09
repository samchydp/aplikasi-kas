 <?php  
        session_start();
        if(isset($_SESSION['user'])) {

        } else {
            echo '<script>document.location.href= "login.php"</script>';
        }
include('koneksi.php');
        if(isset($_GET['action']) && $_GET['action'] == 'logout'){
            session_destroy();
            echo '<script>document.location.href= "login.php"</script>';
        }
    ?> 

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengelolaan Kas MODISTE PUTRI</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">




    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0;justify-content: unset;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">MODISTE PUTRI</a> 
            </div>
  <div style="color: white; margin-right: 0; margin-left: auto;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?= date('Y-m-d H:i:s') ?> &nbsp; <a href="?action=logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center" style="width: 100%;">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>

                    <li style="width: 100%;">
                        <a  href="index.php?page"><i class="bi bi-house-door"></i> Dashboard</a>
                    </li>
                     
                      <li style="width: 100%;">
                        <a  href="?page=users"><i class="bi bi-person-badge"></i> Management User</a>
                    </li>

                     <li style="width: 100%;">
                        <a  href="?page=masuk"><i class="bi bi-cash"></i> Kas Masuk</a>
                    </li>

                     <li style="width: 100%;">
                        <a  href="?page=keluar"><i class="bi bi-cash-coin"></i> Kas Keluar</a>
                    </li>

                     <li style="width: 100%;">
                        <a  href="?page=laporan"><i class="bi bi-clipboard-pulse"></i> Rekapitulasi Kas</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     
                     <?php 

                        $page = isset($_GET['page']) ? $_GET['page']: null;
                        $aksi = isset($_get['aksi']) ? $_get['aksi']: null;

                        if ($page =="users") {
                            if ($aksi == "") {
                                include "page/users/users.php";
                            }
                        } elseif ($page =="masuk") {
                            if ($aksi == "") {
                                include "page/kas_masuk/masuk.php";
                            }
                        } elseif ($page =="keluar") {
                            if ($aksi == "") {
                                include "page/kas_keluar/keluar.php";
                            }
                        } elseif ($page =="laporan") {
                            if ($aksi == "") {
                                include "page/laporan_kas/laporan.php";
                            }
                        } elseif ($page =="") {
                                include "home.php";
                            }
    
                        ?>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    
   
</body>
</html>
