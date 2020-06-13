<?php
include 'head.php';

if(isset($_GET['p']) && $_GET['p'] != null){

    $person = new presenter(base64_decode($_GET['p']),"nsps");
}else{?>
<script> window.location.replace('index.php'); </script>
<?php } ?>




<br>

<br>


<div class="row" style="width:100%; padding: 30px;">
    <div id="admin-background" class=" col-sm-12 wow p-5 m-1 fadeInUp" style="width:100%; min-height: 900px">
        <br>
        <br>
        <br>

        <div class="section-header">
            <h2>PARTICIPANT SLIP</h2>

            </div>
    

        <table class="table table-bordered table-striped table-light table-responsive-lg" >
            <tr>
                <td colspan='2'>
                    <div>
                        <center class='h2 bold'>    <img src='../img/NSPS.png' style='height:50px; width:50px' class='img-thumbnail' />
                        NIGERIAN SOCIETY OF PHYSICAL SCIENCES
                        </center>
                    </div>
                </td>
            </tr>
           
            <tr>
                <td rowspan="3" >
                           <img src='../<?=     $person->getPassport()             ?>' style='height:100px; width:100px' class='img-thumbnail' />
                </td>
                <td  >
                          Title : <?= $person->getTitle() ?>
                </td>
            </tr>
            <tr>
                <td  >
                          Name : <?= $person->getName() ?>
                </td>
            </tr>
            <tr>
                <td  >
                          Email : <?= $person->getEmail() ?>
                </td>
            </tr>
            <tr>
                <td rowspan="8">
                    <b>  REGISTRATION ID:<br>
                    <?= $person->getRegID(); ?>
                    </b>
                </td>
                  <td ">
                    Phone:
                    <?= $person->getPhone(); ?>
                </td>
            </tr>
              <tr>
              
                  <td >
                    Sex:
                    <?= $person->getSex(); ?>
                </td>
            </tr>
               <tr>
              
                  <td >
                    Address:
                    <?= $person->getAddress(); ?>
                </td>
            </tr>
              <tr>
              
                  <td >
                   Affiliation:
                    <?= $person->getAffiliation(); ?>
                </td>
            </tr>
              <tr>
              
                  <td >
                   Paper ID:
                    <?= $person->getPaperID()['paper_number']; ?>
                </td>
            </tr>
               <tr>
              
                  <td >
                  Abstract Submission Payment RRR:
                    <?= $person->getAbstractPaymentRRR(); ?>
                </td>
            </tr>
              <tr>
              
                  <td >
                  Registration Payment RRR:
                    <?= $person->getRegistrationPaymentRRR; ?>
                </td>
            </tr>
               <tr>
              
                  <td >
                  Member ID:
                    <?= $person->getMemberID(); ?>
                </td>
            </tr>
        </table>
       
    </div>

</div>
</div>
<?php
include 'foot.php';
?>
