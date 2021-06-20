<?php

require __DIR__ . '/../vendor/autoload.php';

use Demo\Validate\ValidateParams;
use Demo\Validate\ValidateIdPresent;
use Demo\Validate\ValidateIdIsInteger;
use Demo\Extract\ComponentGetExtractValues;
use Demo\PerformComponentChecks;
use Demo\Checks\CheckCoatingDamage;
use Demo\Checks\CheckLightningStrike;

try {
    (new ValidateParams(
        $_GET,
        [
            new ValidateIdPresent(),
            new ValidateIdIsInteger(),
        ],
    ))->validate();
    
    $component_id = (new ComponentGetExtractValues($_GET))->id();

    $outcome = (new PerformComponentChecks(
        $component_id,
        [
            new CheckCoatingDamage(),
            new CheckLightningStrike(),
        ],
    ))->run();

    http_response_code(200);
    header('Content-type: application/json');
     
    echo json_encode(
        new class($component_id, $outcome) {
            public function __construct(
                public int $component_id,
                public array $outcome,
            ) {}
        }
    );
} catch (\InvalidArgumentException $e) {
    http_response_code(400);
} catch (\Throwable $th) {
    //TODO: Log

    die(print_r($th->getMessage(), true));

    http_response_code(500);
}
