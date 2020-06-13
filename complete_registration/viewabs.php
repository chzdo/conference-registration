
<section id="buy-tickets" class="section-with-bg wow m-5 fadeInUp">
    <div class="container ">

        <div class="section-header">
            <h2>Pay For Conference</h2>

        </div>
        <div class="row m-5">
            <div class="col-lg-12">
                <div class="form-group m-5">
                    <?=  $person->getAbstract()  ?>
                    <iframe  name="pdf" width='100%' src="  <?=  $person->getAbstract()  ?>" style='height:100%'></iframe>
                </div>
                </div>
        </div>
    </div>
</section>