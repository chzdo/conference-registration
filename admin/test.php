<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 4</title>

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

        <!-- Main Stylesheet File -->
        <link href="../css/style.css" rel="stylesheet">
        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="wrapper">
            <!-- Sidebar  -->
            <div id="side_wrapper">
                <nav id="sidebar">
                    <div class="sidebar-header">
                        <div id="" class=" d-none d-lg-block">
                            <a href="#intro" class="scrollto"><img src="../img/NSPS-UMBRELLA.png"  height="60" width="60" alt="" title=""></a>
                        </div>
                    </div>


                    <ul class="list-unstyled components">

                        <li class="d-md-none  d-sm-block ">
                            <a href="#menu_item" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle bg-info">Menu</a>
                            <ul class=" collapse  " id="menu_item">
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
                                        <a href="#">All Abstracts<span><i class="badge-info"></i></span></a>
                        </li>
                       
                        <li>
                            <a href="#">Recent Abstracts <span><i class="badge-info"></i></span></a>
                        </li>
                        <li>
                                        <a href="#">Accepted Abstracts<span><i class="badge-info"></i></span></a>
                                        
                        </li>
                        <li>
                            <a href="#">Rejected Abstracts<span><i class="badge-info"></i></span></a>
                        </li>
                        <li>
                            <a href="#">Abstracts Awaiting Approval <span><i class=" badge badge-info">7</i></span>  </a>
                        </li>
                        <li>
                            <a href="#">Registered Participants<span><i class="badge-info"></i></span></a>
                        </li>
                         <li>
                            <a href="#">Booked Participants<span><i class="badge-info"></i></span></a>
                        </li>
                         <li>
                            <a href="#">Hotel Reservation Applications<span><i class="badge-info"></i></span></a>
                        </li>
                    </ul>

                    <ul class="list-unstyled CTAs">
                        <form class="form">
                        <li>
                          
                        </li>
                        <li>
                            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Log Out</a>
                        </li>
                        </form>
                    </ul>
                </nav>
            </div>
            <!-- Page Content  -->
            
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
                                <li><a href="#speakers">Speakers</a></li>
                                <li><a href="#schedule">Schedule</a></li>
                                <li><a href="#venue">Venue</a></li>
                                <li><a href="#hotels">Hotels</a></li>
                                <li><a href="#supporters">Sponsors</a></li>
                                <li><a href="https://nsps.org.ng/membership/index.php">Become a Member</a></li>

                                <li class="buy-tickets"><a type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal2" data-ticket-type="standard-access">Login</a></li>
                            </ul>
                         
                        </div>
                    </div>
                </nav>
            <div id="content">

             
            
                <div id="intro">

                </div>

                <section id="intro">
                    <div class="intro-container wow fadeIn">
                        <h1 class="mb-4 pb-0">The Annual<br><span>Nigerian Society of Physical Sciences</span> Conference</h1>
                        <p class="mb-4 pb-0">September 2020, Federal University of Lafia, Nasarawa State, Nigeria</p>

                        <a href="#about" class="about-btn scrollto">About The Conference</a>
                    </div>
                </section>
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


              




    </section>
    <h2>Collapsible Sidebar Using Bootstrap 4</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class="line"></div>

    <h2>Lorem Ipsum Dolor</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class="line"></div>

    <h2>Lorem Ipsum Dolor</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class="line"></div>

    <h3>Lorem Ipsum Dolor</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
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
<script src="../contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="../js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $('#side_wrapper').toggleClass('active');
        });
    });
</script>

</body>

</html>