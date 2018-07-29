<?php

namespace src\DataProvider\CacheKeyBuilder;

final class Json implements CacheKeyBuilderInterface
{
    /**
     * {@inheritdoc}
     */
    public function build(array $request): string
    {
        return json_encode($request);
    }
}
