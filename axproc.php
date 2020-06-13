<?php

include 'submit_abstract/database.php';
include 'submit_abstract/presenter.php';
$DB = new connection('nsps');
session_start();


if (isset($_POST['memberno'])) {
    $cardno = mysqli_escape_string($DB->conn, $_POST['memberno']);
    $DB->query("select members.fname,members.lname from members where memberidno = '$cardno' ");
    if ($DB->resultset_num > 0) {
        $arr = $DB->mysqli_fetch();
        // var_dump($arr);
        echo json_encode(array("code" => 1, "fname" => $arr['fname'], "lname" => $arr['lname']));
    } else {
        echo json_encode(array("code" => 0, "value" => null));
    }
}


if (isset($_POST['paper_title'])) {

    $person = new presenter($_SESSION['author'], 'nsps');

    $person->collectUploadFiles($_POST, $_FILES['paper_pdf']);
    if ($person->getPDFAbstract()) {
        $send = $person->send();
        if ($send['code']) {
            unset($_SESSION['author']);
            session_destroy();
            echo json_encode(array("code" => 1, "msg" => "uploaded"));
        } else {
            $error = $send['message'];
            echo json_encode(array("code" => 0, "msg" => $error));
        }
    } else {
        echo json_encode(array("code" => 0, "msg" => "File is not PDF"));
    }
}


if (isset($_POST['aemail'])) {

    $presenter = new presenter($_POST['aemail'], "nsps");

   echo $a = $presenter->sendAcceptanceMail();

    if ($a['code'] == 1) {

     // echo 1;
        $_SESSION['msg'] = "Acceptance mail sent";
    } else {
      //  echo 0;
       $_SESSION['msg'] = " mail not sent";
    }
}


if (isset($_POST['femail'])) {

    $presenter = new presenter($_POST['femail'], "nsps");

    $a = $presenter->sendRejectionMail();

    if ($a['code'] == 1) {

        echo 1;
        $_SESSION['msg'] = "Rejection mail sent";
    } else {
        echo 0;
        $_SESSION['msg'] = " mail not sent";
    }
}



if (isset($_POST['des'])) {
    if ($_FILES['file']['size'] >= 41943040) {
        $msg = "Did not Upload File Too Big";
    } else {
        $type = $_FILES['file']['type'];
        $size = round($_FILES['file']['size'] / (1024 * 1024), 2);
        $folder = "Conf_Material/";
        if (!(is_dir($folder))) {
            mkdir($folder);
        }

        $temp_name = explode(".", $_FILES['file']['name']);
        echo $newName = $_POST['file_name'] . (rand() * 3) . '.' . $temp_name[1];
        $location = $folder . $newName;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {

            $a = $DB->insert(array("name" => $_POST['file_name'], "description" => $_POST['des'], "type" => $type, "size" => $size, "file" => $location), "conf_materials");
            if ($a['code'] == 1) {
                $msg = "Added Successfully";
            } else {
                $msg = "could not upload";
            }
        } else {
            $msg = "cound not upload";
        }
    }
    $_SESSION['msg'] = $msg;
}



if (isset($_POST['address'])) {


    $person = new presenter($_POST['email'], "nsps");
    $person->getcompleteRegistration($_POST, $_FILES['file']);

    if ($person->setPassport()) {

        if ($person->completeRegistration()) {
            
        } else {
            $_SESSION['msg'] = "Could not Complete";
        }
    } else {
        $_SESSION['msg'] = "Please Select an Image File";
    }
}