<?php

namespace Application\Http;

/**
 * Class Request
 *
 * @package Application\Http
 */
class Request
{
    /**
     * Gets "REQUEST" parameters
     *
     * @return array
     */
    public function getRequest()
    {
        return $_REQUEST;
    }

    /**
     * Gets "POST" parameters
     *
     * @return array
     */
    public function getPost()
    {
        return $_POST;
    }

    /**
     * Gets "GET" parameters
     *
     * @return array
     */
    public function getGet()
    {
        return $_GET;
    }
}