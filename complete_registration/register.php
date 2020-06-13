



<section id="buy-tickets" class="section-with-bg wow m-5 fadeInUp">
    <div class="container ">

        <div class="section-header">
            <h2>Pay For Conference</h2>

        </div>
        <div class="row m-5">
            <div class="col-lg-12">
                <div class="form-group m-5">
                    <div >
                        <h5 class="  text-uppercase text-center"(PDF)></h5>

                        <form class="p-4 m-5" method="post" action="../payment/index_reg.php" enctype="multipart/form-data">
                            <hr>
                            <div class="form-group m-1">
                                <div class="input-group mb-3">

                                    <input type="text"  required="" name="name" class = "form-control input-lg" id="name" placeholder="Enter Email Address"  value =" <?= $person->getName() ?>" disabled="" >

                                </div>
                            </div> 

                            <div class="form-group m-1">
                                <div class="input-group mb-3">
                                    <input type="email" style="" name="email" class = "form-control input-lg" id="username" placeholder="Enter Phone Number"   value =" <?= $person->getEmail() ?>" disabled="">

                                </div>
                            </div> 
                            <div class="form-group m-1">
                                <div class="input-group mb-3">

                                    <input type="text"  required="" name="phone" class = "form-control input-lg" id="name" placeholder="Enter Email Address"  value =" <?= $person->getPhone() ?>" disabled="" >

                                </div>
                            </div> 

                            <div class="form-group m-1">
                                <div class="input-group mb-3">
                                   <input type="text"  required="" name="phone" class = "form-control input-lg" id="name" placeholder="Enter Email Address"  value ="<?= ($person->isMember())? 'Member': 'Non Member'?>" disabled="" >

                                </div>
                            </div> 
                            <div class="form-group m-1">
                                <div class="input-group mb-3">

                                    <input type="text"  required="" name="price" class = "form-control input-lg" id="name"  value =" Amount N- <?= $person->getPrice() ?>" disabled="" >

                                </div>
                            </div> 
                            
                            <div class="text-center">
                                <div style="padding:10px;" align="center"><a class="btn btn_add_new btn-success" href="../payment/index_reg.php">&nbsp;Pay</a></div>
                                
                            </div>
                            <label class="alert alert-info form-control" <?= $hide ?>> <?= @$error ?></label>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

    </div>





</section>