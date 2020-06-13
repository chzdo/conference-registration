
<?php
session_start();
define('WEB_URL_NSPS', 'http://localhost/nspsciences/');
define('WEB_URL_CONF', 'http://localhost/conf/');
define('ROOT_PATH', 'C:\xampp\htdocs\conf/');

include ROOT_PATH.'complete_registration/head.php';




define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'nspszfar_nsps');
$link = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

?>
<link href="../complete_registration/style.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo WEB_URL_CONF; ?>complete_registration/style.css">            
                        <section id="buy-tickets" class="section-with-bg wow fadeInUp">
                            <div class="container ">

                                <div class="section-header">
                                    <?php 
 $result = mysqli_query($link,"select * from conf where email='".$_SESSION['presenter_login']."';");
$user = mysqli_fetch_array($result);
                                        
           


include 'demoremita_constants.php';
$timesammp=DATE("dmyHis");    
$orderID = $timesammp;
$payerName = "".$user["name"]."" ;
$payerEmail = "".$user["email"]."" ;
$payerPhone = "".$user["phonenumber"]."" ;
$serviceTypeID = SERVICETYPEID;
$resultm = mysqli_query($link,"select * from members where emailid='".$_SESSION['presenter_login']."';");
$userm = mysqli_fetch_array($resultm);
if(mysqli_num_rows($userm) >0){
   echo "<script>  alert('You are Member of NSPS and you are qualify for discount') </script>";
$totalAmount = 18000;}
else{
$totalAmount = 30000;}
$responseurl = PATH."/reg_confirmation.php";
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

 $result = mysqli_query($link,"select * from conf where email='".$_SESSION['presenter_login']."';");
$userX = mysqli_fetch_array($result);
if($userX['rrr2']=='NULL'||$userX['rrr2']==''||is_null($userX['rrr2'])){

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
$query = "update conf set rrr2='$rrr', orderID2 ='$orderID' where  email ='".$_SESSION['presenter_login']."'";
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
        <h1>Your total amount to pay is: ₦ <?php echo $totalAmount?></b></h1>
      
      
        <div class="col-xs-12 col-md-9 col-lg-7">
          <form action="<?php echo "".GATEWAYRRRPAYMENTURL.""?>" method="POST">
          <input id="merchantId" name="merchantId" value="<?php echo "".MERCHANTID.""?>" type="hidden"/>
          <input id="rrr2" name="rrr2" value="<?php echo "".$rrr.""?>" type="hidden"/>
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

                
            
            }else{$rrr = "".$userX['rrr2']."";

$new_hash_string = MERCHANTID . $rrr . APIKEY;
$new_hash = hash('sha512', $new_hash_string);
$responseurl = PATH . "/reg_confirmation.php";
    ?>

<h1 style="text-align: center;"></h2>
<p><font color="blue"><h2>Payment Instructions</h2></font></p>
<p><font color="blue">We accept 3 modes of payment.</p>
<p><font color="blue">1-You can click on <b>Pay Online Now</b> and select option to pay with your MasterCard</p>
<p><font color="blue">2-You can click on <b>Pay online Now</b> and select an option to pay via your online banking</p>
<p><font color="blue">3-You can click on <b>Print and Pay in Bank</b>. In this case, you must return to your portal and click on <b>Verify Payment Made</b></p>
<p><font color="green">If you have paid already, please click on  <b>Verify Payment Made</b>. If you encounter any difficulty, do not hesitate to chat with us or send an email admin@fulafia.edu.ng along with your evidence of payment.</font></p>
        <div style="text-align:center; font-size:22px; color:red">
        <h1><b>Remita Retrieval Reference (RRR) is: <?php echo "".$userX['rrr2'].""?></b></h1>
        <h1>Your total amount to pay is: ₦ <?php echo $totalAmount?> </h1>
        </div>
       
        <div class="col-xs-12 col-md-9 col-lg-7">
        <form action="<?php echo "".GATEWAYRRRPAYMENTURL.""?>" method="POST">
        <input id="merchantId" name="merchantId" value="<?php echo "".MERCHANTID.""?>" type="hidden"/>
        <input id="rrr" name="rrr" value="<?php echo "".$userX['rrr2'].""?>" type="hidden"/>
        <input id="responseurl" name="responseurl" value="<?php echo "".$responseurl.""?>" type="hidden"/>
        <input id="hash" name="hash" value="<?php echo "".$new_hash.""?>" type="hidden"/>
        </div>
        <div class="form-group">
        <div style="padding:10px;" align="center">
        <input  type="submit" class="btn btn_add_new btn-success"  name="submit" value="Pay Online Now" style="width: 20%; text-align: center;"/>
        </div>
   

        

                  </form>





        <form action="<?php echo "reg_verify.php?rrr=".$userX['rrr2']."&&orderID=".$userX['orderID2'].""?>" method="POST">
        <input id="merchantId" name="merchantId" value="<?php echo "".MERCHANTID.""?>" type="hidden"/>
        <input id="rrr" name="rrr" value="<?php echo "".$userX['rrr2'].""?>" type="hidden"/>
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
                 
               <?php

include '../complete_registration/foot.php';
?>
