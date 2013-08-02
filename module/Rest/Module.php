<?php
namespace Rest;

use Zend\Mvc\MvcEvent;
use Zend\EventManager\StaticEventManager;

class Module
{
	public function init($moduleManager)
	{
		$sharedEvents = StaticEventManager::getInstance();
		$sharedEvents->attach('Rest', 'dispatch', array($this, 'setHeader'), -10);
	}
	
	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				),
			),
		);
	}

	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}
	
	public function getServiceConfig()
	{
		
	}
	
	public function setHeader(MvcEvent $e)
	{
		$response = $e->getResponse();
		$response->getHeaders()->addHeaderLine('Access-Control-Allow-Origin', '*');
	}
}