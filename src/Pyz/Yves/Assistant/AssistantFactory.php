<?php

namespace Pyz\Yves\Assistant;

use Aissistant\Client\Aissistant\AissistantClient;
use Spryker\Yves\Kernel\AbstractFactory;

class AssistantFactory extends AbstractFactory
{
    public function createAssistantClient(): AissistantClient
    {
        return $this->getProvidedDependency(AssistantDependencyProvider::AISSISTANT_CLIENT);
    }

    public function createSessionClient()
    {
        return $this->getProvidedDependency(AssistantDependencyProvider::SESSION_CLIENT);
    }

}
