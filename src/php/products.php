<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

// Get products
$app->get('/api/products', function (Request $request, Response $response) {
    echo "Enter to products controller";
});