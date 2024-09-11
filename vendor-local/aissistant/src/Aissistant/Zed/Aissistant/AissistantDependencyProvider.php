<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Aissistant\Zed\Aissistant;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AissistantDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const AISSISTANT_CLIENT = 'AISSISTANT_CLIENT';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = $this->addAissistantClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addAissistantClient(Container $container): Container
    {
        $container->set(static::AISSISTANT_CLIENT, function (Container $container) {
            return $container->getLocator()->aissistant()->client();
        });

        return $container;
    }
}
