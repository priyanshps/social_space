<?php

    class database
    {
        private $db_host='localhost';
        private $db_user='root';
        private $db_pass='';
        private $db_name='social';
        protected $pdo;
        protected $stmt;
    
    public function __construct()
    {
        try
        {
            $this->pdo=new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name,$this->db_user,$this->db_pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
        
        }
    }
    public function query($query)
        {
            try
            {
                $this->stmt=$this->pdo->prepare($query);
            }
            catch(Throwable $e)
            {
                echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
            
            }
            
        }
        public function bind($param,$value,$type=null)
        {
            if(is_null($type))
            {
                switch(true)
                {
                    case is_int($value):
                        $type=PDO::PARAM_INT;
                    break;
                    case is_bool($value):
                        $type=PDO::PARAM_BOOL;
                    break;
                    case is_null($value):
                        $type=PDO::PARAM_NULL;
                    break;
                    default:
                        $type=PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value ,$type);
        }
        public function execute()
        {
            try
            {
                $this->stmt->execute();
            }
            catch(Throwable $e)
            {
                echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
            
            }
            
            
        }
        public function resultset():array
        {
            
            try
            {
                $this->execute();
                return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Throwable $e)
            {
                echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
            
            }
            
        }
        public function lastInsertId()
        {
            return $this->pdo->lastInsertId();
        }
        public function single()
        {
            try
            {
                $this->stmt->execute();
                return $this->stmt->fetch(PDO::FETCH_ASSOC);
            }
            catch(Throwable $e) 
            {
                echo "Error   ".get_class($e).' on line'.$e->getLine().' of '.$e->getFile().' : '.$e->getMessage();
            
            }
            
            
        }
    }
?>
    


