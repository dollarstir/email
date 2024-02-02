<?php

error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

require_once  __DIR__ . '/../../../../loader/autoloader.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $data = json_decode(file_get_contents('php://input'), true);

    $lottery = new  \lottery5d\lotteryController();
    echo json_encode($lottery->getlotterygames($data['lottery_type']));
} else {

    echo json_encode(array('message' => 'Invalid request', 'type' => 'error'));
}
