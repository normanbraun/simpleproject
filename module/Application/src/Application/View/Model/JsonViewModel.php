<?php

namespace Application\View\Model;

/**
 * Class JsonViewModel
 *
 * @package Application\ViewModel
 */
class JsonViewModel implements ViewModelInterface
{
    /**
     * @var array
     */
    protected $viewVars = [];

    /**
     * ViewModel constructor
     *
     * @param array $vars
     */
    public function __construct(array $vars = [])
    {
        $this->viewVars = $vars;
    }

    /**
     * {@inheritdoc}
     */
    public function getContentType()
    {
        return 'application/json';
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        return json_encode($this->viewVars);
    }
}
