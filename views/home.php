<?php 
require_once BASE_PATH. '/model/utilisateur.php';
session_start();
if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

    <?php if (isset($user)): ?>
        <h1>Welcome <?= $user->getUsername(); ?></h1>
        <a href="logout">Logout</a> 
    <?php else: ?>
    <a href="login">Login</a>
    <a href="register">Register</a>
    <?php endif; ?>
    

    
</body>
</html>