<?php

define("ROOT", realpath(__DIR__));

require ROOT . '/vendor/autoload.php';

use Demo\Controller\TurbineController;

try {
    $outcome = (new TurbineController())->handleRequest($_GET);
    http_response_code(200);
    header('Content-type: application/json');
    echo json_encode($outcome);
} catch (\InvalidArgumentException $e) {
    http_response_code(400);
} catch (\Throwable $th) {
    http_response_code(500);
}
