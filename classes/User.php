<?php 
    class User{
        private $conn;
        public function __construct($pdo){
           $this->conn = $pdo; 
        }
        public function insertUserData($data){
            try{
                $res = $this->checkDuplicateEmail($data['user_email']);
                echo ($res);
                if($res > 0){
                    return false;
                }else{
                    $sql = "INSERT INTO `users` (user_name,user_email,user_password,user_contact,user_address) VALUES (?,?,?,?,?)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(1,$data['user_name']);
                    $stmt->bindParam(2,$data['user_email']);
                    $stmt->bindParam(3,$data['user_password']);
                    $stmt->bindParam(4,$data['user_contact']);
                    $stmt->bindParam(5,$data['user_address']);
                    $stmt->execute();
                    return true;
                }
                $this->conn = null;
            }catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }

        public function checkDuplicateEmail($email){
            try{
                $sql = "SELECT count(*) as email_count FROM `users` WHERE user_email = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(1,$email);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $count = $result['email_count'];
                return $count;
                $this->conn = null;
            }catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }

        public function checkUserLogin($data){
            try{
                $sql_one = "SELECT * FROM `users` WHERE user_email = ?";
                $stmt = $this->conn->prepare($sql_one);
                $stmt->bindParam(1,$data['user_email']);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                // if(count($result) == 0){
                //    return "Invalid Email";                     
                // }
                if($result && password_verify($data['user_password'],$result['user_password'])){
                    return $result;
                }else{
                    return '';
                }
                $this->conn = null;
            }catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }
    }

?>