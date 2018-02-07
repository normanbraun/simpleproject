<?php

namespace Application\Controller;

use Application\Http;

/**
 * Class AbstractController
 *
 * @package Application\Controller
 */
abstract class AbstractController
{
    /**
     * @var array
     */
    protected $routeParams = [];

    /**
     * @var Http\Request
     */
    protected $request;

    /**
     * @var Http\Response
     */
    protected $response;

    /**
     * Sets the route parameters
     *
     * @param array $params
     */
    public function setRouteParams(array $params)
    {
        $this->routeParams = $params;
    }

    /**
     * Gets all route parameters
     *
     * @return array
     */
    public function getRouteParams()
    {
        return $this->routeParams;
    }

    /**
     * Gets specific route parameter
     *
     * @param string $paramKey
     *
     * @return mixed|null
     */
    public function getRouteParam($paramKey)
    {
        return $this->routeParams[$paramKey] ?? null;
    }

    /**
     * Gets the request instance
     *
     * @return Http\Request
     */
    public function getRequest()
    {
        if (!$this->request) {
            $this->request = new Http\Request();
        }
        return $this->request;
    }

    /**
     * Gets the response instance
     *
     * @return Http\Response
     */
    public function getResponse()
    {
        if (!$this->response) {
            $this->response = new Http\Response();
        }
        return $this->response;
    }
}
