<?php

namespace src\DataProvider\Get;

use Psr\Log\LoggerInterface;
use Throwable;

final class LoggerDecorator implements DataProviderGetInterface
{
    /**
     * @var DataProviderGetInterface
     */
    private $dataProvider;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param DataProviderGetInterface $dataProvider
     * @param LoggerInterface $logger
     */
    public function __construct(DataProviderGetInterface $dataProvider, LoggerInterface $logger)
    {
        $this->dataProvider = $dataProvider;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function get(array $request): array
    {
        try {
            return $this->dataProvider->get($request);
        } catch (Throwable $e) {
            $this->logger->critical($e->getMessage());
        }

        return [];
    }
}