<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

require_once  __DIR__ . '/../../../loader/autoloader.php';

require_once __DIR__.'/../../../vendor/autoload.php';


$userController = new userController();

// Handle GET request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Get JSON data from the request
    $data = json_decode(file_get_contents('php://input'), true);

    // Get the Authorization header token
    $token = trim(str_replace('Bearer', '', apache_request_headers()['Authorization'] ?? ''));

    // Decode the JWT token
    $result = jwtauth::decodeToken($token, key, algorithm);

    if ($result && !jwtauth::isTokenexpired($result)) {
        $uid = $result->uid;
        $userBalance = $userController->userBalance($uid);
        echo json_encode($userBalance);
    } else {
        echo json_encode(['message' => 'Invalid token', 'type' => 'error']);
    }
} else {
    echo json_encode(['message' => 'Invalid request', 'type' => 'error']);
}
