<?php
require_once BASE_PATH . '/controller/UserController.php';
require_once BASE_PATH . '/form/loginForm.php';
session_start();

$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : null;
unset($_SESSION['error_message']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = ['username' => $_POST['username'], 'password' => $_POST['password']];
    $controller = new UserController();
    $controller->login($user['username'], $user['password']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <?php if ($error_message): ?>
        <p style="color:red;"><?= htmlspecialchars($error_message); ?></p>
    <?php endif; ?>
    <?php $form = new loginForm(); $form->render(); ?>
</body>
</html>