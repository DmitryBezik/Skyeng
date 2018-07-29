<?php

namespace src\DataProvider\Get;

use src\Base\HostName;
use src\Base\Password;
use src\Base\UserName;
use src\DataProvider\traits\Credentials;

final class Integration implements DataProviderGetInterface
{
    use Credentials;

    /**
     * @param HostName $host
     * @param UserName $user
     * @param Password $password
     */
    public function __construct(HostName $host, UserName $user, Password $password)
    {
        $this->setHost($host);
        $this->setUser($user);
        $this->setPassword($password);
    }

    /**
     * {@inheritdoc}
     */
    public function get(array $request): array
    {
        // returns a response from external service
    }
}
