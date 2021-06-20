<?php

namespace Demo\Checks;

final class CheckCoatingDamage
{
    public function __invoke(int $id): string
    {
        return ($id % 3 === 0) ? 'cd' : '';
    }
}
