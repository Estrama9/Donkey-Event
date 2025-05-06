<?php

require_once __DIR__ . '/Base.php';

interface UserOperation {
    public function login($email, $password);
    public function register($firstname, $lastname, $email, $phone, $hashedPassword, $civicness, $is_admin);
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


    public function register($firstname, $lastname, $email, $phone, $hashedPassword, $civicness, $is_admin) {
        $sql = "INSERT INTO Users ( firstname, lastname, email, phone, password, civicness, is_admin) VALUES ( :firstname,:lastname, :email, :phone, :password, :civicness, :is_admin)";
        $stmt = $this->pdo->prepare($sql);
    
        try {
            return $stmt->execute([
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':email' => $email,
                ':phone' => $phone,
                ':password' => $hashedPassword,
                ':civicness' => $civicness,
                ':is_admin' => $is_admin,
                
            ]);
        } catch (PDOException $e) {
            // Tu peux logger l'erreur si besoin : error_log($e->getMessage());
            return false;
        }
    }

}


// $User=new USER;
// $data=$User->register("Mathieu", "Bourdier" , "math.9408@gmail.com", "0622929300", 1234567,  "Mr", 1);
// ?>