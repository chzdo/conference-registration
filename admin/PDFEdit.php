<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDFEdit
 *
 * @author RVMP GLOBAL
 */
use setasign\Fpdi\Fpdi;

require_once('fpdf182/fpdf.php');

require_once('FPDI-2.2.0/src/autoload.php');



require 'admin/wordwrap.php';

class PDFEdit {

    //put your code here

    function __construct() {
        
    }

    function getPDF($details) {

        $source = 'admin/NSPS-LETTER-HEAD.pdf';

        $pdf = new FPDI('Portrait', 'mm', array(215.9, 279.4)); // Array sets the X, Y dimensions in mm

        $pdf->AddPage();
        $pagecount = $pdf->setSourceFile($source);
        $tppl = $pdf->importPage(1);
        $size = $pdf->getTemplateSize($tppl);
        $pdf->useTemplate($tppl, 0, 0, null, null);

        $pdf->SetFont('times', '', 10); // Font Name, Font Style (eg. 'B' for Bold), Font Size
        $pdf->SetTextColor(0, 0, 0); // RGB 
        $pdf->SetXY(18, 48); // X start, Y start in mm for reference
        $pdf->Write(0,  $details['pdf_number'] );
        $pdf->SetXY(160, 48); // X start, Y start in mm for date
        $pdf->Write(0,  $details['date']  );
        $pdf->SetFont('times', '', 13);
        $pdf->SetXY(80, 60);
        $pdf->Write(0, "ACCEPTANCE AND INVITATION LETTER");

        $pdf->SetFont('times', '', 10);
        $pdf->SetXY(55, 67);
        $m =  $details['name']."\n".$details['affiliation']."\n Co-Author(s) ".$details['co_authors'];
        $pdf->MultiCell(160, 5, $m, 0, 2);
     
        $mess = array(
            "one" => "We are happy to inform you that your abstract with reference ".$details['pdf_number'].", entitled ". $details['pdf_title']." , as been reviewed by  experts  and accepted for oral presentation as well as inclusion in the book of abstract for the forthcoming 41st Annual National Conference of the Nigerian Institute of Physics (NIP). Your abstract has now been published on our webpage:https://www.nipfulafiaphysics.org/accepted-abstracts
        
    For your registration to be complete, you must follow the following processes:
    
      1. Pay abstract submission due of N2,000 and registration fee of N18,000 if you are a member. 
         Non- members are to pay for only registration fee of N30,000. There are two modes of payments
         bank deposit and online payment via MasterCard. For bank deposit; pay conference registration fees
         and others into: Nigerian Institute of Physics, UBA 2108043624. Pay an- nual due to Nigerian Institute
         of Physics, UBA 1004995103. For online payment, visit https://www.nip-fulafiaphysics.org/payments.
         Upload your payment teller in step 2
          
      2. Fill an appropriate conference registration form online at 
         https://www.nip-fulafiaphysics.org/registration.html. 
          
You must complete your online registration (step 2 above) not later than 7th September, 2018.
    
Thank you for contributing to the growth of NIP. We look forward to receiving you at the Federal University Lafia, Lafia, Nigeria, October 8-12, 2018. Make sure you visit our web https://www.nip-fulafiaphysics.org for other detail information and updates.\n Accept our congratulations."
        );
 
        $image = 'admin/sign.png';
        $pdf->SetXY(55, 85);
     
        $pdf->SetFont('times', '', 10);
        $pdf->MultiCell(160, 5, $mess['one'], 0, 2);
          
        $pdf->SetXY(55, 210);
        $pdf->MultiCell(160, 5, "Yours sincerely", 0, 2);
        $pdf->Image($image, 55, 215, 20, 20);
        $pdf->SetXY(55, 237);
        $pdf->MultiCell(160, 5, "Dr Babatunde Falaye", 0, 2);

        $location = "PDFAcceptance/" . $details['pdf_number'] . "Acceptance.pdf";
        $pdf->Output($location, "F");
          
        return $location;
    }

}
