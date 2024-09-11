<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Aissistant\Client\Aissistant;

use Aissistant\Client\Aissistant\Model\OpenAiWrapper;
use OpenAI;
use OpenAI\Client as OpenAIClient;
use Spryker\Client\Kernel\AbstractFactory;


/**
 * @method \Aissistant\Client\Aissistant\AissistantConfig getConfig()
 */
class AissistantFactory extends AbstractFactory
{
    /**
     * @var OpenAIClient|null
     */
    protected static ?OpenAIClient $openAIClient = null;

    /**
     * @return \OpenAI\Client
     */
    public function createOpenAIClient(): OpenAIClient
    {
        return OpenAI::factory()
            ->withApiKey($this->getConfig()->getOpenaiApiKey())
            ->make();
    }

    /**
     * @return OpenAIClient
     */
    public function getOpenAIClient(): OpenAIClient
    {
        if (!static::$openAIClient) {
            static::$openAIClient = $this->createOpenAIClient();
        }

        return static::$openAIClient;
    }

    public function createOpenAiWrapper(): OpenAiWrapper
    {
        return new OpenAiWrapper(
            $this->getOpenAIClient(),

        );
    }
}
