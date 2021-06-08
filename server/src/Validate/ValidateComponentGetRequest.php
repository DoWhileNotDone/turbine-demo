<?php

namespace Demo\Validate;

final class ValidateComponentGetRequest implements ValidationInterface
{
    public function __construct(
        private array $params,
        private array $validation_checks,
    ) {}

    public function validate(): void
    {
        foreach ($this->validation_checks as $check) {
            call_user_func($check, $this->params);
        }
    }
}
