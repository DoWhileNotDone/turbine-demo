<?php

namespace Demo\Outcomes;

final class IsModThree
{
    public function __invoke(int $id): string
    {
        return ($id % 3 === 0) ? 'cd' : '';
    }
}
