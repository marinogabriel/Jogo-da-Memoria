<?php
    define('HOST','localhost');
    define('DBNAME','jogomemoria');
    define('USERNAME','root');
    define('PASSWORD','');
    class Conexao
    {
        private $error='';
        public $lastInsertId;

        public function getError() {
            return $this->error;
        }
        private function Conectar()
        {
            return new PDO('mysql:host=' .HOST. ';dbname=' .DBNAME, USERNAME, PASSWORD);
        }
        public function select($cmdSql)
        {
            try{
                $result = $this->Conectar()->prepare($cmdSql);
                $result->execute();
                $countRows = $result->rowCount();
                if($countRows)
                {
                    return $result->fetchAll();
                }
                return FALSE;
            }catch(PDOException $error){
                $this->error = $error;
            }    
            
        }
        public function delete($cmdSql)
        {
            try{
                return $this->Conectar()->exec($cmdSql);
            }catch(PDOException $error){
                $this->error = $error;
            }  
        }
        
        public function update($cmdSql)
        {
            try{
                return $this->Conectar()->exec($cmdSql);
            }catch(PDOException $error){
                $this->error = $error;
            }  
        }
        public function insert($cmdSql)
        {
            try{
                $cx = $this->Conectar();
                $result = $cx->prepare($cmdSql)->execute();
                if($result)
                {
                    $last_id = $cx->prepare('SELECT LAST_INSERT_ID() as id');
                    $last_id->execute();
                    $this->lastInsertId = $last_id->fetchAll()[0]['id'];
                }
                return $result;
            }catch(PDOException $error){
                $this->error = $error;
            }  
        }
        
    }
?>

