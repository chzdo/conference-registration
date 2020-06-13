<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
/* Exception class. */
//require 'PHPMailer\src\Exception.php';
//require 'PHPMailer\src\PHPMailer.php';
//require 'PHPMailer\src\SMTP.php';
/* The main PHPMailer class. 
require 'C:\PHPMailer\src\PHPMailer.php';

 SMTP class, needed if you want to use SMTP. 
require 'C:\PHPMailer\src\SMTP.php';
require 'composer\vendor\autoload.php'; */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dir = '../composer/vendor/autoload.php';
if(!is_dir('../composer/vendor/')){
    $dir = 'composer/vendor/autoload.php';
}
require $dir;

class email {

    private $email = null;
    private $conn = null;
    private $hash = null;
    private $pass = "";
private $message;
public $attachFiles = array();
    public function __construct($email, $conn='') {
        $this->email = $email;
        $this->conn = $conn;
    }

    private function getHash() {

        $this->hash = md5(rand(0, 1000));
    }
public function setMessage(){
    
    
}

private function template($name,$body){
   $this->message ="  <div  style='width:100%'>
    <center> <h1 > <br>
          Nigerian Society of Physical Sciences</h1></center>
    </div><hr><br><br>
    <div style='max-height:400px;  background:white; color:black; padding:10px'>
Dear $name, <br>

 $body

 <br>
 <br> <br>
 <br> <br>
 <br> <br>
 <br>
Thank You
<br><br>
NSPS 2020 Committee;
</div>
    <br><br><br>
<hr>
<center style='background: whitesmoke; padding: 10px'> NSPS Conference September 2020 </center>";
}

function getMessageForAbstractRejection($name){
    $body = "Sorry, Your Abstract has been rejected! Please try again next year";
    $this->template($name, $body);       
}

function getMessageForAbstractAcceptance($name){
    $body =  "Congratulations! We are Pleased to inform you that your Abstract has been accepted! <br> attached to the mail is your Acceptance letter.
 
Please follow this link to complete your registration  http://localhost/conf/complete_registration/";
  $this->template($name, $body);        
    
}
function getMessageForRegistrationNotification($name){
 $body = " Thank You for Completing your Registration. Attached is a PDF FIle of your Registration Reciept.";
      $this->template($name, $body); 
    
}
function getMessageForPaymentNotification($name){
$body = " Thank You for paying for the Conference. attached is a reciept of your payment.";
  $this->template($name, $body); 
    
    
}
   public function getMessageForAbstractSubmition($name) {
$body = " Congratulations! We have recieved your Abstract. We will Notify you if your Abstract is Accepted.<br>
 Attached to this mail are <br>
 1. A Reciept of Abstract Submission. <br>
 2. A copy of what you Uploaded.
"      ;             
  $this->template($name, $body);
    }


     public function getMessageForInitialRegistration($name) {
$body = " Thank you for registering. Do ensure you pay for the abstract submittion and upload your abstract
"      ;             
  $this->template($name, $body);
    }  
    
  
    
    public function addFileToMail($array){
        $this->attachFiles = $array;
    }

    private function mail($subject, $message) {
        
    try{
        $mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = 0;
//Set the hostname of the mail server
$mail->Host = 'nsps.org.ng';
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;
//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = "ssl";
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Set AuthType to use XOAUTH2
//$mail->AuthType = 'XOAUTH2';
//Fill in authentication details here
//Either the gmail account owner, or the user that gave consent
$email = 'conference2020@nsps.org.ng';
//$clientId = '1079991393861-6jjp5riu634bc28poumpd17nt58dm8pi.apps.googleusercontent.com';
//$clientSecret = '1lEpBK1ExuXunfuDhjMfVeXv';
//Obtained by configuring and running get_oauth_token.php
//after setting up an app in Google Developer Console.
//$refreshToken = '1//03qtx7rStGJojCgYIARAAGAMSNwF-L9Ir2wLLbdsZGGh61SAJW7LkdY9HWNDJ1bwhqQrNEU2c9CEyTDL9HUWXc-drGN5cgWPZNmM';
//Create a new OAuth2 provider instance
//$provider = new Google(
   // [
   //     'clientId' => $clientId,
    //    'clientSecret' => $clientSecret,
  //  ]
//);
//Pass the OAuth provider instance to PHPMailer
//$mail->setOAuth(
   // new OAuth(
      //  [
        //    'provider' => $provider,
         //   'clientId' => $clientId,
           // 'clientSecret' => $clientSecret,
         //   'refreshToken' => $refreshToken,
         //   'userName' => $email,
      //  ]
   //)
//);



            if(count($this->attachFiles)>0){
            
               foreach ($this->attachFiles as $key=>$value){
                   $mail->addAttachment("$value", "$key");
               }
            }
              $mail->Username = "conference2020@nsps.org.ng";
              $mail->Password = "BBJ020e##";
//Set who the message is to be sent from
//For gmail, this generally needs to be the same as the user you logged in as
$mail->setFrom($email, 'NSPS2020');
//Set who the message is to be sent to
$mail->addAddress($this->email);
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->CharSet = PHPMailer::CHARSET_UTF8;
$mail->msgHTML($message);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    return  array("code"=>false,"message"=> 'Mailer Error: '. $mail->ErrorInfo);
} else {
     return  array("code"=>true,"message"=> "sent");
}
    }
  catch (Exception $e) {
            /* PHPMailer exception. */
     
           return  array("code"=>false,"message"=> $e->errorMessage());
        
        } catch (\Exception $e) {
            /* PHP exception (note the backslash to select the global namespace Exception class). */
          return  array("code"=>false,"message"=> $e->errorMessage());
        
        }

      //  return true;
    }

    public function sendmail($subject) {
       
        
       return $this->mail($subject,$this->message);
      
       
          
    }  
    


}
