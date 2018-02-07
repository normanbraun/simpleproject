<?php

namespace Application\View\Model;

class ViewModel implements ViewModelInterface
{
    /**
     * @var array
     */
    protected $viewVars = [];

    /**
     * @var string
     */
    protected $viewTemplate;

    /**
     * ViewModel constructor
     *
     * @param string $template
     * @param array  $vars
     */
    public function __construct($template, array $vars = [])
    {
        $this->viewVars = $vars;
        $this->viewTemplate = $template;
    }

    /**
     * {@inheritdoc}
     */
    public function getContentType()
    {
        return 'text/html';
    }

    /**
     * {@inheritdoc}
     */
    public function toString()
    {
        ob_start();

        if ($this->viewTemplate) {

            $absolutePath = $this->getViewDirectory() . $this->viewTemplate . '.phtml';
            $this->includeTemplate($absolutePath);
        }

        return ob_get_clean();
    }

    /**
     * Includes the given template
     *
     * @param string $template Path to template file
     */
    protected function includeTemplate($template)
    {
        if ($this->viewVars) {
            extract($this->viewVars, EXTR_OVERWRITE);
        }

        include $template;
    }

    /**
     * Gets base directory of view files
     *
     * todo: Make configurable
     */
    protected function getViewDirectory()
    {
        return __DIR__ . '/../../../../view/phtml/';
    }
}
