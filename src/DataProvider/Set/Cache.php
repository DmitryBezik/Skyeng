<?php

namespace src\DataProvider\Set;

use DateTime;
use Psr\Cache\CacheItemPoolInterface;
use src\DataProvider\CacheKeyBuilder\CacheKeyBuilderInterface;
use src\DataProvider\Set\Exception\DataProviderSetErrorException;
use src\DataProvider\traits\CacheWithKeyBuilder;

final class Cache implements DataProviderSetInterface
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
    public function set(array $request, array $result): void
    {
        try {
            $this
                ->getCache()
                ->getItem($this->getKey($request))
                ->set($result)
                ->expiresAt(
                    (new DateTime())->modify('+1 day')
                );
        } catch (\Throwable $e) {
            throw new DataProviderSetErrorException('Setting error exception', 0, $e);
        }
    }

    /**
     * @param mixed[] $request
     * @return string
     */
    private function getKey(array $request): string
    {
        return $this->getKeyBuilder()->build($request);
    }
}
