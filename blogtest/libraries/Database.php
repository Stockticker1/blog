<?php 
class Database{
    public $host = DB_HOST;
    public $username = DB_USER;
    public $password = DB_PASS;
    public $db_name = DB_NAME;
    
    public $link;
    public $error;
    
    /*
    * claaass constructor
    */
    
    public function __construct() {
        //call connect function
        $this->connect();
    }
    
    /*
    * connector
    */
    private function connect() {
        $this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        
        if(!$this->link) {
            $this->error = 'Connection Failed: '.$this->connect_error;
            return false;
            
            
        }
    }
    /*
    * select 
    */
    
    public function select($query) {
        $result = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        } else {
            return false;
        }
    }
    
    /*
    * insert 
    */
    
    public function insert($query) {
        $insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);
        
        //Validate insert
        if($insert_row) {
            header("Location: index.php?msg=".urlencode('Record added'));
            exit();
        }
        else {
            die('Error:('.$this->link->errno.')'.$this->link->error);
        }
    }
    
     /*
    * update 
    */
    
    public function update($query) {
        $update_row = $this->link->query($query) or die ($this->link->error.__LINE__);
        
        //Validate insert
        if($update_row) {
            header("Location: index.php?msg=".urlencode('Record updated'));
            exit();
        }
        else {
            die('Error:('.$this->link->errno.')'.$this->link->error);
        }
    }
    
    /*
    * delete 
    */
    
    public function delete($query) {
        $delete_row = $this->link->query($query) or die ($this->link->error.__LINE__);
        
        //Validate insert
        if($delete_row) {
            header("Location: index.php?msg=".urlencode('Record deleted'));
            exit();
        }
        else {
            die('Error:('.$this->link->errno.')'.$this->link->error);
        }
    }
    

}

















?>