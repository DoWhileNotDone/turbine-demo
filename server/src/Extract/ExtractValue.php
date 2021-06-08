<?php

namespace Demo\Extract;

abstract class ExtractValue
{
    public function __construct(
        private array $params,
    ) {}

    protected function getValue(string $key): mixed
    {
        return $this->params[$key];
    }
}
