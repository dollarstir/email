<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

// require_once  'autoloader/loader.php';
require_once  __DIR__ . '/../../../loader/autoloader.php';
require_once __DIR__ .'/../../../vendor/autoload.php';

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;


// Get posted data
if (!empty($_POST)) {

    extract($_POST);
} else {
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $username = $request->username;
    $password = $request->password;
}

// Get data

// checkiing if the data is empty

if (empty(trim($username)) || empty(trim($password))) {
    header('Content-Type: application/json');
    echo json_encode(array('message' => 'All fields required', 'type' => 'error'));
} else {
    $authenticate = new authenticate();
    header('Content-Type: application/json');
    echo json_encode($authenticate->userlogin($username, $password));
}
