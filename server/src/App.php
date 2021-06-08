<?php

require __DIR__ . '/../vendor/autoload.php';

use Demo\Validate\ValidateComponentGetRequest;
use Demo\Validate\ValidateIdPresent;
use Demo\Validate\ValidateIdIsInteger;
use Demo\Extract\ComponentGetExtractValues;
use Demo\PerformComponentChecks;
use Demo\Outcomes\IsModFifteen;
use Demo\Outcomes\IsModFive;
use Demo\Outcomes\IsModThree;
use Demo\Outcomes\IsStandard;

try {
    (new ValidateComponentGetRequest(
        $_GET,
        [
            new ValidateIdPresent(),
            new ValidateIdIsInteger(),
        ],
    ))->validate();

    $extractor = new ComponentGetExtractValues($_GET);

    $outcome = (new PerformComponentChecks(
        $extractor,
        [
            new IsModFifteen(),
            new IsModFive(),
            new IsModThree(),
            new IsStandard(),
        ],
    ))->run();

    http_response_code(200);
    header('Content-type: application/json');
     
    echo json_encode(
        new class($extractor->id(), $outcome) {
            public function __construct(
                public int $component_id,
                public string $outcome,
            ) {}
        }
    );
} catch (\InvalidArgumentException $e) {
    http_response_code(400);
} catch (\Throwable $th) {
    //TODO: Log
    http_response_code(500);
}
