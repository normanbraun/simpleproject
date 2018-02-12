<?php

namespace Application\Db\Adapter;

/**
 * Abstract class AbstractConnection
 *
 * @package Application\Db\Adapter
 */
abstract class AbstractAdapter implements AdapterInterface
{
    /**
     * @var resource|null
     */
    protected $resource;

    /**
     * @var array
     */
    protected $connectionParameters;

    /**
     * {@inheritdoc}
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * {@inheritdoc}
     */
    public function setConnectionParameters(array $parameters)
    {
        return $this->connectionParameters = $parameters;
    }
}
