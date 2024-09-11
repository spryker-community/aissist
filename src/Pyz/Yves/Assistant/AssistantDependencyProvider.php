<?php

namespace Pyz\Yves\Assistant;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
class AssistantDependencyProvider  extends AbstractBundleDependencyProvider
{
    public const AISSISTANT_CLIENT = 'AISSISTANT_CLIENT';

    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);
        $this->addAissistantClient($container);

        return $container;
    }

    protected function addAissistantClient( Container $container): Container
    {
        $container->set(static::AISSISTANT_CLIENT, function (Container $container) {
            return $container->getLocator()->aissistant()->client();
        });

        return $container;
    }
}
