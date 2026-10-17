<?php
session_start();
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/ProductController.php';
require_once __DIR__ . '/../app/controllers/CategoryController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$db = getConnection();
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if ($uri == '/' && $method == 'GET') {
    (new HomeController())->index();
} elseif ($uri == '/products' && $method == 'GET') {
    (new ProductController($db))->index();
} elseif ($uri == '/categories' && $method == 'GET') {
    (new CategoryController($db))->index();
} elseif ($uri == '/login' && $method == 'GET') {
    (new AuthController($db))->loginForm();
} elseif ($uri == '/login' && $method == 'POST') {
    (new AuthController($db))->login();
} elseif ($uri == '/logout' && $method == 'GET') {
    (new AuthController($db))->logout();
} else {
    http_response_code(404);
    echo "404 - ".htmlspecialchars($uri);
}