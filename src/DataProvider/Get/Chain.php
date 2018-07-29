<?php

namespace src\DataProvider\Get;

final class Chain implements DataProviderGetInterface
{
    /**
     * @var DataProviderGetInterface[]
     */
    private $dataProviders;

    /**
     * @param DataProviderGetInterface[] $dataProvider
     */
    public function __construct(array $dataProvider)
    {
        $this->dataProviders = $dataProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function get(array $request): array
    {
        foreach ($this->dataProviders as $dataProvider) {
            $result = $dataProvider->get($request);

            if (\count($result)) {
                return $result;
            }
        }

        return [];
    }
}
