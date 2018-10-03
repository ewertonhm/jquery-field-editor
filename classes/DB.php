<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author Ewerton
 */
class DB {
    private static $_instance = null;
    private $_pdo, $_query, $_error = false, $_results, $_count = 0, $_lastInsertID = '';
    
    private function __construct() {
        try{
            //$this->_pdo = new PDO('database:host;dname=','user','password');
            //$conn = new PDO("pgsql:host=$this->host port=$this->port dbname=$this->dbname", "$this->username", "$this->password");
            //echo "PDO connection object created";
            $this->_pdo = new PDO('mysql:host=127.0.0.1;dname=database','root','');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
  
    public static function get_instance(){
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }
    
    public function query($sql,$params = []){
        $this->_error = false;
        
        if($this->_query = $this->_pdo->prepare($sql)){
            $x = 1;
            var_dump($params);
            if(count($params)){
                foreach ($params as $param){
                    $this->_query->bindValue($x,$param);
                    $x++;
                }
            }
            
            if($this->_query->execute()){
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
                $this->_lastInsertID = $this->_pdo->lastInsertId();
            }else{
                $this->_error = true;
            }
        }
        return $this;
    }
    public function get_error() {
        return $this->_error;
    }

    public function get_results() {
        return $this->_results;
    }

    public function get_count() {
        return $this->_count;
    }

    public function get_lastInsertID() {
        return $this->_lastInsertID;
    }

 
}
