<?php

namespace ApplicationTest\Functional;

use Application\Test\ApplicationTestCase;
use Goutte\Client;

/**
 * Class PublicPagesTest
 *
 * @package ApplicationTest\Functional
 */
class PublicPagesTest extends ApplicationTestCase
{
    /**
     * Functional test for "index" page
     */
   public function testIndexPage()
   {
       $client = new Client();

       $crawler = $client->request('GET', 'http://dev.local');

       $this->assertEquals($client->getResponse()->getStatus(), 200);

       $paragraphContent = $crawler->filter('p');
       $this->assertCount(1, $paragraphContent);
       $this->assertEquals('Hello World!', $paragraphContent->getNode(0)->nodeValue);
   }
}
