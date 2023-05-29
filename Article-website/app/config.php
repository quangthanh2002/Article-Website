<?php
require_once 'database.php';

$dbService = new ArticleService($db);
$articleController = new ArticleController($dbService);
