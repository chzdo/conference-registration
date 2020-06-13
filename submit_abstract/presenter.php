<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//include 'database.php';
include 'emailcomfirm.php';
include 'dompdf.php';
include 'uploadme.php';
include 'admin/PDFEdit.php';

class presenter {

    private $email;
    private $database_name;
    private $query_result = array('');
    private $file;
    private $applicationID;
    private $paper;
    private $update;
    private $Value;

    function __construct($email, $database_name) {
        $this->email = $email;
        $this->database_name = "nspszfar_nsps";
        $this->query_result = array();
        $this->getdetails();
    }

    function Register($details) {
        foreach ($details as $key => $value) {
            $array[$key] = htmlspecialchars($value);
        }
        $DB = new connection($this->database_name);

        $message = $DB->insert($array, "conf");
        $this->getdetails();
        if ($message['code'] == 1) {
            
            $mail = new email($this->email);
            $mail->getMessageForInitialRegistration($this->query_result['title'] . '  ' . $this->query_result['name']);
           $result = $mail->sendmail("NSPS2020|Registration Successful");
       
            if ($result['code']) {
                return true;
            }
        }
        return false;
    }

    function hasRegistered() {

        return (!($this->query_result == null)) ? true : false;
    }

    function generateID() {
        $DB = new connection($this->database_name);
        do {
            $application_number = 'NSPS2020' . '-' . rand() * 3;
            $DB->query("select * from abstract where paper_number ='$application_number'");
        } while ($DB->resultset_num > 0);
        return $application_number;
    }

    function sendRejectionMail() {
    $DB = new connection($this->database_name);
        $sendmail = new email($this->email);

        $sendmail->getMessageForAbstractRejection($this->query_result['title'] . ' ' . $this->query_result['name']);
        $a = $sendmail->sendmail('NSPS2020|Paper Presentation Rejection');
        if ($a['code'] == true) {
              $m = $DB->update_with_onecondition(array("accepted" => 2), "abstract", array("paper_number" => $this->getPaperID()['paper_number']));
            return $m;
        }else{

        return $a;}
    }

    function sendAcceptanceMail() {

        $DB = new connection($this->database_name);
      
        $PdfE = new PDFEdit();
   
        $location = $PdfE->getPDF(array("pdf_number" => $this->getPaperID()['paper_number'], "name" => $this->getTitle() . ' ' . $this->getName(), "date" => date('d/m/y'),"co_authors"=>$this->getAuthors(),"pdf_title"=>$this->getPDFTitle(),"affiliation"=>$this->getAffiliation()));
                
        $sendmail = new email($this->email);
        $sendmail->addFileToMail(array("Acceptance Letter" => $location));
        $sendmail->getMessageForAbstractAcceptance($this->query_result['title'] . ' ' . $this->query_result['name']);
        $a = $sendmail->sendmail('NSPS2020|Paper Presentation Acceptance');

        if ($a['code'] == true) {
            $m = $DB->update_with_onecondition(array("accepted" => 1, "letter" => $location), "abstract", array("paper_number" => $this->getPaperID()['paper_number']));
            return $m;
        } else {
            return $a;
        }
    }

    function send() {
        $DB = new connection($this->database_name);
        $sendmail = new email($this->email);
        $this->generateAbstractReciept();
        ;
        $this->paper['paper_ack'] = $this->generateAbstractReciept();
        $sendmail->addFileToMail(array("Acknowlegement Slip" => $this->paper['paper_ack'], "Abstract" => $this->paper['paper_pdf']));

        $sendmail->getMessageForAbstractSubmition($this->query_result['title'] . ' ' . $this->query_result['name']);
        $a = $sendmail->sendmail('NSPS2020|Abstract Submission Notification');
        if ($a['code'] == true) {
            $message = $DB->insert($this->paper, "abstract");
            if ($message['code'] == 1) {
                $this->update['abstract_submitted'] = 1;
                $upd = $DB->update_with_onecondition($this->update, "conf", array("email" => $this->email));
                if ($upd['code'] == 1) {
                    return $upd;
                } else {
                    return $upd;
                }
            } else {
                return $message;
            }
        } else {
            return $a;
        }
    }

    function isMember() {

        if ($this->query_result['memberno'] == null) {
            return false;
        }
        return true;
    }

