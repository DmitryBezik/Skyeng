<?php

namespace src\Base;

trait StringValueObjectTrait
{
    /**
     * @var string
     */
    private $value;

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return $this
     */
    private function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
