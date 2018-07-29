<?php

namespace src\DataProvider\Set;

use src\DataProvider\Set\Exception\DataProviderSetErrorException;

interface DataProviderSetInterface
{
    /**
     * @param array $request
     * @param array $result
     * @throws DataProviderSetErrorException
     */
    public function set(array $request, array $result): void;
}
