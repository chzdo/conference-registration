
<?php 

if(isset($_SESSION['msg'])){
    $hide="";
    $error = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>





<section id="buy-tickets" class="section-with-bg wow m-5 fadeInUp">
    <div class="container ">

        <div class="section-header">
            <h2>Complete Your  Registration<br>
          <?=  $person->getRegID()  ?> </h2>
           

        </div>
        <div class="row m-3">
            <div class="col-lg-12">
                <div class="form-group m-5">
                    <div >
                        <h5 class="  text-uppercase text-center"(PDF)></h5>

                        <form class="p-4 m-5" method="post" id="add" action="dashboard.php" enctype="multipart/form-data">
                            <hr>
                      <input type="hidden" value="<?= $person->getEmail() ?>"  name="email" >

                            <div class="form-group m-5">
                                <div class="input-group mb-3">
                                  
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-file-pdf-o"></i></span>
                                    </div>
                                    <label class="form-control input-lg"> Select Image File for passport
                                        <input type="file" style=""  required="" name="passport" class = "" id="passp" >
                                    </label>
                                    
                                  
                                </div>
                            </div>  
                            <div class="form-group m-1">
                                <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <input type="text"  required="" name="address" class = "form-control input-lg" id="name" placeholder="Enter Your address"    >

                                </div>
                            </div> 

                           
                            <div class="form-group m-1">
                                <div class="input-group mb-3">

                                    <select name='sex' class='form-control'>
                                        <option> Sex </option>
                                         <option value='m' <?= ($person->getSex()=='m')? 'selected': '' ;?>> Male </option>
                                           <option value='f' <?= ($person->getSex()=='f')? 'selected': '' ;?>> Female </option>
                                    </select>

                                </div>
                            </div> 
                            <hr>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info shadow form-control " id="addbtn" >Complete Registration</button>
                            </div>
                            <label class="alert alert-info form-control" <?= $hide ?>> <?= @$error ?></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>





</section>