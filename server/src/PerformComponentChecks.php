<?php

namespace Demo;

use Demo\Extract\ComponentGetExtractValues;

final class PerformComponentChecks
{
    public function __construct(
        private ComponentGetExtractValues $extractor,
        private array $outcomes,
    ) {}

    public function run(): string
    {
        $id = $this->extractor->id();
        $result = '';
        foreach ($this->outcomes as $outcome_to_check) {
            $result = call_user_func($outcome_to_check, $id);
            if ($result !== '') {
                break;
            }
        }
        return $result;
    }
}
