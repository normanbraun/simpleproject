<?php

namespace ApplicationTest\Controller;

use Application\Controller\IndexController;
use Application\Http;
use Application\Test\ApplicationTestCase;

/**
 * Class IndexControllerIntegrationTest
 *
 * @package ApplicationTest\Controller
 */
class IndexControllerIntegrationTest extends ApplicationTestCase
{
    /**
     * Tests "index" action of index controller
     */
   public function testIndexAction()
   {
       $indexController = new IndexController();
       $response = $indexController->indexAction();

       $this->assertInstanceOf(Http\Response::class, $response);

       $this->assertEquals($response->getStatusCode(), 200);
   }
}
