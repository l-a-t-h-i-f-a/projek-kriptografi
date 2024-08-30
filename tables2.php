<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Tabel Kritik</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.html">
       <img src="assets/img/logo.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">MALA Fish Store Admin</h5>
     </a>
   </div>
<ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="halo.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

       <li>
        <a href="profile.php">
          <i class="zmdi zmdi-accounts"></i> <span>Accounts</span>
        </a>
      </li>

       <li>
        <a href="tables.php">
          <i class="zmdi zmdi-grid"></i> <span>Decription Critique Table</span>
        </a>
      </li>

      <li>
        <a href="tables1.php">
          <i class="zmdi zmdi-grid"></i> <span>Encryption Critique Table</span>
        </a>
      </li>

      <li>
        <a href="tables2.php">
          <i class="zmdi zmdi-grid"></i> <span>Decription Review Table</span>
        </a>
      </li>

      <li>
        <a href="tables3.php">
          <i class="zmdi zmdi-grid"></i> <span>Encryption Review Table</span>
        </a>
      </li>
      <li>
        <a href="logout.php">
          <i class="zmdi zmdi-lock"></i> <span>Logout</span>
        </a>
      </li>

    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
  </ul>
     
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
          <center><h1>DECRIPTION REVIEW</h1></center>
          <div class="card">
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Review</th>
                            <th scope="col">Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        function dekripsi_rot13($decrypt1){
                            for($i=0; $i < strlen($decrypt1); $i++){
                                $c = ord($decrypt1[$i]);
                                
                                if($c >= ord('n') & $c <= ord('z') | $c >= ord('N') & $c <= ord('Z')){
                                    $c -= 13;
                                }elseif($c >= ord('a') & $c <= ord('m') | $c >= ord('A') & $c <= ord('M')){
                                    $c += 13;
                                }
                                $decrypt1[$i] = chr($c);
                            }
                            return $decrypt1;
                        }
                        include 'config.php';
                        $query = mysqli_query ($connection, "SELECT * from review");
                        $s=1;
                        while ($data=mysqli_fetch_array($query))
                        {?>

                        <tr>
                            <td> <?php echo $s++ ?></td>
                            <td> 
                                <?php 
                                    $message = $data['review'];

                                    $cipher = "AES-256-CBC";
                                    $secret = "12345678901234567890123456789012";
                                    $option = 0;
                                    $iv = str_repeat("0", openssl_cipher_iv_length($cipher));

                                    $decrypt1 = openssl_decrypt($message, $cipher, $secret, $option, $iv);
                                    //echo $decrypt1;

                                    $final = dekripsi_rot13($decrypt1);
                                    echo $final;
                                ?>
                            </td>
                            <td>
                                <?php
                                    //echo $gambar = $data['image'];
                                    $base64 = $data['image'];
                                    echo '<img src="data:image/gif;base64,'.$base64.' "width="200" height="200" />';
                                ?>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?> 
                    </tbody>
               </table>

            </div>
            </div>
            <div>
             <center><a class="btn btn-outline-primary"
             href="tables3.php">Encryption</a></center>
             </div>
          
      <!--End Row-->

    <!--start overlay-->
      <div class="overlay toggle-menu"></div>
    <!--end overlay-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  
  <!--Start footer-->
  <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2024 Lathifa
        </div>
      </div>
    </footer>
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
   
  </div><!--End wrapper-->


  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
	
</body>
</html>
