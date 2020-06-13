
<link rel="stylesheet" href="../complete_registration/style.css">
<?php

include '../complete_registration/head.php';

session_start();
define('WEB_URL_NSPS', 'http://localhost/nspsciences/');
define('WEB_URL_CONF', 'http://localhost/conf/');


define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'nspszfar_nsps');
$link = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
                <br>
                <br>
                <br>
            
                        <section id="buy-tickets" class="section-with-bg wow fadeInUp">
                            <div class="container ">

                                <div class="section-header">
                                    <?php  
$result = mysqli_query($link,"select * from conf where email='".$_SESSION['presenter_login']."';");
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
$result =mysqli_query($link,"select * from conf where email='".$_SESSION['presenter_login']."';");
    $userm = mysqli_fetch_array($result);
if($userm['rrr2']=="" . htmlspecialchars($_REQUEST['rrr'], ENT_QUOTES).""){
      $query = "update conf set clear2='1',rrr2='$rrr' where  email='".$_SESSION['presenter_login']."';";
if (!@mysqli_query($link,$query))
           ShowAlert(mysqli_error());
        else
            echo "<script>  alert('Payment is Successfully Verified')</script>";?>
    <h4>Transaction was successful. Payment has been successfully verified. Click on <b>Continue</b> button below in order to continue.</h4>
    <p><b>Remita Retrieval Reference: </b><?php echo $rrr; ?><p>
    <?php
  } 
  else{ echo "<script>  alert('This RRR belong to another candidate. If you continue this act, you are likely going to be ban from using this act. Contact admin if you have problem')</script>";} }else if($response_code == '021') {
$result = mysqli_query($link,"select * from conf where email='".$_SESSION['presenter_login']."';");
    $user = mysqli_fetch_array($result);
if($user['rrr2']=="" . htmlspecialchars($_REQUEST['rrr'], ENT_QUOTES).""){?>
            <h4><font style="text-align:left; font-size:18px; color:red">RRR has been successfully generated for you but your payment is still <b>Pending</b>. You should proceed to pay the invoice now so that you can move on to the next stage of your application. If you think that this status is wrong, please send an email along with your evidence of payment to admin@fulafia.edu.ng.</font></h4>
            <h2><font style="text-align:left; font-size:25px; color:green"><b>Remita Retrieval Reference: </b><?php echo $rrr; ?><h2>
    <?php }else{ echo "<script>  alert('This RRR belong to another participant. If you continue this act, you are likely going to be ban from using this portal. Contact secretary@nsps.org.ng if you have any problem')</script>";} }else if($response_code == '025') { ?>
            <h4>RRR has been successfully generated for you. Click <b>Continue</b> button to make the payment.</h4>
            <p><b>Remita Retrieval Reference: </b><?php echo $rrr; ?><p>              
    <?php } else{?>
            <h4>There is a problem with your payment. Please send an email to admin@fulafia.edu.ng with your evidence of payment in case your transaction has been successful. Otherwise, you should proceed to pay the invoice now, so that you can move to the next stage of your application.</h4>
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
<div style="padding:10px;" align="center"><a class="btn btn_add_new btn-success" href="../complete_registration/dashboard.php">&nbsp;Continue</a></div>

                                </div>





                        </section>
               <?php

include '../complete_registration/foot.php';
?>
