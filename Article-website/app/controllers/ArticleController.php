<?php
class ArticleController
{
    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        
        $articles = $this->articleService->getAllArticles();

        $viewData = [
            'articles' => $articles
        ];
        $this->renderView('article/index', $viewData);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            
            $this->articleService->createArticle($title, $content);

            
            header('Location: /articles');
            exit();
        }

        
        $this->renderView('article/create');
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $this->articleService->updateArticle($id, $title, $content);

        
            header('Location: /articles');
            exit();
        }

       
        $article = $this->articleService->getArticleById($id);

        if ($article) {
            
            $viewData = [
                'article' => $article
            ];
            $this->renderView('article/edit', $viewData);
        } else {
            
            echo 'Article not found';
        }
    }

    public function delete($id)
    {
       
        $this->articleService->deleteArticle($id);

        header('Location: /articles');
        exit();
    }

    private function renderView($viewName, $data = [])
    {
        
        $viewFile = 'views/' . $viewName . '.php';
        if (file_exists($viewFile)) {
            extract($data);
            require $viewFile;
        }
    }
}
