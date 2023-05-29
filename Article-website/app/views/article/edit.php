<!DOCTYPE html>
<html>
<head>
    <title>Edit Article</title>
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
</head>
<body>
    <h1>Edit Article</h1>
    <form action="update.php?id=<?= $article['id']; ?>" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?= $article['title']; ?>" required><br>
        <label for="content">Content:</label>
        <textarea name="content" required><?= $article['content']; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
