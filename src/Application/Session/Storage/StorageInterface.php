<?php

namespace Application\Session\Storage;

/**
 * Interface StorageInterface
 *
 * @package Application\Session\Storage
 */
interface StorageInterface
{
    /**
     * Initializes storage
     */
    public function init();

    /**
     * Gets specific data from storage
     *
     * @param $valueKey
     * @return mixed
     */
    public function getData($valueKey);

    /**
     * Sets specific data in storage
     *
     * @param string $valueKey
     * @param mixed  $valueData
     */
    public function setData($valueKey, $valueData);

    /**
     * Clears all data in storage
     */
    public function clearData();
}
