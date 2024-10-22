<?php
require_once BASE_PATH . '/controller/UserController.php';
require_once BASE_PATH . '/form/registerForm.php';
session_start();

$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : null;
unset($_SESSION['error_message']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'is_admin' => isset($_POST['is_admin']) ? 1 : 0
    ];
    $controller = new UserController();
    $controller->register($user['username'], $user['password'], $user['email'], $user['is_admin']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <?php if ($error_message): ?>
        <p style="color:red;"><?= htmlspecialchars($error_message); ?></p>
    <?php endif; ?>

    <?php $form = new registerForm(); $form->render(); ?>
</body>
</html>