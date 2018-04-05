<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

// Get user info
$app->get('/login/{user}/{pass}', function (Request $request, Response $response, array $args) {
    $user = $args['user'];
    $pass = $args['pass'];
    $pass = hash('ripemd160', $pass);
    $resp['status'] = 1;

    $sql = "SELECT 
                * 
            FROM 
                users
            WHERE
                user = '$user'
            AND
                pass = '$pass'";
    try{
        $db = new db();
        $db = $db->connect();
        $user = $db->query($sql);
        $resp['user'] = $user->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        
        if(empty($user)){
            $resp['status'] = 2;
        }

        echo json_encode($resp);
    } catch(PDOException $e){
        echo '{"error": '.$e->getMessage().'}';
    }
});