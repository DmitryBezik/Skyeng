<?php

namespace src\Base;

final class HostName
{
    use StringValueObjectTrait;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        // Host name validation

        $this->setValue($value);
    }
}