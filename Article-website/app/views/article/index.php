<!DOCTYPE html>
<html>
<head>
    <title>Articles</title>
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css">
</head>
<body>
    <h1>Articles</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
        </tr>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $article['id']; ?></td>
                <td><?= $article['title']; ?></td>
                <td><?= $article['content']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
