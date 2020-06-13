<?php
include 'submit_abstract/database.php';
include 'submit_abstract/presenter.php';
session_start();
$DB = new connection("nsps");
unset($_SESSION['presenter']);
unset($_SESSION['presenter_login']);
unset($_SESSION['user']);
unset($_SESSION['author']);
if (isset($_POST['your_email'])) {

    $email = htmlentities($_POST['your_email']);
    $phone = htmlentities($_POST['phone_number']);
    if ($email == 'NSPS@NSPS' && $phone == 'NSPS@NSPS') {
        session_start();
        $_SESSION['user'] = 'admin';
        header("location: admin/");
    } else {
        $email = htmlentities($_POST['your_email']);
        $phone = htmlentities($_POST['phone_number']);
        $DB = new connection('nsps');
        $sql = "select * from conf where email = '$email' and phonenumber = '$phone'";
        $DB->query($sql);
        if ($DB->resultset_num > 0) {
            $person = new presenter($email, "nsps");
            if ($person->isAccepted()) {
                $_SESSION['presenter_login'] = $email;
                header("location: complete_registration/dashboard.php");
            } else {
                $error = "Your abstract is yet to be accepted";
                header("location: submit_abstract/err_page.php?e=" . base64_encode($error));
            }
        } else {
            $error = "User Not Found";
            header("location: submit_abstract/err_page.php?e=" . base64_encode($error));
        }
    }
}

