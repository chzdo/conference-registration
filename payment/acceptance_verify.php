<?php include('../../header3.php');
  if(!isset($_SESSION['regno'])){
     echo "<script type='text/javascript'>document.location.href='../logout.php';</script>";

  die();
}
?>
 
 <?php 

 $result = mysqli_query($link2,"select * from ptumestd where regno='".$_SESSION['regno']."';");
    $user = mysqli_fetch_array($result);
    $result2 = mysqli_query($link2,"select * from admission where regno='".$_SESSION['regno']."';");
    $user2 = mysqli_fetch_array($result2);
 if (isset($_SESSION['regno'])) {?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="../images/favicon.png" rel="shortcut icon" type="image/png">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $user['lname']; echo"\r\n";echo $user['fname']?> || Verify Payment</title>
<meta name="FULafia ADMISSION PORTAL" content="Federal University of Lafia. Admission and Registration Portal">
<meta name="keywords" content="Federal University of Lafia, Post UTME, UTME, PUTME, Post JAMB, Undergraduate, Postgraduate, Nigeria, Education, Science, Agriculture, Engineering, Academics, PRE-DEGREE, DIPLOMA, PART TIME" />
<meta name="B. J. Falaye" content="babatunde.falaye@fulafia.edu.ng">

<link href="main.css" rel="stylesheet" type="text/css" />
<link href="eview.css" rel="stylesheet" type="text/css" />

<script language="javascript" src="jquery.min.js"></script>

<script language="javascript">
function ProcessForm()
{

    if (document.forms['myForm'].elements['NoS'].value == "")
    {
            alert("Please Select Number of Sitting(s)");
            document.forms['myForm'].elements['NoS'].focus();
            return false;
    }
  if (document.forms['myForm'].elements['exmtype_1'].value == "")
    {
            alert("Please Select Examination Type for First Sitting");
            document.forms['myForm'].elements['exmtype_1'].focus();
            return false;
    }
  if ((document.forms['myForm'].elements['exmtype_2'].value == "")&&(document.forms['myForm'].elements['exmtype_2'].disabled==false))
    {
            alert("Please Select Examination Type for Second Sitting");
            document.forms['myForm'].elements['exmtype_2'].focus();
            return false;
    }
if (document.forms['myForm'].elements['exmdate_1'].value == "")
    {
            alert("Please Select Examination Date for First Sitting");
            document.forms['myForm'].elements['exmdate_1'].focus();
            return false;
    }
  
  if ((document.forms['myForm'].elements['exmdate_2'].value == "")&&(document.forms['myForm'].elements['exmdate_2'].disabled==false))
    {
            alert("Please Select Examination Date for Second Sitting");
            document.forms['myForm'].elements['exmdate_2'].focus();
            return false;
    }
}
</script>






</head>

<body onLoad="">
<div id="wrap">
  <div id="top2">
    ﻿<div id="top-tr">
  
  <div id="search-top">

 </div>
 
 </div>  </div>
  <div>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="resulttop">
    <tr>
      <td width="50%" height="30" align="left" valign="middle" class="resultfg">Verify Payment || <a href="myputme.php">Dashboard</a> || <a href="../logout.php" class="resultfgCopy">Logout</a></td>
      <td width="50%" align="right" valign="middle" class="resultfg">2019/2020 Admission Screening Portal &nbsp;</td>
      </tr>
  </table>
</div>
  <div id="main">
    <div id="scpanel">
  <?php
  if(isset($_GET['m']) && $_GET['m'] == 'i'){?>
  <div id="msg_boxx" style="display:<?php echo $token; ?>; color:#C00" role="alert" class="alert alert-success"><strong> Welcome <?php echo $user['lname']; echo "\r\n"; echo $user['fname'];?>, you may now edit your application data</strong></div><?php
  $token = 'block';
}?>




<?php
require 'remita_constants.php';

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
$result = mysqli_query($link2,"select * from admission where regno='".$_SESSION['regno']."';");
    $userm = mysqli_fetch_array($result);
if($userm['rrr']=="" . htmlspecialchars($_REQUEST['rrr'], ENT_QUOTES).""){
      $query = "update admission set priv='1',rrr='$rrr' where  regno = '".$_SESSION['regno']."';";
if (!@mysqli_query($link2,$query))
           ShowAlert(mysqli_error());
        else
            echo "<script>  alert('Payment is Successfully Verified')</script>";?>
    <h2>Transaction was successful. Payment has been successfully verified. Click on <b>Continue</b> button below in order to continue.</h2>
    <p><b>Remita Retrieval Reference: </b><?php echo $rrr; ?><p>
    <?php
  } 
  else{ echo "<script>  alert('This RRR belong to another candidate. If you continue this act, you are likely going to be ban from using this act. Contact admin if you have problem')</script>";} }else if($response_code == '021') {
$result = mysqli_query($link2,"select * from admission where regno='".$_SESSION['regno']."';");
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
<div style="padding:10px;" align="center"><a class="btn btn_add_new btn-success" href="dept_clearance.php">&nbsp;Continue</a></div>
</div>
</div>

</div>
</div>





<?php
}else { echo "<script type='text/javascript'>document.location.href='../logout.php';</script>";}?>
    <div style="clear:both"></div>
  </div> </div>
  <br/>
  <br/>
</div>
<?php include('../../copyright.php');?>






