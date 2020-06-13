<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>

<?php
include '../submit_abstract/database.php';
include '../submit_abstract/presenter.php';
session_start();

$hide="hidden";

    
    if (isset($_POST['phone'])){
 $email = htmlentities($_POST['email']);
  $phone = htmlentities($_POST['phone']);
  $DB = new connection('nsps');
  $sql = "select * from conf where email = '$email' and phonenumber = '$phone'";
  $DB->query($sql);
  if ($DB->resultset_num > 0){
      $person = new presenter($email, "nsps");
     if  ($person->isAccepted()){
         $_SESSION['presenter_login'] = $email;
         header("location: dashboard.php");
     }else{
         $error = "Your abstract is yet to be accepted";
         $hide ="";
     }
     
  }else{
       $error = "User Not Found";
         $hide ="";
  }
}
    
   
    ?>



    <html lang="en">

        <head>
            <meta charset="utf-8">
            <title>Conference - Nigerian Society of Physical Sciences</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="" name="keywords">
            <meta content="" name="description">

            <!-- Favicons -->
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

            <!-- Main Stylesheet File -->
            <link href="../css/style.css" rel="stylesheet">
            <style>

                input.form-control, select.form-control, a.form-control, label.form-control {
                    height:80px !important;
                }
                button.form-control {
                    height:80px !important;
                }
            </style>
            <!-- =======================================================
              Theme Name: TheEvent
              Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
              Author: BootstrapMade.com
              License: https://bootstrapmade.com/license/
            ======================================================= -->
        </head>

        <body>

            <!--==========================
              Header
            ============================-->
            <header id="header">
                <div class="container">

                    <div id="" class="pull-left">
                        <!-- Uncomment below if you prefer to use a text logo -->
                        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
                        <a href="#intro" class="scrollto"><img src="../img/NSPS-UMBRELLA.png"  height="60" width="60" alt="" title=""></a>
                    </div>

                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="../#intro">Home</a></li>
                            <li><a href="../#about">About</a></li>
                            <li><a href="../#speakers">Speakers</a></li>
                            <li><a href="../#schedule">Schedule</a></li>
                            <li><a href="../#venue">Venue</a></li>
                            <li><a href="../#hotels">Hotels</a></li>
                            <li><a href="../#supporters">Sponsors</a></li>
                            <li><a href="https://nsps.org.ng/membership/index.php">Become a Member</a></li>

                           
                        </ul>
                    </nav><!-- #nav-menu-container -->
                </div>
            </header><!-- #header -->

            <!--==========================
              Intro Section
            ============================-->
            <section id="">
                <div class=" fadeIn">

                </div>
            </section>

            <main id="main">

                <!--==========================
                  About Section
                ============================-->



                <!--==========================
                  Venue Section
                ============================-->


                <!--==========================
                  Hotels Section
                ============================-->




                <!--==========================
                  F.A.Q Section
                ============================-->


                <!--==========================
                  Subscribe Section
                ============================-->


                <!--==========================
                  Buy Ticket Section
                ============================-->
                <br>
                <br>
                <br>
                <br>
            
                      <section id="buy-tickets" class="section-with-bg wow fadeInUp">
                <div class="container ">

                    <div class="section-header">
                        <h2>LOGIN</h2>

                    </div>
                    <div class="row m-5">
                        <div class="col-lg-12">
                            <div class="form-group m-5">
                                <div >
                                    <h5 class="  text-uppercase text-center"(PDF)></h5>

                                    <form class="p-4 m-5" method="post" action="index.php" enctype="multipart/form-data">
                                        <hr>
                                        <div class="form-group m-5">
                                            <div class="input-group mb-3">

                                                <input type="email"  required="" name="email" class = "form-control input-lg" id="username" placeholder="Enter Email Address"  >

                                            </div>
                                        </div> 

                                        <div class="form-group m-5">
                                            <div class="input-group mb-3">


                                                <input type="text" style="" name="phone" class = "form-control input-lg" id="username" placeholder="Enter Phone Number"  required=""  value="">

                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-warning shadow form-control ">LOGIN</button>
                                        </div>
                                        <label class="alert alert-info form-control" <?= $hide ?>> <?= @$error ?></label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>





          



                <!-- Modal Order Form -->
                <div id="buy-ticket-modal2" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">NSPS Conference 2020 Login Page</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="#">

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="your-email" placeholder="Your Email Address">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phoneumber" placeholder="Your Phone Number">
                                    </div>                
                                    <div class="text-center">
                                        <button type="submit" class="btn">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

            </section>



        </main>


        <!--==========================
          Footer
        ============================-->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-info">
                            <img src="img/NSPS-UMBRELLA.png" alt="TheEvenet"> <b>About NSPS</b>
                            <p>NSPS is a nonprofit and nonpolitical organization of Physical Scientists incorporated by the Corporate Affairs Commission of Nigeria on January 9, 2019 (CAC/IT/NO 123135). The main objective of the Society is to promote the research and study of Physical Sciences in Nigeria and provide effective programs in its support.</p>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="fa fa-angle-right"></i> <a href="https://nsps.org.ng/about/mission.php">Mission</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="https://nsps.org.ng/governance/index.php">Current Executive Committee</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="https://nsps.org.ng/governance/past_executives.php">Past Excecutive Committee</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="https://nsps.org.ng/governance/nsps_council.php">Governing Council</a></li>           

                                <li><i class="fa fa-angle-right"></i> <a href="https://nsps.org.ng/membership/membership_benefits.php">Membership Benefits</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="fa fa-angle-right"></i> <a href="https://nsps.org.ng">Home</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="https://nsps.org.ng/about/index.php">About us</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="https://nsps.org.ng/membership/index.php">Membership</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="http://journal.nsps.org.ng/">Journal</a></li>
                                <li><i class="fa fa-angle-right"></i> <a href="https://nsps.org.ng/NSPS-CONSTITUTION-and-BYE-LAWS-15-11-2018.pdf">Constitution</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h4>Contact Us</h4>
                            <p>
                                Department of Physics<br>
                                Federal University of Lafia<br>
                                Nasarawa State, Nigeria <br>
                                <strong>Phone: </strong> +2348103950870 | +234 8036481762<br>
                                <strong>Email: </strong>info@nsps.org.ng<br>
                            </p>

                            <div class="social-links">
                                <a href="https://twitter.com/nspsciences" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="https://web.facebook.com/NSPSciences/" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/nspsciences/" class="instagram"><i class="fa fa-instagram"></i></a>
                                <a href="https://chat.whatsapp.com/JTcLCxw2KH7EW8AGkiShe6" class="instagram"><i class="fa fa-whatsapp"></i></a>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>Nigerian Society of Physical Sciences</strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!--
                      All the links in the footer should remain intact.
                      You can delete the links only if you purchased the pro version.
                      Licensing information: https://bootstrapmade.com/license/
                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
                    -->

                </div>
            </div>
        </footer><!-- #footer -->

        <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="../lib/jquery/jquery.min.js"></script>
        <script src="../lib/jquery/jquery-migrate.min.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../lib/easing/easing.min.js"></script>
        <script src="../lib/superfish/hoverIntent.js"></script>
        <script src="../lib/superfish/superfish.min.js"></script>
        <script src="../lib/wow/wow.min.js"></script>
        <script src="../lib/venobox/venobox.min.js"></script>
        <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Contact Form JavaScript File -->
        <script src="contactform/contactform.js"></script>

        <!-- Template Main Javascript File -->
        <script src="../js/main.js"></script>
    </body>

    </html>