    function isAccepted() {
        $DB = new connection($this->database_name);
        $DB->query("select accepted from abstract where email = '$this->email'");
        $value = $DB->mysqli_fetch();
        if ($value['accepted'] == 1) {
            return true;
        }
        return false;
    }

    function isRegistered() {
        $DB = new connection($this->database_name);
        $DB->query("select registered from conf where email = '$this->email'");
        $value = $DB->mysqli_fetch();
        if ($value['registered'] == 1) {
            return true;
        }
        return false;
    }

    function setPassport() {

        if ($this->isImage()) {
            $upload = new uploadme($this->file, 'Passport', $this->getRegID());
            $upload->uploadfile();
            $this->Value['passport'] = $upload->finalname;
            return true;
        }

        return false;
    }

    function isImage() {
        $types = array("image/jpeg", "image/png", "image/gif");
        return (in_array($this->file['type'], $types)) ? true : false;
    }

    // functions for upload abstract 

    function isPDF() {

        return ($this->file['type'] == 'application/pdf') ? true : false;
    }

    function collectUploadFiles($abstractDetails, $File) {
        $this->file = $File;
        foreach ($abstractDetails as $key => $value) {
            if (!($key == 'affiliation')) {
                $this->paper[$key] = htmlentities($value);
            } else {
                $this->update[$key] = htmlentities($value) . ' ' . $key;
            }
        }
        $this->applicationID = $this->generateID();
        $date = date("d/m/y h:m:sa");
        $this->paper['email'] = $this->email;
        $this->paper['paper_date'] = $date;
        $this->paper['paper_number'] = $this->generateID();
    }

//function for complete registration
    function complete() {
        if (str_word_count($this->getSex()) == 0) {
            return false;
        } elseif (str_word_count($this->getPassport()) == 0) {
            return false;
        }if (str_word_count($this->getAddress()) == 0) {
            return false;
        }
        return true;
    }

    function getcompleteRegistration($Value, $file) {
        $this->file = $file;
        foreach ($Value as $key => $value) {

            $this->Value[$key] = htmlentities($value);
        }
    }