if (isset($_POST['email'])) {


    $email = htmlentities($_POST['email']);


    $phone = htmlentities($_POST['phonenumber']);

    $person = new presenter($email, "nsps");
    $_SESSION['presenter'] = $person;
    if ($person->hasRegistered()) {

        if ($person->hasUploadedAbstract()) {
            $error = "You have already submitted your abstract. we will notify you when accepted. Thank You";
            header("location: submit_abstract/err_page.php?e=" . base64_encode($error));
        } else {
            $_SESSION['author'] = $email;
            header("location: payment/");
        }
    } else {
        $message = $person->Register($_POST);
        if ($message) {
            $_SESSION['author'] = $email;
            header("location: payment/");
        } else {
            $error = "Could not register try again";
           header("location: submit_abstract/err_page.php?e=" . base64_encode($error)); 
                  }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Conference - Nigerian Society of Physical Sciences</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->
        <link href="img/NSPS.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/venobox/venobox.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <script src="pace-master/pace-master/pace.js" type="text/javascript"></script>
        <!-- Main Stylesheet File -->
        <link href="pace-master/pace-master/themes/pink/pace-theme-corner-indicator.css" rel="stylesheet" type="text/css"/>

        <link href="css/style.css" rel="stylesheet"> 
        <style>

            input.form-control, select.form-control, a.form-control, label.form-control {
                height:70px !important;
            }
            button.form-control {
                height:70px !important;
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
                    <a href="#intro" class="scrollto"><img src="img/NSPS-UMBRELLA.png"  height="60" width="60" alt="" title=""></a>
                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="#intro">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#speakers">Speakers</a></li>
                        <li><a href="#schedule">Schedule</a></li>
                        <li><a href="#venue">Venue</a></li>
                        <li><a href="#hotels">Hotels</a></li>
                        <li><a href="#supporters">Sponsors</a></li>
                        <li><a href="https://nsps.org.ng/membership/index.php">Become a Member</a></li>
                        <li class="buy-tickets"><a type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Submit Abstract</a></li>
                        <li class="buy-tickets"><a type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal2" data-ticket-type="standard-access">Login</a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </header><!-- #header -->

        <!--==========================
          Intro Section
        ============================-->
        <section id="intro">
            <div class="intro-container wow fadeIn">
                <h1 class="mb-4 pb-0">The Annual<br><span>Nigerian Society of Physical Sciences</span> Conference</h1>
                <p class="mb-4 pb-0">September 2020, Federal University of Lafia, Nasarawa State, Nigeria</p>

                <a href="#about" class="about-btn scrollto">About The Conference</a>
            </div>
        </section>

        <main id="main">

            <!--==========================
              About Section
            ============================-->
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



            <!--==========================
              Schedule Section
            ============================-->
            <section id="schedule" class="section-with-bg">
                <div class="container wow fadeInUp">
                    <div class="section-header">
                        <h2>Event Schedule</h2>
                        <p>Here is our event schedule</p>
                    </div>

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#day-1" role="tab" data-toggle="tab">Day 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#day-2" role="tab" data-toggle="tab">Day 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#day-3" role="tab" data-toggle="tab">Day 3</a>
                        </li>
                    </ul>

                    <h3 class="sub-heading">To be communicated later</h3>

                    <div class="tab-content row justify-content-center">

                        <!-- Schdule Day 1 -->
                        <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">



                        </div>
                        <!-- End Schdule Day 1 -->

                        <!-- Schdule Day 2 -->
                        <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">



                        </div>
                        <!-- End Schdule Day 2 -->

                        <!-- Schdule Day 3 -->
                        <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-3">



                        </div>
                        <!-- End Schdule Day 2 -->

                    </div>

                </div>

            </section>

            <!--==========================
              Venue Section
            ============================-->
            <section id="venue" class="wow fadeInUp">

                <div class="container-fluid">

                    <div class="section-header">
                        <h2>Event Venue</h2>
                    </div>

                    <div class="row no-gutters">
                        <div class="col-lg-6 venue-map">
                            <iframe src="https://maps.google.com/maps?q=federal%20university%20lafia&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>

                        <div class="col-lg-6 venue-info">
                            <div class="row justify-content-center">
                                <div class="col-11 col-lg-8">
                                    <h3>Federal University of Lafia</h3>
                                    <p>Faculty of Science, Permenent Site, Along Makurdi Road, Maraba Akunza, Lafia, Nasarawa State, Nigeria</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                </div>
                </div>




            </section>

            <!--==========================
              Hotels Section
            ============================-->
            <section id="hotels" class="section-with-bg wow fadeInUp">

                <div class="container">
                    <div class="section-header">
                        <h2>Hotels</h2>
                        <p>Here are some nearby hotels</p>
                    </div>

                    <div class="row">

                        <div class="col-lg-4 col-md-6">
                            <div class="hotel">
                                <div class="hotel-img">
                                    <img src="img/hotels/1.jpg" alt="Hotel 1" class="img-fluid">
                                </div>
                                <h3><a href="#">Hotel 1</a></h3>
                                <div class="stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>0.4 Mile from the Venue</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="hotel">
                                <div class="hotel-img">
                                    <img src="img/hotels/2.jpg" alt="Hotel 2" class="img-fluid">
                                </div>
                                <h3><a href="#">Hotel 2</a></h3>
                                <div class="stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-full"></i>
                                </div>
                                <p>0.5 Mile from the Venue</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="hotel">
                                <div class="hotel-img">
                                    <img src="img/hotels/3.jpg" alt="Hotel 3" class="img-fluid">
                                </div>
                                <h3><a href="#">Hotel 3</a></h3>
                                <div class="stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>0.6 Mile from the Venue</p>
                            </div>
                        </div>

                    </div>
                </div>

            </section>



            <!--==========================
              F.A.Q Section
            ============================-->
            <section id="faq" class="wow fadeInUp">

                <div class="container">

                    <div class="section-header">
                        <h2>F.A.Q </h2>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <ul id="faq-list">

                                <li>
                                    <a data-toggle="collapse" class="collapsed" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="fa fa-minus-circle"></i></a>
                                    <div id="faq1" class="collapse" data-parent="#faq-list">
                                        <p>
                                            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="fa fa-minus-circle"></i></a>
                                    <div id="faq2" class="collapse" data-parent="#faq-list">
                                        <p>
                                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="fa fa-minus-circle"></i></a>
                                    <div id="faq3" class="collapse" data-parent="#faq-list">
                                        <p>
                                            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="fa fa-minus-circle"></i></a>
                                    <div id="faq4" class="collapse" data-parent="#faq-list">
                                        <p>
                                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="fa fa-minus-circle"></i></a>
                                    <div id="faq5" class="collapse" data-parent="#faq-list">
                                        <p>
                                            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="fa fa-minus-circle"></i></a>
                                    <div id="faq6" class="collapse" data-parent="#faq-list">
                                        <p>
                                            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>

            </section>

            <!--==========================
              Subscribe Section
            ============================-->
            <section id="subscribe">
                <div class="container wow fadeInUp">
                    <div class="section-header">
                        <h2>Newsletter</h2>
                        <p>Rerum numquam illum recusandae quia mollitia consequatur.</p>
                    </div>

                    <form method="POST" action="#">
                        <div class="form-row justify-content-center">
                            <div class="col-auto">
                                <input type="text" class="form-control" placeholder="Enter your Email">
                            </div>
                            <div class="col-auto">
                                <button type="submit">Subscribe</button>
                            </div>
                        </div>
                    </form>

                </div>
            </section>

            <!--==========================
              Buy Ticket Section
            ============================-->
            <section id="buy-tickets" class="section-with-bg wow fadeInUp">
                <div class="container">

                    <div class="section-header">
                        <h2>Registration</h2>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-5 mb-lg-0">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted text-uppercase text-center">Early Bird</h5>
                                        <h6 class="card-price text-center">Member : N18,000</h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Branded Flash Drive with Book of Abstract</li>
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Branded Conference Jotter & Pen </li>
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge / Name Tag</li>
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Certificate of Attendance / Presentation</li>
                                            <li ><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break & Meal</li>
                                            <li ><span class="fa-li"><i class="fa fa-check"></i></span>Branded Conference Bag</li>

                                        </ul>
                                        <hr>
                                        <div class="text-center">
                                            <button type="button" class="btn">Deadline: March 31</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card mb-5 mb-lg-0">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted text-uppercase text-center">Regular</h5>
                                        <h6 class="card-price text-center">Member: N25,000</h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Branded Flash Drive with Book of Abstract</li>
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Branded Conference Jotter & Pen </li>
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge / Name Tag</li>
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Certificate of Attendance / Presentation</li>
                                            <li ><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break & Meal</li>
                                            <li ><span class="fa-li"><i class="fa fa-check"></i></span>Branded Conference Bag</li>
                                        </ul>
                                        <hr>
                                        <div class="text-center">
                                            <button type="button" class="btn">Deadline: July 31</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pro Tier -->
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted text-uppercase text-center">On-Spot</h5>
                                        <h6 class="card-price text-center">Member: N30,000</h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li class="text-muted"><span class="fa-li"><i class="fa fa-check"></i></span>Branded Flash Drive with Book of Abstract</li>
                                            <li class="text-muted"><span class="fa-li"><i class="fa fa-check"></i></span>Branded Conference Jotter & Pen </li>
                                            <li class="text-muted"><span class="fa-li"><i class="fa fa-check"></i></span>Badge / Name Tag</li>
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Certificate of Attendance / Presentation</li>
                                            <li ><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break & Meal</li>
                                            <li ><span class="fa-li"><i class="fa fa-check"></i></span> Conference Bag with Sticker</li>
                                        </ul>
                                        </ul>
                                        <hr>
                                        <div class="text-center">
                                            <div class="text-center">
                                                <button type="button" class="btn" >Deadline: September 16</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>     
                        </div></div>




                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-body">
                                    <h5 class="card-title text-muted text-uppercase text-center">Early Bird</h5>
                                    <h6 class="card-price text-center">Non-Member : N30,000</h6>
                                    <hr>
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Branded Flash Drive with Book of Abstract</li>
                                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Branded Conference Jotter & Pen </li>
                                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge / Name Tag</li>
                                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Certificate of Attendance / Presentation</li>
                                        <li ><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break & Meal</li>
                                        <li ><span class="fa-li"><i class="fa fa-check"></i></span>Branded Conference Bag</li>

                                    </ul>
                                    <hr>
                                    <div class="text-center">
                                        <button type="button" class="btn">Deadline: March 31</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-body">
                                    <h5 class="card-title text-muted text-uppercase text-center">Regular</h5>
                                    <h3 class="card-price text-center">Non-Member : N35,000</h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Branded Flash Drive with Book of Abstract</li>
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Branded Conference Jotter & Pen </li>
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge / Name Tag</li>
                                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Certificate of Attendance / Presentation</li>
                                            <li ><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break & Meal</li>
                                            <li ><span class="fa-li"><i class="fa fa-check"></i></span>Branded Conference Bag</li>
                                        </ul>
                                        <hr>
                                        <div class="text-center">
                                            <button type="button" class="btn">Deadline: July 31</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pro Tier -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-muted text-uppercase text-center">On-Spot</h5>
                                    <h6 class="card-price text-center">Non-Member : N40,000</h6>
                                    <hr>
                                    <ul class="fa-ul">
                                        <li class="text-muted"><span class="fa-li"><i class="fa fa-check"></i></span>Branded Flash Drive with Book of Abstract</li>
                                        <li class="text-muted"><span class="fa-li"><i class="fa fa-check"></i></span>Branded Conference Jotter & Pen </li>
                                        <li class="text-muted"><span class="fa-li"><i class="fa fa-check"></i></span>Badge / Name Tag</li>
                                        <li><span class="fa-li"><i class="fa fa-check"></i></span>Certificate of Attendance / Presentation</li>
                                        <li ><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break & Meal</li>
                                        <li ><span class="fa-li"><i class="fa fa-check"></i></span> Conference Bag with Sticker</li>
                                    </ul>
                                    </ul>
                                    <hr>
                                    <div class="text-center">
                                        <div class="text-center">
                                            <button type="button" class="btn">Deadline: September 16</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>     
                    </div>



            </section>





            <!-- Modal Order Form -->
            <div id="buy-ticket-modal" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">NSPS Conference Registration</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="index.php">
                                <div class="form-group">
                                    <select required="" class="form-control" name="title" >
                                        <option></option>
                                        <?php
                                        $q = $DB->query("select title from titles");
                                        while ($v = mysqli_fetch_array($q)) {
                                            ?>
                                            <option value="<?= $v['title'] ?>"><?= $v['title'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name"  required="" placeholder="Your  Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" required="" placeholder="Your Email Address">
                                </div>

                                <div class="form-group">
                                    <input type="number" maxlength="11" class="form-control" name="phonenumber" required="" placeholder="Your Phone Number">
                                </div>

                                <div class="form-group">If you are a member of NSPS, enter your Membership Number, otherwise leave the space empty
                                    <div class='form-group' >
                                        <div class="input-group mb-3  ">

                                            <input type="text" class="form-control" id='memberno' name="memberno" placeholder="Your Membership Number"> 
                                            <div class="input-group-prepend">

                                                <div  id="load" class=''></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-primary" id="idalert"></div>
                                </div>


                                    <div class="text-center">
                                        <input value="Register" id="register" type="submit" class="btn form-control btn-outline-success">
                                    </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

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
                            <form method="POST" action="index.php">

                                <div class="form-group">
                                    <input type="text" class="form-control" name="your_email" placeholder="Your Email Address">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone_number" placeholder="Your Phone Number">
                                </div>                
                                <div class="text-center">
                                    <input type="submit" class="btn form-control btn-outline-primary" value="login">
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
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/venobox/venobox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>
    <style>

    </style>
    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
    <script src="js/myscripts.js">
<link href="css/mycss.css" rel="stylesheet" type="text/css"/>



    </script>
</body>

</html>
