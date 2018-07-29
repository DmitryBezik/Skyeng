<?php

namespace src\DataProvider\traits;

use src\Base\HostName;
use src\Base\Password;
use src\Base\UserName;

trait Credentials
{
    /**
     * @var HostName
     */
    private $host;

    /**
     * @var UserName
     */
    private $user;

    /**
     * @var Password
     */
    private $password;

    /**
     * @return HostName
     */
    private function getHost(): HostName
    {
        return $this->host;
    }

    /**
     * @param HostName $host
     * @return $this
     */
    private function setHost(HostName $host): self
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return UserName
     */
    private function getUser(): UserName
    {
        return $this->user;
    }

    /**
     * @param UserName $user
     * @return $this
     */
    private function setUser(UserName $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Password
     */
    private function getPassword(): Password
    {
        return $this->password;
    }

    /**
     * @param Password $password
     * @return $this
     */
    private function setPassword(Password $password): self
    {
        $this->password = $password;

        return $this;
    }
}
