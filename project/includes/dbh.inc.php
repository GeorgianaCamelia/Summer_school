<?php

 class Dbh {
    
    private $servername;
    private $username;
    private $password;
    private $dbname;

    private $charset;   //pentru PDO

    //alte clase vor putea folosi metoda aceasta
    public function connect() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "db_summerschool";

        $this->charset = "utf8mb4";

        // $conn = new mysqli($this->servername, $this->username, 
        // $this->password, $this->dbname );

        // return $conn;
        
        
        try {
            //data source name
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            echo "Connection completed!";
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: ".$e->getMessage();
        }
    
    }

 }

?>