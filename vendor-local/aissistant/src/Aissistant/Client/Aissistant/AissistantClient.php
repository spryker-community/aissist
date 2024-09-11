<?php
namespace Aissistant\Client\Aissistant;
use Spryker\Client\Kernel\AbstractClient;


/**
 * @method \Aissistant\Client\Aissistant\AissistantFactory getFactory()
 */
class AissistantClient extends AbstractClient implements AissistantClientInterface
{
    public function ask(string $question): string
    {
        return $this->getFactory()->createOpenAiWrapper()->chat($question);
    }
}
