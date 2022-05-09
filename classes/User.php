<?php 

    class User{
        private $conn;
        public function __construct($pdo){
           $this->conn = $pdo; 
        }
        public function insertUserData($data){
            try{
                $sql = "INSERT INTO `users` (user_name,user_email,user_password,user_contact,user_address) VALUES (?,?,?,?,?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(1,$data['user_name']);
                $stmt->bindParam(2,$data['user_email']);
                $stmt->bindParam(3,$data['user_password']);
                $stmt->bindParam(4,$data['user_contact']);
                $stmt->bindParam(5,$data['user_address']);
                $result = $stmt->execute();
                return $result;
                $this->conn = null;
            }catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }

        public function checkUserLogin($data){
            try{
                $sql_one = "SELECT * FROM `users` WHERE user_email = ?";
                $stmt = $this->conn->prepare($sql_one);
                $stmt = $this->conn->prepare($sql_one);
                $stmt->bindParam(1,$data['user_email']);
                $result = $stmt->fetchAll();
                if(count($result) !== 0){
                                        
                }
            }catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }
    }

?>