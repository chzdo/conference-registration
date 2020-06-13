<?php
include 'head.php';


$DB = new connection('nsps');
$hide = "hidden";
if (!(isset($_POST['search']))) {
    
    
    if(isset($_SESSION['msg'])){
           
            $msg = $_SESSION['msg'];
    
    
            $hide = "";
            unset($_SESSION['msg']);
    }
    
 

    $page = "LIST OF ALL ABSTRACT SUBMITTED";
    if (isset($_GET['abs'])) {

        if (base64_decode($_GET['abs']) == 'recents') {
            $code = 0;
        } elseif (base64_decode($_GET['abs']) == 'awaiting') {
            $code = 0;
            $page = "LIST OF ABSTRACT AWAITING APPROVAL";
        } elseif (base64_decode($_GET['abs']) == 'accepted') {
            $code = 1;
            $page = "LIST OF ABSTRACT ACCEPTED";
        } elseif (base64_decode($_GET['abs']) == 'rejected') {
            $code = 2;
            $page = "LIST OF ABSTRACT REJECTED";
        } else {

            $a = $admin->getAllAbstract();
        }
        $a = $admin->getAbstract($code);
    } else {
        $a = $admin->getAllAbstract();
    }
} else {
    $page = "SEARCH RESULTS";
    $id = htmlentities($_POST['search']);
    $a = $admin->getSearch($id);
}
?> 

<br>

<br>
<div class="row" style="width:100%; padding: 30px;">
    <div id="admin-background" class=" col-sm-12 wow p-5 m-1 fadeInUp" style="width:100%; min-height: 900px">
        <br>
        <br>
        <br>

        <div class="section-header">
            <h2><?= $page; ?></h2>

            <form class="form-inline " method="post">
                <input type="text" placeholder="Enter Paper Number" class="form-control" name="search" />
                <button type="submit"  class="btn ">
                    <span class="fas fa-binoculars">Search</span>
                </button>
            </form>
        </div>
        <label class="form-control alert alert-info" id="msg" <?= $hide ?> ><?= @$msg ?></label>

        <table class="table table-bordered table-striped table-light table-responsive-lg" >
            <tr>
                <td>
                    <b>Paper Number</b>
                </td>
                <td>
                    <b>Paper Title</b>
                </td>
                <td>
                    <b>Email</b>
                </td>
                <td>
                    <b>Date Uploaded</b>
                </td>
                <td>
                    <b>status</b>
                </td>
                <td>
                    <b>Download File</b>
                </td>

                <td>
                    <b>Accept File</b>
                </td>

            </tr>

            <?php
            $i = 0;
            while ($i < count($a)) {
                ?>
                <tr>
                    <td>
                        <b><?= $a[$i]['paper_number'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['paper_title'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['email'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['paper_date'] ?></b>
                    </td>
                    <td>
                        <b><?php
            if ($a[$i]['accepted'] == 0) {
                echo 'Awaiting Approval';
            } else {
                echo ($a[$i]['accepted'] == 1) ? 'Accepted' : "Rejected";
            }
                ?></b>
                    </td>
                    <td>
                        <b>  <a id="down" href= "../<?= $a[$i]['paper_pdf'] ?>"     class="btn">Download</a></b>
                    </td>

                    <td>
                        <?php     if ($a[$i]['accepted'] == 0) { ?>
                        <form id ="approval">
                            <input type="hidden" id="useremail" value="<?=     $a[$i]['email']              ?>" />
                            <?php $e =  $a[$i]['email']   ;?>
                            <b>  <button onclick="apprv('<?php echo $e  ?>',0)"   class="download btn bg-info text-white">Accept</button></b><br>
                        <b>  <button  onclick="apprv('<?php echo $e  ?>',1)"   class="download btn  bg-danger text-white ">Reject</button></b>
                        </form>
                        <?php } ?>
                    </td>

                       
                </tr>
    <?php $i++;
}
?>
        </table>
<script>
    
    function apprv(a,b){
       //  Pace.restart();
 
      var posting = (b===0)? $.post("../axproc.php",{"aemail": a}) : $.post("../axproc.php",{"femail": a});
  
    }
    
    </script>
    
    </div>

</div>
</div>



















<?php ?>

<?php
include 'foot.php';
?>
