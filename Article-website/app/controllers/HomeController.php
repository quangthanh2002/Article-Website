<?php
class HomeController
{
    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        // Get all articles
        $articles = $this->articleService->getAllArticles();

        // Render the home view with the articles
        $viewData = [
            'articles' => $articles
        ];
        $this->renderView('home', $viewData);
    }

    private function renderView($viewName, $data = [])
    {
        // Render the view file
        $viewFile = 'views/' . $viewName . '.php';
        if (file_exists($viewFile)) {
            extract($data);
            require $viewFile;
        }
    }
}
