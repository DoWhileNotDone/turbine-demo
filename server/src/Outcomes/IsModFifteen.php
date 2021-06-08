<?php

namespace Demo\Outcomes;

final class IsModFifteen
{
    public function __invoke(int $id): string
    {
        return ($id % 15 === 0) ? 'cdls' : '';
    }
}
