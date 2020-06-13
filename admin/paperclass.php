<?php
include '../submit_abstract/database.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class paper{
    private $paper_id;
    
    function __construct($paper_id){
        
        $this->paper_id = $paper;
        
    }
    
    function getAbstractStatus(){}
    
    function isAccepted(){
        
    }
    function getAbstractDetails(){
        $DB = new connection("nsps");
       $true = $DB->query("select * from abstract where paper_number = '$this->paper_id");
       if($true['code']==1){
       return  $DB->mysqli_fetch();}
       return $true;
    }
    
    
}

class admin{
    
private $n;
    
    function __construct(){
        
        
    }
    
    
    
    
    function getALLRegistered(){
        $result = array();
            $DB = new connection("nsps");
       $true = $DB->query("select * from conf ");
    
         $i=0;
       while($a = $DB->mysqli_fetch()){
           $result[$i] = $a;
                $i++;
       }
       return $result;
       
    }
    
    
    
     function getPaidRegistered(){
        $result= array();
            $DB = new connection("nsps");
       $true = $DB->query("select * from conf where registered = 1 ");
    
         $i=0;
       while($a = $DB->mysqli_fetch()){
           $result[$i] = $a;
                $i++;
       }
       return $result;
       
    }
         function getNumParticipants(){
            $DB = new connection("nsps");
       $DB->query("select * from conf ");
      return $DB->resultset_num;
     }
    
    
       function getNumPaidParticipants(){
            $DB = new connection("nsps");
       $DB->query("select * from conf where registered = 1");
      return $DB->resultset_num;
     }
    
    
    
    
    function getPresenterEmail($paperid){
            $result= array();
          $DB = new connection("nsps");
       $true = $DB->query("select email from abstract where paper_number = '$paperid' ");
     
           $i=0;
       while($a = $DB->mysqli_fetch()){
           $result[$i] = $a;
           $i++;
       }
       return $result;
    }
    function getALLAbstract(){
        $result = array();
          $DB = new connection("nsps");
       $true = $DB->query("select * from abstract ");
    
         $i=0;
       while($a = $DB->mysqli_fetch()){
           $result[$i] = $a;
                $i++;
       }
       return $result;
       
    
    }
    
    function getSearch($id){
         $result= array();
          $DB = new connection("nsps");
       $true = $DB->query("select * from abstract where paper_number = '$id' ");
     
           $i=0;
       while($a = $DB->mysqli_fetch()){
           $result[$i] = $a;
           $i++;
       }
       return $result;
    }
    
        
    function getSearchPart($id){
         $result= array();
          $DB = new connection("nsps");
       $true = $DB->query("select * from conf where email = '$id' ");
     
           $i=0;
       while($a = $DB->mysqli_fetch()){
           $result[$i] = $a;
           $i++;
       }
       return $result;
    }
     function getAbstract($code){
         $result= array();
          $DB = new connection("nsps");
       $true = $DB->query("select * from abstract where accepted = $code ");
     
           $i=0;
       while($a = $DB->mysqli_fetch()){
           $result[$i] = $a;
           $i++;
       }
       return $result;
     
    
    }
     function getNumAbstract($code){
            $DB = new connection("nsps");
       $DB->query("select * from abstract where accepted = $code ");
      return $DB->resultset_num;
     }
      function getNumAllAbstract(){
            $DB = new connection("nsps");
       $DB->query("select * from abstract  ");
      return $DB->resultset_num;
     }
}