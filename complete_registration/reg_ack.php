<div class="row" style="width:100%; padding: 30px;">
    <div id="admin-background" class=" col-sm-12 wow p-5 m-1 fadeInUp" style="width:100%; min-height: 900px">
        <br>
        <br>
        <br>

        <div class="section-header">
            <h2>ACKNOWLEDGEMENT SLIP</h2>

         
        </div>
    

        <link href='../submit_abstract/photo.css' rel='stylesheet' type='text/css'/>
  
        <div class='photocontainer'>
        <img src='../<?=     $person->getPassport()             ?>' class='imgp' alt=''/><br>
        <div class='reg'> <center>  <?= $person->getRegID(); ?></center></div>
       <div class='mem'> <center><?= $person->isMember()? 'MEMBER' : 'NON MEMBER'?></center></div>
            <div class='innerback' style='height: 60%;'>
                 <div class='nam'> 
                       
                       
                   <?= $person->getTitle().'  '.$person->getName() ?> </div>
                 
                   <div class='nps'>                     
                       <img src='../submit_abstract/l.png' class='logo' />
                       Nigerian Society of Physical Science Conference </div>
                <div class='foot'> September 16-20th 2020 </div>
            </div>
    </div>
    </div>

</div>
</div>