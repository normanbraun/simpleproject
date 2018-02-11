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
     * @var string
     */
    protected $viewLayout = 'layout/default';

    /**
     * ViewModel constructor
     *
     * @param string $template
     * @param array $vars
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
    public function getContent()
    {
        $templateContent = '';

        if ($this->viewTemplate) {
            $templateContent = $this->renderTemplateToString($this->viewTemplate, $this->viewVars);
        }

        if ($this->viewLayout) {
            $layoutVars = ['templateContent' => $templateContent];
            $templateContent = $this->renderTemplateToString($this->viewLayout, $layoutVars);
        }

        return $templateContent;
    }

    /**
     * @param string $template
     * @param array $templateVars
     *
     * @return string
     */
    protected function renderTemplateToString($template, array $templateVars = [])
    {
        ob_start();

        if ($templateVars) {
            extract($templateVars, EXTR_OVERWRITE);
        }

        $absolutePathToTemplate = $this->getViewDirectory() . $template . '.phtml';
        include $absolutePathToTemplate;

        return ob_get_clean();
    }


    /**
     * Gets base directory of view files
     *
     * todo: Make configurable
     */
    protected function getViewDirectory()
    {
        return __DIR__ . '/../../../../view/';
    }
}
