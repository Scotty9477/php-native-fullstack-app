<?php
require_once BASE_PATH . '/database/db.php';
require_once BASE_PATH . '/model/utilisateur.php';

class UserController {

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $is_admin = isset($_POST['is_admin']) ? 1 : 0;

            $pdo = getDbConnection();

            $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE nom = :username");
            $stmt->execute(['username' => $username]);
            if ($stmt->rowCount() > 0) {
                $_SESSION['error_message'] = "L'utilisateur existe déjà.";
                header('Location: /training/register');
                exit();
            }

            $password = password_hash($password, PASSWORD_BCRYPT);
            $role = $is_admin ? 'admin' : 'user';
            $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, password, email, role) VALUES (:nom, :password, :email, :role)");
            $stmt->execute(['nom' => $username, 'password' => $password, 'email' => $email, 'role' => $role]);
            header('Location: /training/login');
            exit();
        } else {
            require BASE_PATH . '/views/register.php';      }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $pdo = getDbConnection();
            $query = $pdo->prepare('SELECT * FROM utilisateurs WHERE nom = :nom');
            $query->execute(['nom' => $username]);
            $user = $query->fetch();

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = new User($user['id'], $user['nom'], $user['email'], $user['role']);
                header('Location: /training/');
                exit();
            } else {
                $_SESSION['error_message'] = 'Nom d\'utilisateur ou mot de passe incorrect';
                header('Location: /training/login');
                exit();
            }
        } else {
            require BASE_PATH . '/views/login.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /training/login');
        exit();
    }
}
?>