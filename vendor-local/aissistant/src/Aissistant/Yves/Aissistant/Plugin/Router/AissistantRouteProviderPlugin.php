<?php

namespace Aissistant\Yves\Aissistant\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

class AissistantRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    public const ROUTE_NAME_ASSISTANT = 'aissistant';

    public function addRoutes( RouteCollection $routeCollection ): RouteCollection
    {
        return $this->addAssistantRoute($routeCollection);
    }

    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    protected function addAssistantRoute( RouteCollection $routeCollection ): RouteCollection
    {
        $route = $this->buildRoute('/aissistant', 'Aissistant', 'Aissistant', 'indexAction');
        $routeCollection->add(static::ROUTE_NAME_ASSISTANT, $route);

        return $routeCollection;
    }
}
