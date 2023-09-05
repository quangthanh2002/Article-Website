<?php
include '../config/DBConnection.php';
include '../models/Article.php';
class ArticleService
{
    public function getAllArticle()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = 'SELECT * FROM article';
        $stmt = $conn->query($sql);

        $articles = [];
        while ($row = $stmt->fetch()) {
            $article = new Article($row['id'], $row['title'], $row['content']);
            array_push($articles, $article);
        }
        return $articles;
    }

    public function findArticleId($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = 'SELECT * FROM article WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindvalue('id', $id);
        $stmt->execute();

        $row = $stmt->fetch();
        $article = new Article($row['id'], $row['title'], $row['content']);
        return $article;
    }

    public function addArticle($id, $title, $content)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = 'INSERT INTO article (id, title, content) VALUES(:id, :title, :content)';
        $stmt = $conn->prepare($sql);
        $stmt->bindvalue('id', $id);
        $stmt->bindvalue('title', $title);
        $stmt->bindvalue('content', $content);
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function editArticle($id, $title, $content)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = 'UPDATE article SET title = :title, content = :content WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindvalue('id', $id);
        $stmt->bindvalue('title', $title);
        $stmt->bindvalue('content', $content);
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteArticle($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = 'DELETE FROM tacgia WHERE ma_tgia = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindvalue('id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

