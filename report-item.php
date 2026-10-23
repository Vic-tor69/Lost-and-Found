<?php
include_once "header.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST["title"], $_POST["description"], $_POST["location"], $_POST["status"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $location = $_POST["location"];
    $status = $_POST["status"];


    $query = "INSERT INTO items (title, description, location, status,user_id) VALUES (?,?,?,?,?)";
    $stmt = $pdo->prepare("$query");
    $stmt = $stmt->execute([$title, $description, $location, $status, $_SESSION['user_id']]);


    if ($stmt) {
        echo "<p>Item reported successfully!</p>";
    } else {
        echo "<p>Error reporting item. Please try again.</p>";
    }
}
?>
<form action="report-item.php" method="post" class="register-form">
    <label>Title :</label>
    <input type="text" name="title" required>
    <br>
    <label>Description :</label>
    <textarea name="description" required></textarea>
    <br>
    <label>Location :</label>
    <input type="text" name="location" required>
    <br>
    <label>Status :</label>
    <input type="text" name="status" placeholder="lost or found" required>
    <br>
    <input type="submit" value="Report Item">
</form>

</html>