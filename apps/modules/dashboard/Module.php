<?php

namespace MyModule\Dashboard;

use Phalcon\Di\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([

            'MyModule\Dashboard\Core\Domain\Event' => __DIR__ . '/Core/Domain/Event',
            'MyModule\Dashboard\Core\Domain\Model' => __DIR__ . '/Core/Domain/Model',
            'MyModule\Dashboard\Core\Domain\Repository' => __DIR__ . '/Core/Domain/Repository',
            'MyModule\Dashboard\Core\Domain\Service' => __DIR__ . '/Core/Domain/Service',

            'MyModule\Dashboard\Core\Application\Service' => __DIR__ . '/Core/Application/Service',
            'MyModule\Dashboard\Core\Application\EventSubscriber' => __DIR__ . '/Core/Application/EventSubscriber',

            'MyModule\Dashboard\Infrastructure\Persistence' => __DIR__ . '/Core/Infrastructure/Persistence',

            'MyModule\Dashboard\Presentation\Web\Controller' => __DIR__ . '/Presentation/Web/Controller',
            'MyModule\Dashboard\Presentation\Web\Validator' => __DIR__ . '/Presentation/Web/Validator',
            'MyModule\Dashboard\Presentation\Api\Controller' => __DIR__ . '/Presentation/Api/Controller',
            
        ]);

        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $moduleConfig = require __DIR__ . '/config/config.php';

        $di->get('config')->merge($moduleConfig);

        include_once __DIR__ . '/config/services.php';
    }
}