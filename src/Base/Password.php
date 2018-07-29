<?php

namespace src\Base;

class Password
{
    use StringValueObjectTrait;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        // Password format validation

        $this->setValue($value);
    }
}