<?php
require "db.php";

// Fetch posts with author name
$sql = "SELECT posts.*, users.name AS author_name
        FROM posts
        LEFT JOIN users ON posts.author_id = users.id
        ORDER BY created_at DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Blog</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        .post {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .post h2 { margin: 0; }
        .meta { font-size: 14px; color: #555; margin-bottom: 10px; }
    </style>
</head>
<body>

<h1>Blog Posts</h1>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="post">
        <h2><?= $row['title']; ?></h2>

        <p class="meta">
            Author: <strong><?= $row['author_name'] ?? 'Unknown'; ?></strong> |
            Posted on: <?= date('F j, Y, g:i a', strtotime($row['created_at'])); ?>
        </p>

        <p><?= $row['content']; ?></p>
    </div>
<?php } ?>

</body>
</html>
