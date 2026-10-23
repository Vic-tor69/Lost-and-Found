<?php
include_once 'header.php';
?>

<h1 id="h1i">Welcome to the Lost and Found</h1>
<br>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam sapiente, voluptatibus esse corporis, magnam
    perferendis qui aliquid, officiis quo consequuntur nemo! Esse, necessitatibus? Adipisci quam illo quisquam,
    maxime ratione fuga?
</p>
<div class="home-bt-ctn">
    <button class="btn-1" onclick="navigateTo('report-item.php')">I Found Something!</button>
    <button class="btn-1" onclick="navigateTo('listings.php')">I lost Something</button>
</div>

<script>
    function navigateTo(page) {
        window.location.href = page
    }
</script>
</body>

</html>