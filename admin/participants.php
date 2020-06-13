<?php
include 'head.php';


?> 

<br>

<br>
<div class="row" style="width:100%; padding: 30px;">
    <div id="admin-background" class=" col-sm-12 wow p-5 m-1 fadeInUp" style="width:100%; min-height: 900px">
        <br>
        <br>
        <br>
        <?php
        if (!(isset($_POST['search']))) {
            if (isset($_GET['register'])) {
                $page = "LIST OF  PARTICIPANTS";
                $a = $admin->getALLRegistered();
            } else if (isset($_GET['book'])) {
                $page = "LIST OF REGISTERED PARTICIPANTS";
                $a = $admin->getPaidRegistered();
            }
        } else {
            $page = "SEARCH RESULTS";
            $id = htmlentities($_POST['search']);

            $a = $admin->getSearchPart($id);
        }
        ?>
        <div class="section-header">
            <h2><?= $page ?> </h2>
            <form class="form-inline " method="post">
                <input type="email" placeholder="Enter Email Address" class="form-control" name="search" />
                <button type="submit"  class="btn ">
                    <span class="fas fa-binoculars">Search</span>
                </button>
            </form>
        </div>

        <table class="table table-bordered table-striped table-info table-responsive-lg"  >
            <tr>
                <td>
                    <b>Registration Number</b>
                </td>
                <td>
                    <b>Title</b>
                </td>
                <td>
                    <b>Name</b>
                </td>
                <td>
                    <b>Email</b>
                </td>
                <td>
                    <b>Phone</b>
                </td>
                <td>
                    <b>Affiliation</b>
                </td>
                <td>
                    <b>Member ID</b>
                </td>
                <td>
                    <b>Paper Number</b>
                </td>
                <td>
                    <b>View</b>
                </td>
            </tr>
<?php
$i = 0;
while ($i < count($a)) {
    ?>
                <tr>
                    <td>
                        <b><?= $a[$i]['reg_number'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['title'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['name'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['email'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['phonenumber'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['affiliation'] ?></b>
                    </td>
                    <td>
                        <b><?= $a[$i]['memberno'] ?></b>
                    </td>
                    <td>
                        <b><?php
            $p = new presenter($a[$i]['email'], "nsps");
            echo $p->getPaperID()['paper_number'];
    ?>
                        </b>
                    </td>
                    <td>
                        <b>  <a href="viewpart.php?p=<?= base64_encode($a[$i]['email'])   ?>" class="download btn bg-info text-white">View Details</a></b>
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
















<?php
?>

<?php
include 'foot.php';
?>
