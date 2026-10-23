<?php
include_once "header.php";

if (isset($_SESSION["user_id"])) {
    header("location: dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);

    $query = "INSERT INTO users (name,email,password,phone) VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($query);

    $stmt->execute([$name, $email, $password, $phone]);
    if ($stmt) {
        header("location: login.php");
        exit;
    } else {
        echo "Registration Failed, Please try again";
    }
}
//225084644@nust.na civ321
?>
<form action="register.php" method="post" class="register-form">
    <label>Student Email :</label>
    <input type="text" name="email" required>
    <br>
    <label>Password :</label>
    <input type="password" name="password" required>
    <br>
    <label>Name :</label>
    <input type="text" name="name" required>
    <br>
    <label>Phone Number :</label>
    <input type="text" name="phone" required>
    <br>
    <button type="submit">Register</button>
</form>
</body>

</html>