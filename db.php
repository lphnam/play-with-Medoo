<?php
require './vendor/autoload.php';

use Medoo\Medoo;

// Initialize
$database = new Medoo([
    'database_type' => 'sqlite',
    'database_file' => '/home/lphnam/app/test.db'
]);

// // Enjoy
// $database->insert('account', [
//     'user_name' => 'foo',
//     'email' => 'foo@bar.com'
// ]);
