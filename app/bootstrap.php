<?php

/**
 * My Application bootstrap file.
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */


use Nette\Debug;
use Nette\Environment;
use Nette\Application\Route;
use Nette\Application\SimpleRouter;


require LIBS_DIR . '/Nette/loader.php';

Debug::enable();

Environment::loadConfig();
Ormion\Ormion::connect(Nette\Environment::getConfig("database"));

// Step 3: Configure application
// 3a) get and setup a front controller
$application = Environment::getApplication();
$application->errorPresenter = 'Error';
//$application->catchExceptions = TRUE;

// Step 4: Setup application router
$router = $application->getRouter();

$router[] = new Route('index.php', array(
	'presenter' => 'Homepage',
	'action' => 'default',
), Route::ONE_WAY);

$router[] = new Route('events/<week>/<year>/<day>', array(
	'presenter' => 'Eventlist',
	'action' => 'show',
	'week' => NULL,
        'year' => NULL,
        'day' => NULL
));

$router[] = new Route('<presenter>/<action>/<id>', array(
	'presenter' => 'Homepage',
	'action' => 'default',
	'id' => NULL,
));

// Step 5: Run the application!
$application->run();
