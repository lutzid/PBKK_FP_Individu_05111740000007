<?php

$container['router'] = function() use ($defaultModule, $modules) {

	$router = new \Phalcon\Mvc\Router(false);
	$router->clear();

	/**
	 * Default Routing
	 */
	$router->add('/', [
	    'namespace' => $modules[$defaultModule]['webControllerNamespace'],
		'module' => $defaultModule,
	    'controller' => isset($modules[$defaultModule]['defaultController']) ? $modules[$defaultModule]['defaultController'] : 'index',
	    'action' => isset($modules[$defaultModule]['defaultAction']) ? $modules[$defaultModule]['defaultAction'] : 'index'
	]);

	$router->addGet('/register', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'dashboard',
		'action' => 'registerIndex'
	]);

	$router->addGet('/register/pemijat', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pemijat',
		'action' => 'registerIndex'
	]);

	$router->addPost('/register/pemijat', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pemijat',
		'action' => 'register'
	]);

	$router->addGet('/register/pelanggan', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pelanggan',
		'action' => 'registerIndex'
	]);

	$router->addPost('/register/pelanggan', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pelanggan',
		'action' => 'register'
	]);

	$router->addGet('/login', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'dashboard',
		'action' => 'loginIndex'
	]);

	$router->addGet('/login/pemijat', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pemijat',
		'action' => 'loginIndex'
	]);

	$router->addPost('/login/pemijat', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pemijat',
		'action' => 'login'
	]);

	$router->addGet('/login/pelanggan', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pelanggan',
		'action' => 'loginIndex'
	]);

	$router->addPost('/login/pelanggan', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pelanggan',
		'action' => 'login'
	]);

	$router->addGet('/pijat', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pelanggan',
		'action' => 'index'
	]);

	$router->addGet('/logout/pemijat', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pemijat',
		'action' => 'logout'
	]);

	$router->addGet('/logout/pelanggan', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pelanggan',
		'action' => 'logout'
	]);

	$router->add('/edit/pemijat', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pemijat',
		'action' => 'edit'
	]);

	$router->add('/edit/pelanggan', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pelanggan',
		'action' => 'edit'
	]);

	$router->addGet('/home', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'dashboard',
		'action' => 'home'
	]);

	$router->addGet('/riwayat', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'dashboard',
		'action' => 'riwayat'
	]);

	$router->addGet('/profile', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'dashboard',
		'action' => 'profile'
	]);

	$router->add('/pesan/terima/{pemesananId}', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pemesanan',
		'action' => 'accept'
	]);

	$router->add('/pesan/tolak/{pemesananId}', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pemesanan',
		'action' => 'reject'
	]);

	$router->add('/pesan/{pemijatId}', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pemesanan',
		'action' => 'registrasi'
	]);

	$router->add('/pesan/cancel/{pemesananId}', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pemesanan',
		'action' => 'cancel'
	]);
	
	$router->add('/pesan/selesai/{pemesananId}', [
		'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
		'module' => 'dashboard',
		'controller' => 'pemesanan',
		'action' => 'selesai'
	]);

	/**
	 * Not Found Routing
	 */
	$router->notFound(
		[
			'namespace' => 'MyModule\Dashboard\Presentation\Web\Controller',
			'module' => 'dashboard',
			'controller' => 'dashboard',
			'action'     => 'error404',
		]
	);

	/**
	 * Error Routing
	 */
	$router->addGet('/forbidden', [
		'namespace' => "Its\Common\Controller",
		'controller' => "error",
		'action' => "route403"
	]);
	
	$router->addGet('/error', [
		'namespace' => "Its\Common\Controller",
		'controller' => "error",
		'action' => "routeErrorCommon"
	]);
	
	$router->addGet('/expired', [
		'namespace' => "Its\Common\Controller",
		'controller' => "error",
		'action' => "routeErrorState"
	]);

	$router->addGet('/maintenance', [
		'namespace' => "Its\Common\Controller",
		'controller' => "error",
		'action' => "maintenance"
	]);

	/**
	 * Module Routing
	 */
	// foreach ($modules as $moduleName => $module) {

	// 	if ($module['defaultRouting'] == true) {
	// 		/**
	// 		 * Default Module routing
	// 		 */
	// 		$router->add('/'. $moduleName . '/:params', array(
	// 			'namespace' => $module['webControllerNamespace'],
	// 			'module' => $moduleName,
	// 			'controller' => isset($module['defaultController']) ? $module['defaultController'] : 'index',
	// 			'action' => isset($module['defaultAction']) ? $module['defaultAction'] : 'index',
	// 			'params'=> 1
	// 		));
			
	// 		$router->add('/'. $moduleName . '/:controller/:params', array(
	// 			'namespace' => $module['webControllerNamespace'],
	// 			'module' => $moduleName,
	// 			'controller' => 1,
	// 			'action' => isset($module['defaultAction']) ? $module['defaultAction'] : 'index',
	// 			'params' => 2
	// 		));

	// 		$router->add('/'. $moduleName . '/:controller/:action/:params', array(
	// 			'namespace' => $module['webControllerNamespace'],
	// 			'module' => $moduleName,
	// 			'controller' => 1,
	// 			'action' => 2,
	// 			'params' => 3
	// 		));	

	// 		/**
	// 		 * Default API Module routing
	// 		 */
	// 		$router->add('/'. $moduleName . '/api/{version:^(\d+\.)?(\d+\.)?(\*|\d+)$}/:params', array(
	// 			'namespace' => $module['apiControllerNamespace'] . "\\" . 1,
	// 			'module' => $moduleName,
	// 			'version' => 1,
	// 			'controller' => isset($module['defaultController']) ? $module['defaultController'] : 'index',
	// 			'action' => isset($module['defaultAction']) ? $module['defaultAction'] : 'index',
	// 			'params'=> 2
	// 		));
			
	// 		$router->add('/'. $moduleName . '/api/{version:^(\d+\.)?(\d+\.)?(\*|\d+)$}/:controller/:params', array(
	// 			'namespace' => $module['apiControllerNamespace'] . "\\" . 1,
	// 			'module' => $moduleName,
	// 			'version' => 1,
	// 			'controller' => 2,
	// 			'action' => isset($module['defaultAction']) ? $module['defaultAction'] : 'index',
	// 			'params' => 3
	// 		));

	// 		$router->add('/'. $moduleName . '/api/{version:^(\d+\.)?(\d+\.)?(\*|\d+)$}/:controller/:action/:params', array(
	// 			'namespace' => $module['apiControllerNamespace'] . "\\" . 1,
	// 			'module' => $moduleName,
	// 			'version' => 1,
	// 			'controller' => 2,
	// 			'action' => 3,
	// 			'params' => 4
	// 		));	
	// 	} else {
			
	// 		$webModuleRouting = APP_PATH . '/modules/'. $moduleName .'/config/routes/web.php';
			
	// 		if (file_exists($webModuleRouting) && is_file($webModuleRouting)) {
	// 			include $webModuleRouting;
	// 		}

	// 		$apiModuleRouting = APP_PATH . '/modules/'. $moduleName .'/config/routes/api.php';
			
	// 		if (file_exists($apiModuleRouting) && is_file($apiModuleRouting)) {
	// 			include $apiModuleRouting;
	// 		}
	// 	}
	// }
	
    $router->removeExtraSlashes(true);
    
	return $router;
};