<?php

namespace Demo;

final class PerformComponentChecks
{
    public function __construct(
        private int $component_id,
        private array $outcomes,
    ) {}

    public function run(): array
    {
        $results = [];
        foreach ($this->outcomes as $outcome_to_check) {
            $result = call_user_func($outcome_to_check, $this->component_id);
            if ($result !== '') {
                $results[] = $result;
            }
        }
        return $results;
    }
}
