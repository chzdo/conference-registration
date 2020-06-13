
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <script src="../pace-master/pace-master/pace.js" type="text/javascript"></script>

  <link href="../pace-master/pace-master/templates/pace-theme-minimal.tmpl.css" rel="stylesheet" type="text/css"/>

  <title>Conference - Nigerian Society of Physical Sciences</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
<?php 
include 'database.php';
include 'presenter.php';



$person = new presenter("chido.nduaguibe@gmail.com", "nsps");
$person->hasRegistered();


?>
  
</head>
<body >
    "<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <section id="intro">
    <div class="intro-container wow fadeIn">
       
      <h1 class="mb-4 pb-0 bg-primary text-white text-center">  <a href="#intro" class="scrollto"><img src="img/NSPS-UMBRELLA.png"  height="60" width="60" alt="" title=""></a>
          The Annual  Nigerian Society of Physical Sciences</span> Conference</h1>
      <p class="mb-4 pb-0 text-center text-black-50 h3">September 2020, Federal University of Lafia, Nasarawa State, Nigeria</p>
     
      <div class="bg-white m-5">
          <p class="text-justify" >
              Congratulations! We have recieved your Abstract. We will Notify you if your Abstract is Accepted. Below is the summary of your upload.
              
          <table class="table table-striped table-borderless">
              <tr>
                  <td> Abstract Number </td>
                  <td> ................ </td>
              </tr>
               <tr>
                  <td> Abstract TOPIC   </td>
                  <td> ................ </td>
              </tr>
               <tr>
                  <td> Date Submitted </td>
                  <td> ................ </td>
              </tr>
          </table>
          A copy of what you uploaded has been sent to your email.
          </p>
      </div>
    </div>
  </section>
  "
</body>
</html>