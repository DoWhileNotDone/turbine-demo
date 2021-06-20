<?php

namespace Demo\Checks;

final class CheckLightningStrike
{
    public function __invoke(int $id): string
    {
        return ($id % 5 === 0) ? 'ls' : '';
    }
}
