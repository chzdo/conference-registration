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

define('WEB_URL_NSPS', 'http://localhost/nspsciences/');
define('WEB_URL_CONF', 'http://localhost/conf/');


define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'nspszfar_nsps');
$link = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$hide="hidden";
if (isset($_SESSION['author'])) {
    
    
    
    


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
                                    <?php 
 $result = mysqli_query($link,"select * from conf where email='".$_SESSION['author']."';");
$user = mysqli_fetch_array($result);
                                        
           


include 'demoremita_constants.php';
$timesammp=DATE("dmyHis");    
$orderID = $timesammp;
$payerName = "".$user["name"]."" ;
$payerEmail = "".$user["email"]."" ;
$payerPhone = "".$user["phonenumber"]."" ;
$serviceTypeID = SERVICETYPEID;
$totalAmount = 2000;
$responseurl = PATH."/confirmation.php";
$hash_string = MERCHANTID . $serviceTypeID . $orderID . $totalAmount . APIKEY;
$hash = hash('sha512', $hash_string);
$itemtimestamp = $timesammp;
//The JSON data.


$content = 
  '{"serviceTypeId":"'.$serviceTypeID.'"'.",".'
    "amount":"'.$totalAmount.'"'.",".'
    "hash":"'.$hash.'"'.",".'
    "orderId":"'.$orderID.'"'.",".'
    "payerName":"'.$payerName.'"'.",".'
    "payerEmail":"'.$payerEmail.'"'.",".'
    "payerPhone":"'.$payerPhone.'"
  }';

 $result = mysqli_query($link,"select * from conf where email='".$_SESSION['author']."';");
$userX = mysqli_fetch_array($result);
if($userX['rrr']=='NULL'||$userX['rrr']==''||is_null($userX['rrr'])){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => GATEWAYURL,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $content,
  CURLOPT_HTTPHEADER => array(
    "Authorization: remitaConsumerKey=".MERCHANTID.",remitaConsumerToken=$hash",
    "Content-Type: application/json",
    "cache-control: no-cache"
  ),
));

$json_response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

$jsonData = substr($json_response, 7, -1);
$response = json_decode($jsonData, true);

$statuscode = $response['statuscode'];
$statusMsg = $response['status'];

