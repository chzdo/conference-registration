<?php
include 'head.php';
$hide = "hidden";
$DB = new connection('nsps');

if (isset($_GET['d'])) {
     $s = base64_decode($_GET['d']);
    $v = $DB->query("select file from conf_materials where sn ='$s'");
    if($DB->resultset_num>0){
    $vi = mysqli_fetch_array($v);
   
    $a = $DB->query("delete from conf_materials where sn='$s'");
    if ($a) {
        unlink("../" . $vi['file']);
        $_SESSION['msg'] = "File Deleted";
        ?>
<script> window.location.replace('upload.php'); </script>
<?php 
    }else{
        ?>
<script> window.location.replace('upload.php'); </script>
<?php 
    }} 
}
if (isset($_SESSION['msg'])) {
    $hide = "";
    $error = $_SESSION['msg'];
    unset($_SESSION['msg']);
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
            <h2>UPLOAD CONFERENCE MATERIALS </h2>

        </div>
        <div >
            <div class="row m-1">
                <div class="col-lg-12">
                    <div class="form-group m-1">
                        <div >


                            <form class="m-5" method="post" id="uploadConf" enctype="multipart/form-data">
                                <div class="form-group m-5">


                                    <input required="" name="file_name" class = "form-control" style="" placeholder="Title of file"  >

                                </div>
                                <div class="form-group m-5">

                                    <textarea   required="" name="des" class = "form-control" style="" placeholder="Description of file"  ></textarea>

                                </div> 

                                <div class="form-group m-5">
                                    <input type="file" style="" name="file" id="file" class = "form-control "   required=""  >


                                </div> 

                                <div class="text-center">
                                    <button type="submit" id="uplbtn" class="btn btn-primary shadow ">UPLOAD</button><div id="spin" class="loader"></div>
                                </div>
                                <label class="alert alert-info form-control" id="alert_l" <?= $hide ?>> <?= @$error ?></label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <table class="table table-bordered table-striped table-info table-responsive-lg"  >
            <tr>
                <td>
                    <b>S/N</b>
                </td>
                <td>
                    <b>name</b>
                </td>
                <td>
                    <b>Description</b>
                </td>
                <td>
                    <b>Type</b>
                </td>
                <td>
                    <b>Size</b>
                </td>
                <td>
                    <b>download</b>
                </td>

            </tr>
            <?php
            $v = $DB->query("select * from conf_materials");
            $i = 0;
            while ($vi = mysqli_fetch_array($v)) {
                $a[$i] = $vi;
                $i++;
            }
            $i = 0;
            while ($i < count($a)) {
                ?>
                <tr>
                    <td>
                        <b><?= $a[$i]['sn'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['name'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['description'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['type'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['size'] . 'mb' ?></b>
                    </td>
                    <td>
                        <a href="../<?= $a[$i]['file'] ?>" class="download btn bg-info text-white">Download</a>
                        <a href="upload.php?d=<?= base64_encode($a[$i]['sn']) ?>" class="download btn bg-danger text-white">Delete</a>
                    </td>
                </tr>
    <?php
    $i++;
}
?>
        </table>

    </div>
</div>
</div>





</section>
-->
















<?php ?>

<?php
include 'foot.php';
?>
