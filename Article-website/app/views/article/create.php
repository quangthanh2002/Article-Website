<!DOCTYPE html>
<html>
<head>
    <title>Create Article</title>
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
</head>
<body>
    <h1>Create Article</h1>
    <form action="store.php" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>
        <label for="content">Content:</label>
        <textarea name="content" required></textarea><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
