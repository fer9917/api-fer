<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

// Get products
$app->get('/api/products', function (Request $request, Response $response) {
    $sql = "SELECT 
                * 
            FROM 
                products";

    try{
        $db = new db();
        $db = $db->connect();
        $products = $db->query($sql);
        $products = $products->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($products);
    } catch(PDOException $e){
        echo '{"error": '.$e->getMessage().'}';
    }
});

// Get product
$app->get('/api/products/{id}', function (Request $request, Response $response, array $args) {
    $id = $args['id'];

    $sql = "SELECT 
                * 
            FROM 
                products
            WHERE
                id = ".$id;
    try{
        $db = new db();
        $db = $db->connect();
        $product = $db->query($sql);
        $product = $product->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($product);
    } catch(PDOException $e){
        echo '{"error": '.$e->getMessage().'}';
    }
});