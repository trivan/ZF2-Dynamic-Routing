<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
//     public function onBootstrap(MvcEvent $e)
//     {
//         $eventManager        = $e->getApplication()->getEventManager();
//         $moduleRouteListener = new ModuleRouteListener();
//         $moduleRouteListener->attach($eventManager);
//     }
    public function onBootstrap(MvcEvent $e)
    {
    	$eventManager        = $e->getApplication()->getEventManager();
    
    	$eventManager->attach (MvcEvent::EVENT_ROUTE, function (MvcEvent $e) {
    		$controller_loader = $e->getApplication ()->getServiceManager ()->get ('ControllerLoader');
    
    		$controller = $e->getRouteMatch ()->getParam ('controller');
    		$controller_class = '\Application\Controller\\'.ucfirst ($controller).'Controller';
    
    		// Add service locator to the controller
    		$controller_object = new $controller_class;
    		$controller_object->setServiceLocator ($e->getApplication ()->getServiceManager ());
    		// ------------------------------------
    		$controller_loader->setService ($controller, $controller_object);
    	});
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
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
}
