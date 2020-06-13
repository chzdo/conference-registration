<?php

include 'head.php';

?>




<div class="row" style="width:100%; padding: 30px;">
    <div id="admin-background" class=" col-sm-12 wow p-5 m-1 fadeInUp" style="width:100%; min-height: 900px">
        <br>
        <br>
        <br>
        <div class="section-header">
            <h2>DOWNLOAD CONFERENCE MATERIALS </h2>

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
            $DB = new connection('nsps');
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
                        <a href="../<?=       $a[$i]['file']             ?>" class="download btn bg-info text-white">Download</a>
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



<?php

include 'foot.php';
?>