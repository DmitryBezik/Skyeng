<?php

namespace src\DataProvider\Get;

final class CacheDecorator implements DataProviderGetInterface
{
    /**
     * @var Cache
     */
    private $cache;

    /**
     * @var DataProviderGetInterface
     */
    private $getter;

    /**
     * @param Cache $cache
     * @param DataProviderGetInterface $getter
     */
    public function __construct(
        Cache $cache,
        DataProviderGetInterface $getter
    ) {
        $this->cache = $cache;
        $this->getter = $getter;
    }

    /**
     * {@inheritdoc}
     */
    public function get(array $request): array
    {
        if ($result = $this->cache->get($request)) {
            return $result;
        }

        $result = $this->getter->get($request);

        $this->cache->set($request, $result);

        return $result;
    }
}
