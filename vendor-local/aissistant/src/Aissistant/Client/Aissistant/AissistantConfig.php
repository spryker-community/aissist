<?php

namespace Aissistant\Client\Aissistant;

use Aissistant\Shared\Aissistant\AissistantConstants;
use Spryker\Client\Kernel\AbstractBundleConfig;

class AissistantConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getOpenaiApiKey(): string
    {
        return $this->get(AissistantConstants::OPENAI_API_KEY);
    }

    /**
     * @return string
     */
    public function getAssistantId(): string
    {
        return $this->get(AissistantConstants::ASSISTANT_ID);
    }
}
