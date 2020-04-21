<?php

return array(
    'dashboard' => [
        'namespace' => 'MyModule\Dashboard',
        'webControllerNamespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
        'apiControllerNamespace' => '',
        'className' => 'MyModule\Dashboard\Module',
        'path' => APP_PATH . '/modules/dashboard/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'index',
        'defaultAction' => 'index'
    ],
);