<?php
session_start();

session_destroy();

echo "<h2>You have succesfully logged out";
?>"
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged out</title>
</head>

<body>
    <a href="index.php">Return to Home</a>
</body>

</html>