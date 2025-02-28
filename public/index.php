<?php
require_once __DIR__ . '/../src/controllers/ArtworkController.php';

// Simple router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$controller = new ArtworkController();

switch ($uri) {
    case '/':
        $controller->index();
        break;
        
    case '/ajouter':
        $controller->create();
        break;
        
    default:
        if (preg_match('/^\/artwork\/(\d+)$/', $uri, $matches)) {
            $controller->show($matches[1]);
        } else {
            header('HTTP/1.1 404 Not Found');
            echo '404 - Page non trouvée';
        }
} 