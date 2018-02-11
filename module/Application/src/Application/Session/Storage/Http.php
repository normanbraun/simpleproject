<?php

namespace Application\Session\Storage;

/**
 * Class Http
 *
 * @package Application\Session\Storage
 */
class Http implements StorageInterface
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        session_start();
    }

    /**
     * {@inheritdoc}
     */
    public function getData($valueKey)
    {
        return $_SESSION[$valueKey] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function setData($valueKey, $valueData)
    {
        return $_SESSION[$valueKey] = $valueKey;
    }

    /**
     * {@inheritdoc}
     */
    public function clearData()
    {
        $_SESSION = [];
    }
}