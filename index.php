<?php
require './vendor/autoload.php';
require 'db.php';

use Medoo\Medoo;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


// include 'db.php';
// Initialize
// $database = new Medoo([
//     'database_type' => 'sqlite',
//     'database_file' => '/home/lphnam/app/test.db'
// ]);
//
// // Enjoy
// $database->insert('account', [
//     'user_name' => 'foo',
//     'email' => 'foo@bar.com'
// ]);
//
// $account_id = $database->id();
//
// $data = $database->select('account', '*');
//
// echo json_encode($data);
// echo $account_id;
// var_dump($database);
// $data = $database->select('account', '*');
// echo json_encode($data);


$app = new \Slim\App;
$app->get('/hello', function (Request $request, Response $response) {
  $database = new Medoo([
    'database_type' => 'sqlite',
    'database_file' => '/home/lphnam/app/test.db'
  ]);
  $data = $database->select('account', '*');
  $data = json_encode($data);

  $response->getBody()->write($data);

  return $response;
});

$app->get('/hello/{id}', function (Request $request, Response $response) {
    $database = new Medoo([
      'database_type' => 'sqlite',
      'database_file' => '/home/lphnam/app/test.db'
    ]);
    $id = $request->getAttribute('id');
    $data = $database->select('account', '*', ['id'=>$id]);
    $data = json_encode($data);

    $response->getBody()->write($data);

    return $response;
});
$app->run();


/*
  GET: URL/hello
  GET: URL/hello/{id}
  POST URL/hello
*/
