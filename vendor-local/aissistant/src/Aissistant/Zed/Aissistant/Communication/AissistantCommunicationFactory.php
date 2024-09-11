<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Aissistant\Zed\Aissistant\Communication;

use Aissistant\Client\Aissistant\AissistantClientInterface;
use Aissistant\Zed\Aissistant\AissistantDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class AissistantCommunicationFactory extends AbstractCommunicationFactory
{
    public function getAissistantClient(): AissistantClientInterface
    {
        return $this->getProvidedDependency(AissistantDependencyProvider::AISSISTANT_CLIENT);
    }
}
