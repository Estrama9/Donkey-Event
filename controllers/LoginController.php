<?php
session_start();
require_once __DIR__ . '/../models/User.php';

class LoginController {

    public function verifyLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $password = isset($_POST['password']) ? $_POST['password'] : null;

            if (empty($email) || empty($password)) {
                echo "<p>❌ Tous les champs sont obligatoires.</p>";
                echo "<a href='/views/login-form.php'>Retour</a>";
                exit;
            }

            $loginUser = new User;
            $user = $loginUser->login($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                header("Location: /../views/find-event.php"); // or any page after login
                exit;
            } else {
                echo "<p>❌ Email ou mot de passe incorrect.</p>";
                echo "<a href='/index.php'>Retour</a>";
                exit;
            }
        }
    }
}

    $controller = new LoginController;
    $controller->verifyLogin();

?>