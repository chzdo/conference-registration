<?php 
include 'paperclass.php';
include '../submit_abstract/presenter.php';
session_start();

if(isset($_SESSION['user'])){
$admin = new admin();
if(isset($_GET['logout'])){
    unset($_SESSION['user']);
    session_destroy();
    header("location: ../");
}
if(isset($_GET['d'])){
$pdf = new downloadPDF();
$a = $db->query("select email from conf where registered = 1");
$i=0;
$p = array();
while($v = mysqli_fetch_array($a)){
    $p = new presenter($v['email'],'');
    $val[$i]['pass'] = $p->getPassport();
    $val[$i]['reg'] = $p->getRegID();
    $val[$i]['mem'] = ($p->isMember()? 'MEMBER' : 'NON MEMBER');
    $val[$i]['name'] = $p->getTitle().' '.$p->getName();
    $i++;
}

$pdf->gett($val);
$pdf->stream();
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

                        <li class="d-lg-none d-block">
                            <a href="#menu_item" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle bg-info">Menu</a>
                            <ul class=" collapse  navbar-collapse " >
                                <li class=""><a href="#intro">Home</a></li>
                                <li><a class="" href="#about">About</a></li>
                                <li><a href="#speakers">Speakers</a></li>
                                <li><a href="#schedule">Schedule</a></li>
                                <li><a href="#venue">Venue</a></li>
                                <li><a href="#hotels">Hotels</a></li>
                                <li><a href="#supporters">Sponsors</a></li>
                                <li><a href="https://nsps.org.ng/membership/index.php">Become a Member</a></li>

                                <li class="buy-tickets"><a type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal2" data-ticket-type="standard-access">Login</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?">All Abstracts<span><i class="badge badge-info"><?=  $admin->getNumAllAbstract()        ?></i></span></a>
                        </li>
                  
                        <li>
                     <a href="index.php?abs=<?=    base64_encode('accepted');           ?>">Accepted Abstracts <span><i class="badge badge-info"><?=  $admin->getNumAbstract(1)        ?></i></span></a>
                                        
                        </li>
                        <li>
                            <a href="index.php?abs=<?=    base64_encode('rejected');           ?>">Rejected Abstracts<span><i class="badge badge-info"><?=  $admin->getNumAbstract(2)        ?></i></span></a>
                        </li>
                        <li>
                            <a href="index.php?abs=<?=   base64_encode('awaiting');           ?>">Abstracts Awaiting Approval <span><i class=" badge badge-info"><?=  $admin->getNumAbstract(0)        ?></i></span>  </a>
                        </li>
                        <li>
                            <a href=participants.php?register=<?=    base64_encode('reg');           ?>">Participants<span><i class="badge badge-info"><?=  $admin->getNumParticipants()        ?></i></span></a>
                        </li>
                         <li>
                             <a href="participants.php?book=<?=    base64_encode('all');           ?>">Booked Participants<span><i class="badge badge-info"> <?=  $admin->getNumPaidParticipants()        ?> </i></span></a>
                        </li>
                          <li>
                             <a href="upload.php">Upload Conference Materials</a>
                        </li>
                          <li>
                             <a href="download.php?">Download Conference Tags</a>
                        </li>
                        <li class="disabled" hidden>
                            <a href="index.php?abs=<?=    base64_encode('all');           ?>">Hotel Reservation Applications<span><i class="badge-info disabled" ></i></span></a>
                        </li>
                    </ul>

                                 </nav>
            </div>
            <!-- Page Content  -->
            <div id="content" class="p-0 m-0" >
               <nav class=" header-fixed navbar navbar-expand-lg " id="header">
                   
                    <div class="container-fluid">
             
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                            <span>Toggle Sidebar</span>
                        </button>
                        <div id="nav-menu-container">
                            <ul class=" nav-menu collapse navbar-collapse " id="navbarSupportedContent">
                                <li class="menu-active"><a href="#intro">Home</a></li>
                                  <li><a class="" href="#about">About</a></li>
                              <!--  <li class="menu-active"><a href="#intro">Home</a></li>
                                <li><a class="" href="#about">About</a></li>
                                <li><a href="#speakers">Speakers</a></li>
                                <li><a href="#schedule">Schedule</a></li>
                                <li><a href="#venue">Venue</a></li>
                                <li><a href="#hotels">Hotels</a></li>
                                <li><a href="#supporters">Sponsors</a></li>
                                <li><a href="https://nsps.org.ng/membership/index.php">Become a Member</a></li> -->
                              <p>Logged in as Admin</p>
                              <li class="buy-tickets"><a type="button" class="btn" href="index.php?logout=?">   <i  >Log out </i></a></li>
                             
                            </ul>
                         
                        </div>
                    </div>
                </nav>
            <div class="section-with-bg" >
<?php }else{
    header("location: ../");
}