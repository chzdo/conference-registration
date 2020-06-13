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
            
            </div>
                        <section id="buy-tickets" class="section-with-bg wow fadeInUp">
                            <div class="container ">

                                <div class="section-header">
  


                                       <?php {
 
       
         
          
        
          
        
                 $result = mysqli_query($link,"select * from conf where email='".$_SESSION['presenter_login']."';");
               
                    $user = mysqli_fetch_array($result);
?>


<?php
require 'demoremita_constants.php';
$orderID = "";
if( isset( $_GET['orderID'] )) {
$orderID = $_GET["orderID"];
}
$response_code ="";
$rrr = "";
$response_message = "";
//Verify Transaction
function remita_transaction_details($orderId){
        $mert =  MERCHANTID;
        $api_key =  APIKEY;
        $concatString = $orderId . $api_key . $mert;
        $hash = hash('sha512', $concatString);
        $url    = CHECKSTATUSURL . '/' . $mert  . '/' . $orderId . '/' . $hash . '/' . 'orderstatus.reg';
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
    if($orderID !=null){
        $response = remita_transaction_details($orderID);
        $response_code = $response['status'];
        if (isset($response['RRR']))
            {
            $rrr = $response['RRR'];
            }
        $response_message = $response['message'];
}
?>

    <div style="text-align: center;">
        

   <br>
                <br>
                <br>        <?php 
                
              $response_code = '01';
                if($response_code == '01' || $response_code == '00') {
                    
                    
                    $query = "update conf set rrr2='$rrr', clear2=1, orderID2 ='$orderID' where  email = '".$_SESSION['presenter_login']."';";
                    
if (!@mysqli_query($link,$query))
           ShowAlert(mysql_error());
        else
            $person =  new presenter($_SESSION['presenter_login'],"nsps");
            $person->pay();
            echo "<script>  alert('Payment is Successfull')</script>"; ?>
        <h2>Payment is Successful. Click on <b>Continue</b> below to continue with your application</h2>
        <p><b>Remita Retrieval Reference: </b><?php echo $rrr; ?><p>
        <?php }else if($response_code == '021') {?>
                         <h2><font style="text-align:left; font-size:18px; color:red">Your Payment is Pending. Check back after 1 hr. If it is still pending and you already paid the fee, please send an email which must include the remita receipt to admin@fulafia.edu.ng. Otherwise, you should proceed now to pay the invoice so that you can move to the next stage of your application.</font></h2>
                        <p><b>Remita Retrieval Reference: </b><?php echo $rrr; ?><p>
        <?php }else if($response_code == '025') { ?>
                         <h2><font style="text-align:left; font-size:18px; color:red">RRR has been successfully generated for you. Click on Continue to pay the fee.</font></h2>
                        <p><b>Remita Retrieval Reference: </b><?php echo $rrr; ?><p>                            
        <?php } else{ ?>
                         <h2><font style="text-align:left; font-size:18px; color:red">There is a problem with your payment. Send an email to secretary@nsps.org.ng with your evidence of payment in case your transaction was successful. Otherwise, click continue button below and try again with the payment.</font></h2>
                        <?php if ($rrr !=null){ ?>
                         <p>Your Remita Retrieval Reference is <span><b><?php echo $rrr; ?></b></span><br />
                        <?php } ?> 
                          <p><b> <h2><font style="text-align:left; font-size:18px; color:green">Reason: </b><?php echo $response_message; ?></font></h2><p>
         <?php }?>
    </div>
</body>
</html>
<?php
                
                
            
            
        
?>
<div style="padding:10px;" align="center"><a class="btn btn_add_new btn-success" href="../complete_registration/dashboard.php">Continue</a></div>
</div>


      
<?php
}
?>
 
                                </div>





                        </section>
                 
                               <?php

include '../complete_registration/foot.php';
?>
