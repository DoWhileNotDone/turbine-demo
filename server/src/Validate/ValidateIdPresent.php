<?php

namespace Demo\Validate;

final class ValidateIdPresent
{
    public function __invoke(array $params): void
    {
        if (array_key_exists('id', $params) === false) {
            throw new \InvalidArgumentException('id not present in get request');
        }
    }
}
