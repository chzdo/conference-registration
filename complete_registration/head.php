<?php 
include '../submit_abstract/database.php';
include '../submit_abstract/presenter.php';
session_start();

if(isset($_SESSION['presenter_login'])){
    $email = $_SESSION['presenter_login'];
$person = new presenter($email,"nsps");
if(isset($_GET['logout'])){
    unset($_SESSION['presenter_login']);
    session_destroy();
    header("location: ../");
}


$hide = "hidden";
if(isset($_POST['pay'])){
    
 if($person->pay()){
  header("location: dashboard.php");
   }else{
    $error = "Could not pay";
     $hide = "";
   }
}


if(isset($_POST['address'])){    
    
     $person->getcompleteRegistration($_POST,$_FILES['passport']);
    if  ($person->setPassport()){
        echo 2;
      if($person->completeRegistration()){
          echo 3;
     //    header("location: dashboard.php");
      }else{
     //       $error = "5";
    //        $hide="";
      }
   
  //  }else{
  //       $error = "Please Select an Image File";
  //          $hide="";
    }
}


?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>DashBoard</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style.css">
        <link href="../img/NSPS.png" rel="icon">
        <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../lib/animate/animate.min.css" rel="stylesheet">
        <link href="../lib/venobox/venobox.css" rel="stylesheet">
        <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <script src="../pace-master/pace-master/pace.js" type="text/javascript"></script>
                    <link href="../pace-master/pace-master/templates/pace-theme-center-atom.tmpl.css" rel="stylesheet" type="text/css"/>
        <!-- Main Stylesheet File -->
        <link href="../css/style.css" rel="stylesheet">
        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>

                input.form-control, select.form-control, a.form-control, label.form-control {
                    height:50px !important;
                }
                button.form-control {
                    height:50px !important;
                }
            </style>
    </head>

    <body>
        <div class="wrapper ">
            <!-- Sidebar  -->
            <div id="side_wrapper">
                <nav id="sidebar">
                    <div class="sidebar-header" style="background: rgba(6, 12, 34, 0.98)">
                       
                              <img src="../img/NSPS-UMBRELLA.png"  height="60"  class="img-right" width="60" alt="" title="">
                                              
                    </div>


                    <ul class="list-unstyled components">

                        <li>
                            <a href="dashboard.php?">Register</a>
                        </li>
                  
                        <li>
                            <a href="../<?= $person->getAbstract()    ?>">Download Abstract</a>
                                        
                        </li>
                          <li>
                            <a href="../<?= $person->getAcceptanceLetter()    ?>">Download Acceptance Letter</a>
                                        
                        </li>
                        <?php if($person->getRegistrationReciept() !== ''|| $person->getRegistrationReciept() != null) { ?>
                        <li>
                            <a href="<?= $person->getRegistrationReciept()    ?>"> Download Registration Reciept</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="uploads.php"> Download Conference materials</a>
                        </li>
                    
                     
                    </ul>

                                 </nav>
            </div>
            <!-- Page Content  -->
            <div id="content" class="p-0 m-0" >
               <nav class="header-fixed navbar navbar-expand-lg " id="header">
                   
                    <div class="container-fluid">
             
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                            <span>Toggle Sidebar</span>
                        </button>
                        <div id="nav-menu-container">
                            <ul class=" nav-menu collapse navbar-collapse " id="navbarSupportedContent">
                           
                               
                                <li><a href="https://nsps.org.ng/membership/index.php">Become a Member</a></li> -->
                              <p>Logged in as <?=       $person->getEmail();        ?></p>
                              <li class="buy-tickets"><a type="button" class="btn" href="dashboard.php?logout=?">   <i  >Log out </i></a></li>
                             
                            </ul>
                         
                        </div>
                    </div>
                </nav>
            <div class="section-with-bg" >
<?php }else{
    header("location: ../");
}