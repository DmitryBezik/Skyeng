<?php

namespace src\DataProvider\Get;

use Psr\Cache\CacheItemPoolInterface;
use src\DataProvider\CacheKeyBuilder\CacheKeyBuilderInterface;
use src\DataProvider\traits\CacheWithKeyBuilder;

final class Cache implements DataProviderGetInterface
{
    use CacheWithKeyBuilder;

    /**
     * @param CacheItemPoolInterface $cache
     * @param CacheKeyBuilderInterface $keyBuilder
     */
    public function __construct(CacheItemPoolInterface $cache, CacheKeyBuilderInterface $keyBuilder)
    {
        $this->setCache($cache);
        $this->setKeyBuilder($keyBuilder);
    }

    /**
     * {@inheritdoc}
     */
    public function get(array $request): array
    {
        $cacheItem = $this->getCache()->getItem($this->getKeyBuilder()->build($request));

        if ($cacheItem->isHit()) {
            return $cacheItem->get();
        }

        return [];
    }
}
