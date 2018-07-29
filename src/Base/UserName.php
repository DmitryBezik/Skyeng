<?php

namespace src\Base;

final class UserName
{
    use StringValueObjectTrait;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        // User name format validation

        $this->setValue($value);
    }
}
