<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uploadme
 *
 * @author Chido
 */
class uploadme {
    //put your code here
    private $fieldname;
    private $destination;
    public $finalname;
    private $filename;
    public function __construct($input,$destination='uploads',$filename=''){
        $this-> fieldname = $input;
        $this->filename = $filename;
        
        if ((is_dir('../'.$destination))){
            $destination = '../'.$destination;
        }
   
      
        $destination .='/';
        if(!is_dir($destination)){
                        
            mkdir($destination);
        }
        $this->destination = $destination;
        
        
    }
    private function getExtension(){
        
        $a = explode('.',$this->fieldname['name']);
        $a = $a[count($a)-1];
        return $a;
        
        
        
    }
    private function getname(){
        $name = $this->filename.'.'.$this->getExtension();
		$name = $this->destination.$name;
        return $name; 
        
    }
    private function compressedImage($source){
           $info = getimagesize($source);
         if($info['mime']==='image/jpeg'){
             $newImage = imagecreatefromjpeg($source);
         }else if ($info['mime']==='image/png'){
            $newImage = imagecreatefromjpeg($source);
         }
         return $newImage;
    }
    
    public function uploadfile(){
       $this->finalname = $filename = $this->getname();
        if($this->getExtension() == 'pdf'){
        return    move_uploaded_file($this->fieldname['tmp_name'],  $this->finalname);
        }else{
  
      
             
   return  move_uploaded_file($this->fieldname['tmp_name'],  $this->finalname);
        
        
       }
    }
}

?>
