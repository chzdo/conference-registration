<?php

use Dompdf\Dompdf;

require_once 'DOMPdf/autoload.inc.php';

class downloadPDF {

    private $html = "";
    private $location;
    private $filename;
    private $folder;
private $dir_boot = "../lib";
private $dir_pdf= "../";

private $dir_img= "../";

    function __construct() {
        if(! is_dir("../lib")){
            $this->dir_boot = "lib";
               $this->dir_pdf = "";
                      $this->dir_img = "img";
        }
    
    }

    function getAbstractRecieptPDF($value) {
        $this->filename = $value['number'];
        $this->folder = $value['folder'];
        $this->html = "                  
       <link href='$this->dir_boot/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
        
    <div >
       <h1 class='mb-4 pb-0 bg-primary text-white text-center'>  <img src='$this->dir_img/NSPS-UMBRELLA.png'  height='60' width='60'>
            Nigerian Society of Physical Sciences Conference2020</h1>
    </div>
<div class='bg-white p-3'>
          <p class='text-justify' >
              Congratulations! We have recieved your Abstract. We will Notify you if your Abstract is Accepted. <br> Below is the summary of your upload.
              
          <table class='table table-striped table-borderless'>
              <tr>
                  <td><b> Paper Number </b></td>
                  <td> " . $value['number'] . " </td>
              </tr>
               <tr>
                  <td> <b>Abstract Topic </b> </td>
                  <td>  " . $value['topic'] . " </td>
              </tr>
               <tr>
                  <td><b> Date Submitted </b> </td>
                  <td>  " . $value['date'] . " </td>
              </tr>
          </table>
          A copy of what you uploaded has been sent to your email.
          </p>
      </div>
  ";
    }

    function getRegistrationRecieptPDF($value) {
        $this->filename = $value['number'];
        $this->folder = $value['folder'];
        
      

 
$this->html .= "    <link href='submit_abstract/photo.css' rel='stylesheet' type='text/css'/>
  
        <div class='photocontainer'>
        <img src='".$value['passport']."' class='imgp' alt=''/><br>
        <div class='reg'> <center>".$value['number'] ."</center></div>
       <div class='mem'> <center>". $value['member_id'] ."</center></div>
            <div class='innerback' >
                 <div class='nam'> 
                       
                       
                      ".$value['title']."   ".$value['name']." </div>
                 
                   <div class='nps'>                     
                     <img src='submit_abstract/l.png' class='logo' />
                       Nigerian Society of Physical Science Conference </div>
                <div class='foot'> September 16-20th 2020 </div>
            </div>
    </div>";
 
    


    }

    function getPaymentRecieptPDF($value) {
        $this->filename = $value['number'];
        $this->folder = $value['folder'];
        $this->html = "                  
       <link href='../lib/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
        
    <div >
       <h1 class='mb-4 pb-0 bg-primary text-white text-center'>  <img src='../img/NSPS-UMBRELLA.png'  height='60' width='60'>
            Nigerian Society of Physical Sciences Conference2020</h1>
    </div>
<div class='bg-white p-3'>
         <h2> <p class='text-justify' >
              Payment Reciept
              </h2>
          <table class='table table-striped table-info table-bordered'>
              <tr>
                  <td><b> Registration Number </b></td>
                  <td> " . $value['number'] . " </td>
              </tr>
               <tr>
                  <td> <b>Name</b> </td>
                  <td>  " . $value['name'] . " </td>
              </tr>
               <tr>
                  <td><b> Amount paid </b> </td>
                  <td>  " . $value['amount'] . " </td>
              </tr>
                <tr>
                  <td><b> Date of Payment </b> </td>
                  <td>  " . $value['date'] . " </td>
              </tr>
               <tr>
                  <td><b> RRR       </b> </td>
                  <td>  " . $value['rrr'] . " </td>
              </tr>
          </table>
        
          </p>
      </div>
  ";
    }

        function gett($person){
  $count = count($person);
      $this->html .= "    <link href='../submit_abstract/photo.css' rel='stylesheet' type='text/css'/>";
$k=0;
do{ 
    $i = 0;
 
$this->html .= 
        " <div class='main1'>";
 
    while($i<2 && $count != 0){
   


 $this->html .= " 

    <div class='photocontainer'>
        <img src='../".$person[$k]['pass']."' class='imgp' alt=''/><br>
        <div class='reg'> <center>".$person[$k]['reg']." </center></div>
       <div class='mem'> <center>". $person[$k]['mem']."</center></div>
            <div class='innerback' >
                 <div class='nam'> 
                       
                 ".$person[$k]['name']." </div>
                 
                   <div class='nps'>                     
                      <img src='../submit_abstract/l.png' class='logo' />
                       Nigerian Society of Physical Science Conference </div>
                <div class='foot'> September 16-20th 2020 </div>
            </div>
    </div>";
 $k++;
     $i++; 
     $count--;
    
    } 

$this->html .= "</div>";

}while($k<count($person));
        
        
    }
    
    
    
    
    
    function download() {



        // setlocale(LC_NUMERIC, "C");
// instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->html);

// (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
        $dompdf->render();
//ob_end_clean();
// Output the generated PDF to Browser
        $output = $dompdf->output();
                
       $this->location = $this->dir_pdf."$this->folder/" . $this->filename . ".pdf";
        file_put_contents($this->location, $output);
    }

    public function getLocation() {
        return $this->location;
    }
function stream(){
            // setlocale(LC_NUMERIC, "C");
// instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->html);
 $this->html;
// (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
        $dompdf->render();
//ob_end_clean();
// Output the generated PDF to Browser
      $dompdf->stream('tags');
                
     
}
}

?>