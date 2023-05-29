<?php
include '../services/ArticleServices.php';
class ArticleController
{
    public function index()
    {
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticle();
        include '../views/article/show.php';
    }

    public function addArticleController()
    {
        $articleService = new ArticleService();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['txtId'];
            $title = $_POST['txttitle'];
            $content = $_POST['txtContent'];
            if (!empty($id) && !empty($title) && !empty($content)) {
                $result = $articleService->addArticle($id, $title, $content);
                if ($result) {
                    header('location:index.php');
                } else {
                    echo 'error';
                }
            }
        }
        include '../views/article/add.php';
    }

    public function editArticleController()
    {
        $articleService = new ArticleService();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $article = $articleService->findArticleId($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['txtAutId'];
            $title = $_POST['txtAutName'];
            $content = $_POST['txtAutAvt'];
            if (!empty($title) && !empty($content)) {
                $result = $articleService->editArticle($id, $title, $content);
                if ($result) {
                    header('location:index.php');
                } else {
                    echo 'error';
                }
            }
        }
        include '../views/article/edit.php';
    }

    public function deleteArticleController()
    {
        $articleService = new ArticleService();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $article = $articleService->findArticleId($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $articleService->deleteArticle($_GET['id']);
            if ($result) {
                header('location:index.php');
            } else {
                echo 'error';
            }
        }
        include '../views/article/delete.php';
    }
}
