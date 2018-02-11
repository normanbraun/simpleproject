<?php

namespace Application\Session;

use Application\Session\Storage\StorageInterface;

/**
 * Class Adapter
 *
 * @package Application\Session
 */
class Adapter
{
    /**
     * @var StorageInterface
     */
    protected $sessionStorage;

    /**
     * Sets session storage instance
     *
     * @param StorageInterface $sessionStorage
     */
    public function setSessionStorage(StorageInterface $sessionStorage)
    {
        $this->sessionStorage = $sessionStorage;
    }

    /**
     * Gets session storage instance
     *
     * @return StorageInterface
     */
    public function getSessionStorage()
    {
        return $this->sessionStorage;
    }
}
