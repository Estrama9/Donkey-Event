<?php

require_once __DIR__ . '/Base.php';

interface UserOperation {
    public function login($email, $password);
    public function register( $email, $password);
}

class User extends Base {
    public function login($email, $password) {
        $sql = "SELECT * FROM Users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password,$email['password'])) {
            return $user;
        }
        return false;
    }


    public function register( $email, $hashedPassword) {
        $sql = "INSERT INTO Users ( email, password) VALUES ( :email, :password)";
        $stmt = $this->pdo->prepare($sql);
    
        try {
            return $stmt->execute([
                ':email' => $email,
                ':password' => $hashedPassword
            ]);
        } catch (PDOException $e) {
            // Tu peux logger l'erreur si besoin : error_log($e->getMessage());
            return false;
        }
    }

}


$User=new USER;
$data=$User->register("ndoumbesall221@gmail.com",1234567);
?>