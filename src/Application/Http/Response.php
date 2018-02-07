<?php

namespace Application\Http;

use Application\View\Model\ViewModelInterface;

/**
 * Class Response
 *
 * @package Application\Http
 */
class Response
{
    /**
     * @param int
     */
    protected $statusCode = 200;

    /**
     * @var ViewModelInterface
     */
    protected $viewModel;

    /**
     * Sets http response status code
     *
     * @param int $statusCode
     */
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * Gets http response status code
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Sets view model
     *
     * @param ViewModelInterface $viewModel
     */
    public function setViewModel(ViewModelInterface $viewModel)
    {
        $this->viewModel = $viewModel;
    }

    /**
     * Outputs the response content
     */
    public function render()
    {
        if ($this->viewModel) {
            $content     = $this->viewModel->toString();
            $contentType = $this->viewModel->getContentType();

        } else {
            $content     = '';
            $contentType = 'text/html';
        }

        http_response_code($this->statusCode);
        header("Content-Type: {$contentType}; charset=utf-8");
        echo $content;
    }
}
