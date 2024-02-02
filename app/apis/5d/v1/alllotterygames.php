<?php

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

require_once  __DIR__ . '/../../../../loader/autoloader.php';
$lottery = new  \lottery5d\lotteryController();


echo  json_encode($lottery->alllotteriesgames());
