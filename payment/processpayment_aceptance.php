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
 if (isset($_SESSION['regno'])&&$user2['priv']!=1) {?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="../images/favicon.png" rel="shortcut icon" type="image/png">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $user['lname']; echo"\r\n";echo $user['fname']?> || Admission Status</title>
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
      <td width="50%" height="30" align="left" valign="middle" class="resultfg">Admission Status || <a href="myputme.php">Dashboard</a> || <a href="../logout.php" class="resultfgCopy">Logout</a></td>
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
include 'demoremita_constants.php';
$timesammp=DATE("dmyHis");    
$orderID = $timesammp;
$payerName = "".$user["fname"]." ".$user["lname"]."" ;
$payerEmail = "".$user["emailid"]."" ;
$payerPhone = "".$user["phonenumber"]."" ;
$serviceTypeID = ACCEPTANCE_FEE;
$totalAmount = 10000;
$responseurl = PATH."/acceptance_confirmation.php";
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

$resultX = mysqli_query($link2,"select * from admission where regno='".$_SESSION['regno']."';"); 
$userX = mysqli_fetch_array($resultX);
if($userX['rrr']=='NULL'||$userX['rrr']==''){

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
$query = "update admission set rrr='$rrr', orderID ='$orderID' where  regno ='".$_SESSION['regno']."'";
if(!@mysqli_query($link2,$query)) {
            if (mysqli_errno () == 1062) //duplicate value
               echo "<script>  alert('RRR Successfully Generated') </script>";
       else
                 showAlert(mysqli_error());
        } else 
        ?>


      <h1 style="text-align: center;">Payment Confirmation</h2>
      <p><font color="blue"><b>Instructions-</b></font></p>
<p><font color="blue">We now accept 3 modes of payment.</p>
<p><font color="blue">1-You can click on <b>Pay Online Now</b> and select an option to pay with your MasterCard</p>
<p><font color="blue">2-You can click on <b>Pay online Now</b> and select an option to pay via your online banking</p>
<p><font color="blue">3-You can click on <b>Print and Pay in Bank</b>. In this case, you must return to your portal and click on <b>Verify Payment Made</b>.</p>
        <div style="text-align:center; font-size:22px; color:red">
        <p><b>Remita Retrieval Reference (RRR) is: <?php echo "".$rrr.""?></b></p>
        <p><b>Your total amount to pay is: ₦10,000</b></p>
      
      <div class="row">
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
        </div>
                  </form>
                   <div style="padding:10px;" align="center"><button class="btn btn_add_new btn-success" onClick="window.print()">Print and Pay in Bank</button>
      </div></div>
 <?php
}
else{
echo "Error Generating RRR - ".$response;
}

                
            
            }else{$rrr = "".$user2['rrr']."";

$new_hash_string = MERCHANTID . $rrr . APIKEY;
$new_hash = hash('sha512', $new_hash_string);
$responseurl = PATH . "/acceptance_confirmation.php";
    ?>

<h1 style="text-align: center;">Payment Confirmation</h2>
<p><font color="blue"><h2>Instructions</h2></font></p>
<p><font color="blue">We now accept 3 modes of payment.</p>
<p><font color="blue">1-You can click on <b>Pay Online Now</b> and select option to pay with your MasterCard</p>
<p><font color="blue">2-You can click on <b>Pay online Now</b> and select an option to pay via your online banking</p>
<p><font color="blue">3-You can click on <b>Print and Pay in Bank</b>. In this case, you must return to your portal and click on <b>Verify Payment Made</b></p>
<p><font color="green">If you have paid already, please click on  <b>Verify Payment Made</b>. If you encounter any difficulty, do not hesitate to chat with us or send an email admin@fulafia.edu.ng along with your evidence of payment.</font></p>
        <div style="text-align:center; font-size:22px; color:red">
        <p><b>Remita Retrieval Reference (RRR) is: <?php echo "".$user2['rrr'].""?></b></p>
        <p><b>Your total amount to pay is: ₦10,000</b></p>
        </div>
        <div class="row">
        <div class="col-xs-12 col-md-9 col-lg-7">
        <form action="<?php echo "".GATEWAYRRRPAYMENTURL.""?>" method="POST">
        <input id="merchantId" name="merchantId" value="<?php echo "".MERCHANTID.""?>" type="hidden"/>
        <input id="rrr" name="rrr" value="<?php echo "".$user2['rrr'].""?>" type="hidden"/>
        <input id="responseurl" name="responseurl" value="<?php echo "".$responseurl.""?>" type="hidden"/>
        <input id="hash" name="hash" value="<?php echo "".$new_hash.""?>" type="hidden"/>
        </div>
        <div class="form-group">
        <div style="padding:10px;" align="center">
        <input  type="submit" class="btn btn_add_new btn-success"  name="submit" value="Pay Online Now" style="width: 20%; text-align: center;"/>
        </div>
        </div>

        

                  </form>




<?php $result = mysqli_query($link2,"select * from admission where regno='".$_SESSION['regno']."';");
    $user2 = mysqli_fetch_array($result);?>
        <form action="<?php echo "acceptance_verify.php?rrr=".$user2['rrr']."&&orderID=".$user2['orderID'].""?>" method="POST">
        <input id="merchantId" name="merchantId" value="<?php echo "".MERCHANTID.""?>" type="hidden"/>
        <input id="rrr" name="rrr" value="<?php echo "".$user2['rrr'].""?>" type="hidden"/>
        <input id="responseurl" name="responseurl" value="<?php echo "".$responseurl.""?>" type="hidden"/>
        <input id="hash" name="hash" value="<?php echo "".$new_hash.""?>" type="hidden"/>
        </div>
        <div class="form-group">
        <div style="padding:10px;" align="center">
        <input  type="submit" class="btn btn_add_new btn-success"  name="submit" value="Verify Payment Made" style="width: 20%; text-align: center;"/></div>
       
        </div>
        </div>

        

                  </form>
                  <div style="padding:10px;" align="center"><button class="btn btn_add_new btn-success" onClick="window.print()">Print and Pay in Bank</button>
                <?php }?>
      </div>
</div>
<?php include('../../copyright.php');?>



<?php
   }else if (isset($_SESSION['regno'])&&$user2['priv']==1) {
 echo "<script type='text/javascript'>document.location.href='dept_clearance.php';</script>";


}
else { echo "<script type='text/javascript'>document.location.href='../logout.php';</script>";}?>
    <div style="clear:both"></div>
  </div> </div>
  <br/>
  <br/>
</div>
