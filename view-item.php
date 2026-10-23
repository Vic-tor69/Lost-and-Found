<?php
include_once 'header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "<p>Invalid item selection. Go back to <a href='listings.php'>listings</a>.</p>";
    exit();
}

$itemId = (int) $_GET['id'];

if (isset($_POST["claim"])) {
    
    $updateQuery = "UPDATE items SET status = 'claimed' WHERE id = ?";
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->execute([$itemId]);
    
    
    header("Location: view-item.php?id=" . $itemId);
    exit();
}

$query = "SELECT items.*, users.name AS author_name, users.email AS author_email 
              FROM items 
              JOIN users ON items.user_id = users.id 
              WHERE items.id = ? 
              LIMIT 1";

$stmt = $pdo->prepare($query);
$stmt->execute([$itemId]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$item) {
    echo "<p>Item not found. It may have been removed.</p>";
    exit();
}



$statusClass = ($item['status'] == 'lost') ? 'status-lost' : 'status-found';
?>

<main class="view-item-container">
    <div class="view-card">

        <span class="status-badge <?php echo $statusClass; ?>">
            <?php echo ucfirst($item['status']); ?>
        </span>

        <h1><?php echo htmlspecialchars($item['title']); ?></h1>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($item['location']); ?></p>

        <div>
            <h3>Description</h3>
            <p><?php echo nl2br(htmlspecialchars($item['description'])); ?></p>
        </div>

        <div>
            <h3>Contact Information</h3>
            <p>This item was posted by <strong><?php echo htmlspecialchars($item['author_name']); ?></strong>.</p>

            <?php echo htmlspecialchars($item['author_email']);
            ?>
        </div>


        <?php if ($_SESSION['user_id'] == $item['user_id']): ?>

            <form action="view-item.php?id=<?php echo $itemId; ?>" method="POST">
                <button type="submit" name="claim" class="btn-1">
                    Mark as Claimed
                </button>
            </form>

        <?php endif; ?>


        <p><a href="listings.php">Back to Listings</a></p>
    </div>

</main>

</body>

</html>