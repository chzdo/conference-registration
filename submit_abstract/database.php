<?php
error_reporting(0);
if ( ! function_exists( 'array_key_last' ) ) {
    /**
     * Polyfill for array_key_last() function added in PHP 7.3.
     *
     * Get the last key of the given array without affecting
     * the internal array pointer.
     *
     * @param array $array An array
     *
     * @return mixed The last key of array if the array is not empty; NULL otherwise.
     */
    function array_key_last( $array ) {
        $key = NULL;

        if ( is_array( $array ) ) {

            end( $array );
            $key = key( $array );
        }

        return $key;
    }
}
?>




<?php
if( !function_exists('array_key_last') ) {
    function array_key_last(array $array) {
        if( !empty($array) ) return key(array_slice($array, -1, 1, true));
    }
}

// Bonus
if (!function_exists('array_key_first')) {
    function array_key_first(array $arr) {
        foreach($arr as $key => $unused) return $key;
    }
}
?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class connection {

    private $localhost = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "";
public    $resultset_num;
 public $conn = "";
    private $success_code = 1, $failure_code = 0;
    private $table_not_set = "table not set";
    private $mysqli_refused = "mysqli refused";
    private $success = "saved";
    private $details_not_set = "details not set";
    public $query_value;

    function __construct($databasename) {
        $this->db = "nspszfar_nsps";
        $this->conn = mysqli_connect($this->localhost, $this->user, $this->password, $this->db);
    }

    private function return_array($code, $message) {
        return array("code" => $code, "message" => $message);
    }

    public function mysqli_fetch(){
        return mysqli_fetch_array($this->query_value);
    }
    function insert($details, $table) {
        try{
        $fields=""; $values="";
        if (!(null === $details)) {
            if (count_chars($table) === 0) {
                return $this->return_array($this->failure_code, $this->details_not_set);
            } else {
                foreach ($details as $key => $value) {
                    $comma = (array_key_last($details) === $key) ? "" : ",";
                    $fields .= "$key" . $comma;
                    $values .= "'$value'" . $comma;
                }
                $sql = "insert into $table($fields) values ($values)";
                $code = $this->query_($sql);
                if ($code){
                    return $this->return_array($this->success_code, $this->success);
                } else {
                    return $this->return_array($this->failure_code, $this->mysqli_refused . ' :' . $sql);
                }
            }
        } else {
            return $this->return_array($this->failure_code, $this->details_not_set);
        }
        }catch(Exception $e){
             return $this->return_array($this->failure_code, $this->mysqli_refused . ' :'.$e->getMessage());
    }}
    function update_with_onecondition($details, $table,$condition) {
        $fields="";
        if (!(null === $details)) {
            if (count_chars($table) === 0) {
                return $this->return_array($this->failure_code, $this->details_not_set);
            } else {
                foreach ($details as $key => $value) {
                    $comma = (array_key_last($details) === $key) ? "" : ",";
                    $fields .= $key ."='$value'".$comma;
                   
                }
                 foreach ($condition as $key => $value) {
                
                  $conditions = "$key = '$value'";
                   
                 }
            
               $sql = "update $table set $fields where $conditions;";
                $code = $this->query_($sql);
                if ($code) {
                    return $this->return_array($this->success_code, $this->success.$sql);
                } else {
                    return $this->return_array($this->failure_code, $this->mysqli_refused . ' :' . $sql);
                }
            }
        } else {
            return $this->return_array($this->failure_code, $this->details_not_set);
        }
    }
    function query($sql) {
           $this->conn = mysqli_connect($this->localhost, $this->user, $this->password, $this->db);
        $q=  mysqli_query($this->conn, $sql);
      
        try{
        $this->resultset_num = mysqli_num_rows($q);
        
        }catch(Exception $e){
            
        }
        $this->query_value = $q;
        return $q;
    }
    
        function query_($sql) {
           $this->conn = mysqli_connect($this->localhost, $this->user, $this->password, $this->db);
        $q=  mysqli_query($this->conn, $sql);
       
        return $q;
    }

    function select_all($table) {
        if (count_chars($table) === 0) {
            return $this->return_array($this->failure_code, $this->table_not_set);
        } else {
            $sql = "select * from $table";
            $code = $this->query($sql);
            if ($code) {
                 $this->number_of_row = mysqli_num_rows($code);
                 return ($this->number_of_row===0)? $this->return_array($this->no_record,$this->no_records_found): $this->return_array($code,mysqli_fetch_all($code));
                
            } else {
                return $this->return_array($code, $this->mysqli_refused . ' :' . $sql);
            }
        }
    }
   function select_with_fields_nocondition($fields,$table) {
        if (count_chars($table) === 0 ) {
            return $this->return_array($this->failure_code, $this->table_not_set);
        } else if (count_chars($fields)===0) {
                    return $this->return_array($this->failure_code, $this->details_not_set);
        }
            foreach ($fields as $key => $value) {
                    $comma = (array_key_last($details) === $key) ? "" : ",";
                    $field .= "'$key'" . $comma;
                
                }
            $sql = "select $field from $table";
            $code = $this->query($sql);
            if ($code) {
                return $this->return_array($code, $this->success);
            } else {
                return $this->return_array($code, $this->mysqli_refused . ' :' . $sql);
            }
        }
    

    
            }