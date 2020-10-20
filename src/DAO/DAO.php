<?php
    namespace App\src\DAO;

    Use PDO;
    use exception;
abstract class DAO 
{
    const DB_HOST = 'mysql:host=localhost;dbname=devblog;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';

    private $connection;

    private function checkConnection(){
        if($this->connection===null){
            return $this->getConnection();
        }else{
            return $this->connection;
    }

    }
        private function getconnection(){
         
            try{
                $this->connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
                $this->connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->connection;    
            }catch(exception $errConnect){
                die('erreur de connexion:'.$errConnect ->getMessage());
            }
        }
        protected function createQuery($sql, $params = null)
        {
               
                    $result = $this->checkConnection()->prepare($sql);
                    $result->setFetchMode(PDO::FETCH_CLASS, static::class);
                    $result->execute($params);
                    return $result;
                

        }
}
?>