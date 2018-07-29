<?php

namespace src\DataProvider\Get;

use Throwable;

interface DataProviderGetInterface
{
    /**
     * @param mixed[] $request
     * @return mixed[]
     * @throws Throwable
     */
    public function get(array $request): array;
}