if($statuscode=='025'){
$rrr = trim($response['RRR']);
$new_hash_string = MERCHANTID . $rrr . APIKEY;
$new_hash = hash('sha512', $new_hash_string);
$query = "update conf set rrr='$rrr', orderID ='$orderID' where  email ='".$_SESSION['author']."'";
if(!@mysqli_query($link,$query)) {
            if (mysqli_errno () == 1062) //duplicate value
               echo "<script>  alert('RRR Successfully Generated') </script>";
       else
                 showAlert(mysqli_error());
        } else 
        ?>


<p><font color="blue"><h2>Payment Instructions</h2></font></p>
<p><font color="blue">We accept 3 modes of payment.</p>
<p><font color="blue">1-You can click on <b>Pay Online Now</b> and select an option to pay with your MasterCard</p>
<p><font color="blue">2-You can click on <b>Pay online Now</b> and select an option to pay via your online banking</p>
<p><font color="blue">3-You can click on <b>Print and Pay in Bank</b>. In this case, you must return to your portal and click on <b>Verify Payment Made</b>.</p>
        <div style="text-align:center; font-size:22px; color:red">
        <h1><b>Remita Retrieval Reference (RRR) is: <?php echo "".$rrr.""?></b></h1>
        <h1>Your total amount to pay is: ₦2,000</b></h1>
      
      
        <div class="col-xs-12 col-md-9 col-lg-7">
          <form action="<?php echo "".GATEWAYRRRPAYMENTURL.""?>" method="POST">
          <input id="merchantId" name="merchantId" value="<?php echo "".MERCHANTID.""?>" type="hidden"/>
          <input id="rrr" name="rrr" value="<?php echo "".$rrr.""?>" type="hidden"/>
          <input id="responseurl" name="responseurl" value="<?php echo "".$responseurl.""?>" type="hidden"/>
          <input id="hash" name="hash" value="<?php echo "".$new_hash.""?>" type="hidden"/>
        </div>
        <div class="form-group">
          <div style="padding:10px;" align="center">
            <input  type="submit"class="btn btn_add_new btn-success"  name="submit" value="Pay Online Now" style="width: 20%; text-align: center;"/>
          
        </div>
                  </form>
                   <div style="padding:10px;" align="center"><button class="btn btn_add_new btn-success" onClick="window.print()">Print and Pay in Bank</button>
      </div></div>
 <?php
}
else{
echo "Error Generating RRR - ".$response;
}

                
            
            }else{$rrr = "".$user['rrr']."";

$new_hash_string = MERCHANTID . $rrr . APIKEY;
$new_hash = hash('sha512', $new_hash_string);
$responseurl = PATH . "/confirmation.php";
    ?>

<h1 style="text-align: center;"></h2>
<p><font color="blue"><h2>Payment Instructions</h2></font></p>
<p><font color="blue">We accept 3 modes of payment.</p>
<p><font color="blue">1-You can click on <b>Pay Online Now</b> and select option to pay with your MasterCard</p>
<p><font color="blue">2-You can click on <b>Pay online Now</b> and select an option to pay via your online banking</p>
<p><font color="blue">3-You can click on <b>Print and Pay in Bank</b>. In this case, you must return to your portal and click on <b>Verify Payment Made</b></p>
<p><font color="green">If you have paid already, please click on  <b>Verify Payment Made</b>. If you encounter any difficulty, do not hesitate to chat with us or send an email admin@fulafia.edu.ng along with your evidence of payment.</font></p>
        <div style="text-align:center; font-size:22px; color:red">
        <h1><b>Remita Retrieval Reference (RRR) is: <?php echo "".$user['rrr'].""?></b></h1>
        <h1>Your total amount to pay is: ₦2,000</h1>
        </div>
       
        <div class="col-xs-12 col-md-9 col-lg-7">
        <form action="<?php echo "".GATEWAYRRRPAYMENTURL.""?>" method="POST">
        <input id="merchantId" name="merchantId" value="<?php echo "".MERCHANTID.""?>" type="hidden"/>
        <input id="rrr" name="rrr" value="<?php echo "".$user['rrr'].""?>" type="hidden"/>
        <input id="responseurl" name="responseurl" value="<?php echo "".$responseurl.""?>" type="hidden"/>
        <input id="hash" name="hash" value="<?php echo "".$new_hash.""?>" type="hidden"/>
        </div>
        <div class="form-group">
        <div style="padding:10px;" align="center">
        <input  type="submit" class="btn btn_add_new btn-success"  name="submit" value="Pay Online Now" style="width: 20%; text-align: center;"/>
        </div>
   

        

                  </form>





        <form action="<?php echo "verify.php?rrr=".$user['rrr']."&&orderID=".$user['orderID'].""?>" method="POST">
        <input id="merchantId" name="merchantId" value="<?php echo "".MERCHANTID.""?>" type="hidden"/>
        <input id="rrr" name="rrr" value="<?php echo "".$user['rrr'].""?>" type="hidden"/>
        <input id="responseurl" name="responseurl" value="<?php echo "".$responseurl.""?>" type="hidden"/>
        <input id="hash" name="hash" value="<?php echo "".$new_hash.""?>" type="hidden"/>
        </div>
        <div class="form-group">
        <div style="padding:10px;" align="center">
        <input  type="submit" class="btn btn_add_new btn-success"  name="submit" value="Verify Payment Made" style="width: 20%; text-align: center;"/></div>
       
        </div>
        

        

                  </form>
                  <div style="padding:10px;" align="center"><button class="btn btn_add_new btn-success" onClick="window.print()">Print and Pay in Bank</button>
                <?php }?>
                












                                </div>





                        </section>
                 
                <section id="about">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2>About The Conference</h2>
                                <p>Maiden conference of the Nigerian Society of Physical Sciences will focus on  "Contemporary Breakthroughs in Physical Sciences : Catalyst for Sustainable Development" and the following  17 sessions. The  programme of event highlights the most relevant issues in the area of Physical Sciences. The conference shsll start with keynote and plenary speeches follow by sessions. The conference shall bring you an excellent opportunity to establish a scientific collaboration with other participants. It will provides a platform to exchange information on relevant issues, have open discussions, knowledge sharing and interactive sessions with field experts.</p>
                            </div>

                        </div>
                    </div>
                </section>




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
                            <img src="../img/NSPS-UMBRELLA.png" alt="TheEvenet"> <b>About NSPS</b>
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
    <?php
} else {
    header('location: ../');
}
?>