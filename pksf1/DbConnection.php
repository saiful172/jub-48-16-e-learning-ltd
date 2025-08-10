<?php
class DbConnection{

    private $host = 'localhost';
    private $username = 'elaeltdc_web_db';
    private $password = 'Pass@2023';
    private $database = 'elaeltdc_web_db';
    
    protected $connection;
    
    public function __construct(){

        if (!isset($this->connection)) {
            
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
        return $this->connection;
    }
}
?>