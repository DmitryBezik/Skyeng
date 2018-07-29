<?php

namespace src\DataProvider\Get;

use src\DataProvider\Set\DataProviderSetInterface;
use src\DataProvider\Set\Exception\DataProviderSetErrorException;

final class CacheDecorator implements DataProviderGetInterface
{
    /**
     * @var DataProviderGetInterface
     */
    private $cacheGetter;

    /**
     * @var DataProviderGetInterface
     */
    private $getter;

    /**
     * @var DataProviderSetInterface
     */
    private $cacheSetter;

    /**
     * @param DataProviderGetInterface $cacheGetter
     * @param DataProviderGetInterface $getter
     * @param DataProviderSetInterface $cacheSetter
     */
    public function __construct(
        DataProviderGetInterface $cacheGetter,
        DataProviderGetInterface $getter,
        DataProviderSetInterface $cacheSetter
    ) {
        $this->cacheGetter = $cacheGetter;
        $this->getter = $getter;
        $this->cacheSetter = $cacheSetter;
    }

    /**
     * {@inheritdoc}
     */
    public function get(array $request): array
    {
        if ($result = $this->cacheGetter->get($request)) {
            return $result;
        }

        $result = $this->getter->get($request);

        $this->cacheSetter->set($request, $result);

        return $result;
    }
}
