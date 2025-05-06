<?php

require_once __DIR__ . '/../modeles/User.php';

class registerController {
    public function registerUser () {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset ($_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['civicness'], $_POST['email'], $_POST['password'])) {
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            $phone = trim($_POST['phone']);
            $civicness = trim($_POST['civicness']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $is_admin = 0;

            if (empty($firstname) || empty($lastname) || empty($phone) || empty($civicness) || empty($email) || empty($password)) {
                echo "<p>❌ Tous les champs sont obligatoires.</p>";
                echo "<a href='/../views/register-form.php'>Retour</a>";
                exit;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            $userRegister = new User;
            $userRegister->register ($firstname, $lastname, $email, $phone, $hashedPassword, $civicness, $is_admin);

            if ($userRegister) {
                echo "<p>✅ Inscription réussie !</p>";
                echo "<a href='/../views/login-form.php'>Connectez-vous ici></a>";
            }

        }
            
        
    }
}

$registerUser = new registerController;
$registerUser->registerUser();
?>