    function pay() {
        $DB = new connection($this->database_name);
        do {
            $reg_number = 'NSPS2020CONF' . '-' . rand() * 3;
            $DB->query("select * from conf where reg_number ='$reg_number'");
        } while ($DB->resultset_num > 0);

        $pdf = new downloadPDF();
        $this->getdetails();
        $pdf->getPaymentRecieptPDF(array("number" => $reg_number, "folder" => 'PDFPayments', "name" => $this->getName(), "amount" => $this->getPrice(), "date" => date('d/m/y h:m:sa'), "rrr" => $this->getRegistrationPaymentRRR()));
        $pdf->download();
        $locate = $pdf->getLocation();
        $sendmail = new email($this->email);
        $sendmail->addFileToMail(array("Payment Slip" => $locate));
        $sendmail->getMessageForPaymentNotification($this->query_result['title'] . ' ' . $this->query_result['name']);
        $a = $sendmail->sendmail('NSPS2020|Payment Notification');
        if ($a['code'] == true) {
            $r = $DB->update_with_onecondition(array("reg_number" => $reg_number, "registered" => 1, "reg_rec" => $locate), "conf", array("email" => $this->email));
            if ($r['code'] == 1) {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }

    function completeRegistration() {
     
        $DB = new connection($this->database_name);
        $pdf = new downloadPDF();
       
        $pdf->getRegistrationRecieptPDF(array("title" => $this->getTitle(), "number" => $this->getRegID(), "folder" => 'PDFRegistration', "name" => $this->getName(), "email" => $this->getemail(),
            "phone" => $this->getPhone(), "sex" => $this->Value['sex'], "address" => $this->Value['address'], "affiliation" => $this->getAffiliation(), "paper_id" => $this->getPaperID()['paper_number'],
            "rrr" => $this->getAbstractPaymentRRR(),  "rr1" => $this->getRegistrationPaymentRRR(), "member_id" => ($this->isMember()? 'MEMBER' : 'NON MEMBER'), "passport" => $this->Value['passport']));
        // $pdf->getPaymentRecieptPDF(array("number" => $this->getRegID(), "folder" => 'PDFPayments', "name" => $this->getName(), "amount" => $this->getPrice(), "date" => date('d/m/y h:m:sa'), "rrr" => 123445));
  
        $pdf->download();
        $locate = $pdf->getLocation();
        $this->Value['reg_ack'] = $locate;
        $sendmail = new email($this->email);
        $sendmail->addFileToMail(array("Registration Slip" => $locate));

        $sendmail->getMessageForRegistrationNotification($this->query_result['title'] . ' ' . $this->query_result['name']);
        $a = $sendmail->sendmail('NSPS2020|Registration Complete Notification');
        if ($a['code'] == true) {
            $r = $DB->update_with_onecondition($this->Value, "conf", array("email" => $this->email));
            if ($r['code'] == 1) {
                return true;
            }
            return false;
        } else {
            return false;
        }
    }

    private function generateAbstractReciept() {
        $pdf_acknowlegment = new downloadPDF();
        $pdf_details = array("number" => $this->paper['paper_number'], "topic" => $this->paper['paper_title'], "date" => $this->paper['paper_date'], "folder" => "PDFReciepts");
        $pdf_acknowlegment->getAbstractRecieptPDF($pdf_details);
        $pdf_acknowlegment->download();
        return $pdf_acknowlegment->getLocation();
    }

    //functions to get Details
    private function getdetails() {
        $DB = new connection($this->database_name);
        $sql = "select * from conf where email = '$this->email' ";
        $q = $DB->query($sql);
        $this->query_result = $DB->mysqli_fetch($q);
    }

    function getPaperID() {
        $DB = new connection($this->database_name);
        $sql = "select paper_number from abstract where email = '$this->email' ";
        $q = $DB->query($sql);
        return $DB->mysqli_fetch($q);
    }

    function getRegID() {
        return $this->query_result['reg_number'];
    }

    function getAbstract() {
        $DB = new connection($this->database_name);
        $sql = "select paper_pdf from abstract where email = '$this->email' ";
        $q = $DB->query($sql);
        $a = $DB->mysqli_fetch($q);
        return $a['paper_pdf'];
    }
      function getAuthors() {
        $DB = new connection($this->database_name);
        $sql = "select co_author from abstract where email = '$this->email' ";
        $q = $DB->query($sql);
        $a = $DB->mysqli_fetch($q);
        return $a['co_author'];
    }

   function getPDFTitle() {
        $DB = new connection($this->database_name);
        $sql = "select paper_title from abstract where email = '$this->email' ";
        $q = $DB->query($sql);
        $a = $DB->mysqli_fetch($q);
        return $a['paper_title'];
    }
    function getSex() {

        return $this->query_result['sex'];
    }

    function getPassport() {

        return $this->query_result['passport'];
    }

    function getAddress() {

        return $this->query_result['address'];
    }

    function getName() {

        return $this->query_result['name'];
    }

    function getTitle() {

        return $this->query_result['title'];
    }

    function getPrice() {
        if ($this->isMember()) {
            return 18000;
        }
        return 30000;
    }
function getAcceptanceLetter(){
           $DB = new connection($this->database_name);
        $sql = "select letter from abstract where email = '$this->email' ";
        $q = $DB->query($sql);
        $a = $DB->mysqli_fetch($q);
        return $a['letter'];
}
    function getPhone() {
        return $this->query_result['phonenumber'];
    }

    function getEmail() {

        return $this->email;
    }

    function getAffiliation() {

        return $this->query_result['affiliation'];
    }

    function getAbstractPaymentRRR() {

        return $this->query_result['rrr'];
    }
      function getRegistrationPaymentRRR() {

        return $this->query_result['rrr2'];
    }

    function getMemberID() {

        return $this->query_result['memberno'];
    }

    function getPDFAbstract() {

        if ($this->isPDF()) {

            $upload = new uploadme($this->file, 'PDFAbstracts', $this->paper['paper_number'] . '_Abstract');

            $upload->uploadfile();

            $this->paper['paper_pdf'] = $upload->finalname;

            return true;
        }

        return false;
    }

    function getRegistrationReciept() {
        $DB = new connection($this->database_name);
        $sql = "select reg_rec from conf where email = '$this->email' ";
        $q = $DB->query($sql);
        $a = $DB->mysqli_fetch($q);
        return $a['reg_rec'];
    }

    //has or is functions

    function hasUploadedAbstract() {

        return ($this->query_result['abstract_submitted'] == 1) ? true : false;
    }

}
