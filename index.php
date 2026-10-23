<?php
include_once 'header.php';
?>

<h1>Welcome to the Lost and Found</h1>
<br>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam sapiente, voluptatibus esse corporis, magnam
    perferendis qui aliquid, officiis quo consequuntur nemo! Esse, necessitatibus? Adipisci quam illo quisquam,
    maxime ratione fuga?</p>
<input type="button" value="I lost something" onclick="navigateTo('report-item.php')">
<input type="button" value="I found something" onclick="navigateTo('listings.php')">

<script>
    function navigateTo(page) {
        window.location.href = page
    }
</script>
</body>

</html>