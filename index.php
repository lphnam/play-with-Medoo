<?php
require './vendor/autoload.php';
require 'db.php';

use Medoo\Medoo;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;
$app->get('/hello', function (Request $request, Response $response) {
  $database = new Medoo([
    'database_type' => 'sqlite',
    'database_file' => '/home/lphnam/app/play-with-Medoo/account.db'
  ]);
  $data = $database->select('account', '*');
  $data = json_encode($data);

  $response->getBody()->write($data);

  return $response;
});

$app->get('/hello/{id}', function (Request $request, Response $response) {
    $database = new Medoo([
      'database_type' => 'sqlite',
      'database_file' => '/home/lphnam/app/play-with-Medoo/account.db'
    ]);
    $id = $request->getAttribute('id');
    $data = $database->select('account', '*', ['id'=>$id]);
    $data = json_encode($data);

    $database->insert("account", [
    	"user_name" => "foo",
    	"email" => "foo@bar.com",
    ]);

    $response->getBody()->write($data);

    return $response;
});

$app->post('/hello', function (Request $request, Response $response) {
    $data = $request->getParsedBody();

    $database = new Medoo([
      'database_type' => 'sqlite',
      'database_file' => '/home/lphnam/app/play-with-Medoo/account.db'
    ]);

    $database->insert("account", [
    	"user_name" => $data["user_name"],
    	"email" => $data["email"],
    ]);

    // $response->getBody()->write($data);
    return $response;
});

$app->run();
