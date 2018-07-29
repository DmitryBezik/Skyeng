<?php

namespace src\DataProvider\traits;

use Psr\Cache\CacheItemPoolInterface;
use src\DataProvider\CacheKeyBuilder\CacheKeyBuilderInterface;

trait CacheWithKeyBuilder
{
    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    /**
     * @var CacheKeyBuilderInterface
     */
    private $keyBuilder;

    /**
     * @return CacheItemPoolInterface
     */
    private function getCache(): CacheItemPoolInterface
    {
        return $this->cache;
    }

    /**
     * @param CacheItemPoolInterface $cache
     * @return $this
     */
    private function setCache(CacheItemPoolInterface $cache): self
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * @return CacheKeyBuilderInterface
     */
    private function getKeyBuilder(): CacheKeyBuilderInterface
    {
        return $this->keyBuilder;
    }

    /**
     * @param CacheKeyBuilderInterface $keyBuilder
     * @return $this
     */
    private function setKeyBuilder(CacheKeyBuilderInterface $keyBuilder): self
    {
        $this->keyBuilder = $keyBuilder;

        return $this;
    }
}
