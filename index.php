<?php
include_once 'header.php';
?>

<h1 id="h1i">Welcome to the Lost and Found</h1>
<br>
<p>Welcome to the NUST lost and found. Found something? click "i found something" and report it as found. If u lost something browse through the reported items.
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