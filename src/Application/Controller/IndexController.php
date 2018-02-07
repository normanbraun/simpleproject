<?php

namespace Application\Controller;

use Application\View\Model\ViewModel;

/**
 * Class IndexController
 *
 * @package Application\Controller
 */
class IndexController extends AbstractController
{
    /**
     * @return \Application\Http\Response
     */
    public function indexAction()
    {
        $viewModel = new ViewModel('index/index');

        $response = $this->getResponse();
        $response->setViewModel($viewModel);
        return $response;
    }
}