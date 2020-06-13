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
define('DB_DATABASE', 'nspszar_nsps');
$link = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$hide="hidden";
if (isset($_SESSION['presenter'])) {
    
    
    
    
    
    if (isset($_POST['paper_title'])) {?>
 <script> document.getElementById("sub").disabled = true; </script>
<?php
        
       $_SESSION['presenter']->collectUploadFiles($_POST,$_FILES['paper_pdf']);
         if ($_SESSION['presenter']->getPDFAbstract()) {
           $send = $_SESSION['presenter']->send();
          if($send['code']){
                   $CleanForm = true;
                    unset($_SESSION['presenter']);
                    session_destroy();
           }else{
                $error = $send['message'];
            $hide = "";
           } 
          }else{
                $error = "File is not PDF";
            $hide = "";
          }
    }
     /**   $DB = new connection("nsps");
        foreach ($_POST as $key => $value) {
        if(!($key=='affiliation')){
        $paper[$key] = htmlentities($value);
        
        }else{
            $update[$key] = htmlentities($value);
        }
    }
    do {
        $application_number = 'NSPS2020' . '-' . rand() * 3;
        $DB->query("select * from abstract where paper_number ='$application_number'");
    } while ($DB->resultset_num > 0);
    
    $date = date("d/m/y h:m:sa");
    $paper['email'] = $_SESSION['email'];
    $paper['paper_date'] = $date;
     $paper['paper_number'] = $application_number;
        if ($_FILES['paper_pdf']['type'] == 'application/pdf') {
            
            $upload = new uploadme($_FILES['paper_pdf'], '../PDFAbstracts');
            $upload->uploadfile();
            $location = $upload->finalname;
            $pdf_acknowlegment = new downloadPDF();

         $paper['paper_pdf'] = $location;

            $pdf_details = array("number" => $application_number, "topic" => $paper['paper_title'], "date" => $date);
            $pdf_acknowlegment->download($pdf_details);


            $sendmail = new email($_SESSION['email']);

            $sendmail->addFileToMail(array("Acknowlegement Slip" => $pdf_acknowlegment->getLocation(), "Abstract" => $location));

            $sendmail->getMessageForAbstractSubmition();
            if ($sendmail->sendmail('NSPS2020|Abstract Submission Notification')) {
                $message = $DB->insert($paper, "abstract");
                if ($message['code'] == 1) {
                    $update['abstract_submitted'] = 1;
                      $upd =   $DB->update_with_onecondition($update, "conf", array("email"=>$_SESSION['email']));
                   if ($upd['code'] == 1) {
                      $CleanForm = true;
                    unset($_SESSION['email']);
                   session_destroy();}else{
                        echo $upd['message'];
                   }
                } else {

                    echo $message['message'];
                }
            }else{
                  $error = "Email was not sent";
            $hide = "";
            }
        }else{
            $error = "File is not PDF";
            $hide = "";
        }
    }**/
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
$userX = mysqli_fetch_array($result); 


require 'demoremita_constants.php';

if( isset( $_GET['orderID'] )) {
$orderID = $_GET["orderID"];
}
if( isset( $_GET['rrr'] )) {
$rrr = $_GET["rrr"];
}
//Verify Transaction
function remita_transaction_details($rrr){
    $mert =  MERCHANTID;
    $api_key =  APIKEY;
    $concatString = $rrr . $api_key . $mert;
    $hash = hash('sha512', $concatString);
    $url  = CHECKSTATUSURL . '/' . $mert  . '/' . $rrr . '/' . $hash . '/' . 'status.reg';
    //  Initiate curl
    $ch = curl_init();
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,$url);
    // Execute
    $result=curl_exec($ch);
    // Closing
    curl_close($ch);
    $response = json_decode($result, true);
    return $response;
  }

    $response = remita_transaction_details($rrr);
    $response_code = $response['status'];
    
      $rrr = $response['RRR'];
      
      
    $response_message = $response['message'];

?>
<html>
<head>
<title></title>
</head>
<body>
  <?php //echo '<img allign="center" style="width: 150px; height: 150px" src="../img/ful.png" height=\"15\" width=\"15\"  >';?>
  <div style="text-align: center;">
    <?php if($response_code == '01' || $response_code == '00') {
$result =mysqli_query($link,"select * from conf where email='".$_SESSION['author']."';");
    $userm = mysqli_fetch_array($result);
if($userm['rrr']=="" . htmlspecialchars($_REQUEST['rrr'], ENT_QUOTES).""){
      $query = "update conf set clear1='1',rrr='$rrr' where  email='".$_SESSION['author']."';";
if (!@mysqli_query($link,$query))
           ShowAlert(mysqli_error());
        else
            echo "<script>  alert('Payment is Successfully Verified')</script>";?>
    <h2>Transaction was successful. Payment has been successfully verified. Click on <b>Continue</b> button below in order to continue.</h2>
    <p><b>Remita Retrieval Reference: </b><?php echo $rrr; ?><p>
    <?php
  } 
  else{ echo "<script>  alert('This RRR belong to another candidate. If you continue this act, you are likely going to be ban from using this act. Contact admin if you have problem')</script>";} }else if($response_code == '021') {
$result = mysqli_query($link,"select * from conf where email='".$_SESSION['author']."';");
    $user = mysqli_fetch_array($result);
if($user['rrr']=="" . htmlspecialchars($_REQUEST['rrr'], ENT_QUOTES).""){?>
            <h2><font style="text-align:left; font-size:18px; color:red">RRR has been successfully generated for you but your payment is still <b>Pending</b>. You should proceed to pay the invoice now so that you can move on to the next stage of your application. If you think that this status is wrong, please send an email along with your evidence of payment to admin@fulafia.edu.ng.</font></h2>
            <h2><font style="text-align:left; font-size:25px; color:green"><b>Remita Retrieval Reference: </b><?php echo $rrr; ?><h2>
    <?php }else{ echo "<script>  alert('This RRR belong to another candidate. If you continue this act, you are likely going to be ban from using this act. Contact admin if you have problem')</script>";} }else if($response_code == '025') { ?>
            <h2>RRR has been successfully generated for you. Click <b>Continue</b> button to make the payment.</h2>
            <p><b>Remita Retrieval Reference: </b><?php echo $rrr; ?><p>              
    <?php } else{?>
            <h2>There is a problem with your payment. Please send an email to admin@fulafia.edu.ng with your evidence of payment in case your transaction has been successful. Otherwise, you should proceed to pay the invoice now, so that you can move to the next stage of your application.</h2>
            <?php if ($rrr !=null){ ?>
             <p>Your Remita Retrieval Reference is <span><b><?php echo $rrr; ?></b></span><br />
            <?php } ?> 
              <p><b>Reason: </b><?php echo $response_message; ?><p>
     <?php }?>
  </div>
</body>
</html>
<?php
                
         
        
?>
<div style="padding:10px;" align="center"><a class="btn btn_add_new btn-success" href="../submit_abstract/">&nbsp;Continue</a></div>

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