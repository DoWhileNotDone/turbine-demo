<?php

namespace Demo\Validate;

final class ValidateIdIsInteger
{
    public function __invoke(array $params): void
    {
        if (is_numeric($params['id']) === false) {
            throw new \InvalidArgumentException('id not an integer value');
        }
    }
}
