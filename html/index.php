<?php
chdir(dirname(__DIR__));

define("BASE_PATH", getenv('BASE_PATH'));

require BASE_PATH.'/inc/Zend/Loader/StandardAutoloader.php';

$autoLoader = new Zend\Loader\StandardAutoloader(array(
	'namespaces' => array('Zend' => BASE_PATH.'/inc/Zend')
));
$autoLoader->register();

$application = Zend\Mvc\Application::init(include 'config/application.config.php');
$application->run();