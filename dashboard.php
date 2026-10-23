<?php
include_once 'header.php';
?>
<div class="listings-container">
    <?php
    try {
        // Sql query to fetch all items from the database, ordered by the most recent first
        $query = "SELECT  id, title, description, location,status FROM items WHERE (status = 'lost' OR status ='found') AND user_id={$_SESSION['user_id']} ORDER BY id DESC";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        //fetches all items as an associative array
        $items = $stmt->fetchAll();

        if (count($items) > 0) {


            foreach ($items as $item) {

                $statusClass = ($item['status'] == 'lost') ? 'status-lost' : 'status-found';

                echo '<div class="item-card" onclick="navigateTo(\'view-item.php?id=' . $item['id'] . '\')">';
                echo '   <span class="status-badge ' . $statusClass . '">' . ucfirst($item['status']) . '</span>';
                echo '   <hr>';
                echo '   <h2>' . htmlspecialchars($item['title']) . '</h2>';
                echo '   <p class="description">' . htmlspecialchars($item['description']) . '</p>';
                echo '   <p class="location">Location: ' . htmlspecialchars($item['location']) . '</p>';
                echo '</div>';
            }

        } else {

            echo '<p>No items have been reported yet.</p>';
        }

    } catch (PDOException $e) {
        echo '<p class="error">Error loading listings: ' . $e->getMessage() . '</p>';
    }

    ?>
    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
    </body>

    </html>