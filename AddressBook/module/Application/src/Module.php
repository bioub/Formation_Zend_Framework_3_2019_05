<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\StdLib\Url;
use Zend\EventManager\EventInterface;
use Zend\Http\Request;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements ConfigProviderInterface, BootstrapListenerInterface
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * Listen to the bootstrap event
     *
     * @param EventInterface $e
     * @return array
     */
    public function onBootstrap(EventInterface $e)
    {
        /** @var MvcEvent $e */
        $request = $e->getRequest();

        /** @var Request $request */
        $currentUri = $request->getUri()->getPath();
        $newUri = Url::removeTrailingSlash($currentUri);
        $request->getUri()->setPath($newUri);

        $e->getApplication()->getEventManager()->attach(MvcEvent::EVENT_ROUTE, function($e) {
            /** @var MvcEvent $e */
            $routeMatch = $e->getRouteMatch();
            // var_dump($routeMatch);
        });
    }
}
