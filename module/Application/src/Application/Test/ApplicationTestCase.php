<?php

namespace Application\Test;

use Pimple;
use PHPUnit\Framework\TestCase;

/**
 * Class ApplicationTestCase
 *
 * @package Application\Test
 */
class ApplicationTestCase extends TestCase
{
    /**
     * @var Pimple\Container
     */
    protected $serviceContainer = [];

    /**
     * Gets DI service container
     *
     * @return Pimple\Container
     */
    protected function loadServiceContainer()
    {
        if (!$this->serviceContainer) {
            $this->serviceContainer = require_once __DIR__ . '/../../../../../config/services.config.php';
        }

        return $this->serviceContainer;
    }
}
