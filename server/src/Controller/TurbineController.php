<?php

namespace Demo\Controller;

use Demo\Validate\ValidateParams;
use Demo\Validate\ValidateIdPresent;
use Demo\Validate\ValidateIdIsInteger;
use Demo\Extract\ComponentGetExtractValues;
use Demo\PerformComponentChecks;
use Demo\Checks\CheckCoatingDamage;
use Demo\Checks\CheckLightningStrike;

final class TurbineController
{
    /**
     *
     * @param array $params
     * @return object
     */
    public function handleRequest(array $params): object
    {
        (new ValidateParams(
            $params,
            [
                new ValidateIdPresent(),
                new ValidateIdIsInteger(),
            ],
        ))->validate();
    
        $component_id = (new ComponentGetExtractValues($params))->id();

        $outcome = (new PerformComponentChecks(
            $component_id,
            [
                new CheckCoatingDamage(),
                new CheckLightningStrike(),
            ],
        ))->run();

        return new class($component_id, $outcome) {
            public function __construct(
                public int $component_id,
                public array $outcome,
            ) {}
        };
    }
}
