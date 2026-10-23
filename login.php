<?php
include_once 'header.php';

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['studentNum'], $_POST['password'])) {
    $studentNum = $_POST['studentNum'];
    $password = $_POST['password'];

    $query = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $query->execute([$studentNum, $password]);
    $user = $query->fetch();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<p>Invalid student number or password.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="POST">
        <label>Email :</label>
        <input type="email" name="studentNum" required>
        <br>
        <label>Password :</label>
        <input type="password" name="password">
        <br>
        <button type="submit">Login</button>

    </form>
</body>
</html>
