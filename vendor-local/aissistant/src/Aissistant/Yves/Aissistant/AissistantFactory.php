<?php

namespace Aissistant\Yves\Aissistant;

use Aissistant\Client\Aissistant\AissistantClient;
use Spryker\Yves\Kernel\AbstractFactory;

class AissistantFactory extends AbstractFactory
{
    public function getAissistantClient(): AissistantClient
    {
        return $this->getProvidedDependency(AissistantDependencyProvider::AISSISTANT_CLIENT);
    }

}
