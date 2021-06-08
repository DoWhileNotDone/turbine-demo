<?php

namespace Demo\Extract;

final class ComponentGetExtractValues extends ExtractValue
{
    public function id(): string
    {
        return $this->getValue('id');
    }
}
