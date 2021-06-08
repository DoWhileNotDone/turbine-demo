<?php

namespace Demo\Outcomes;

final class IsStandard
{
    public function __invoke(int $id): string
    {
        return "{$id}";
    }
}
