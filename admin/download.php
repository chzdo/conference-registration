<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include '../submit_abstract/database.php';
include '../submit_abstract/presenter.php';

$db = new connection('');

$pdf = new downloadPDF();
$a = $db->query("select email from conf where registered = 1");
$i=0;
$p = array();
while($v = mysqli_fetch_array($a)){
    $p = new presenter($v['email'],'');
    $val[$i]['pass'] = $p->getPassport();
    $val[$i]['reg'] = $p->getRegID();
    $val[$i]['mem'] = ($p->isMember()? 'MEMBER' : 'NON MEMBER');
    $val[$i]['name'] = $p->getTitle().' '.$p->getName();
    $i++;
}

$pdf->gett($val);
$pdf->stream();
