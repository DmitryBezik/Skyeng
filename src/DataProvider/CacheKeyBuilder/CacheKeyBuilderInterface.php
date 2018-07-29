<?php

namespace src\DataProvider\CacheKeyBuilder;

interface CacheKeyBuilderInterface
{
    /**
     * @param mixed[] $request
     * @return string
     */
    public function build(array $request): string;
}
