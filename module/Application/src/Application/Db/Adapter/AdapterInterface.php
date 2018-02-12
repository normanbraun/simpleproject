<?php

namespace Application\Db\Adapter;

/**
 * Interface AdapterInterface
 *
 * @package Application\Db\Adapter
 */
interface AdapterInterface
{
    /**
     * Get resource
     *
     * @return mixed
     */
    public function getResource();

    /**
     * Sets connection parameters
     *
     * @param array $parameters
     */
    public function setConnectionParameters(array $parameters);

    /**
     * @param string $statement
     * @param array $parameters
     *
     * @return array
     */
    public function executePreparedSelect($statement, array $parameters = []);
}
