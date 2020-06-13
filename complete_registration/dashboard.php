<?php

include 'head.php';


if (isset($_GET['view'])) {
    if (base64_decode($_GET['view']) == 'abstract') {
        include 'viewabs.php';
    }
} else {

    if ($person->isRegistered()) {

        if ($person->complete()) {
            include 'reg_ack.php';
        }else{
             include 'additional.php';
        }
    } else {
        include 'register.php';
    }
}
?>























<?php ?>

<?php

include 'foot.php';
?>
