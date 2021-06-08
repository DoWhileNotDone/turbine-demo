<?php

namespace Demo\Outcomes;

final class IsModFive
{
    public function __invoke(int $id): string
    {
        return ($id % 5 === 0) ? 'ls' : '';
    }
}
