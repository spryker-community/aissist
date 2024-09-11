<?php

namespace Aissistant\Yves\Aissistant;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class AissistantDependencyProvider  extends AbstractBundleDependencyProvider
{
    public const AISSISTANT_CLIENT = 'AISSISTANT_CLIENT';
    public const SESSION_CLIENT = 'SESSION_CLIENT';

    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);
        $this->getAissistantClient($container);
        $this->getSessionClient($container);

        return $container;
    }

    protected function getAissistantClient( Container $container): Container
    {
        $container->set(static::AISSISTANT_CLIENT, function (Container $container) {
            return $container->getLocator()->aissistant()->client();
        });

        return $container;
    }

    protected function getSessionClient( Container $container): Container
    {
        $container->set(static::SESSION_CLIENT, function (Container $container) {
            return $container->getLocator()->session()->client();
        });

        return $container;
    }
}
