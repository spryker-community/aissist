<?php

namespace Aissistant\Client\Aissistant;

use Generated\Shared\Transfer\AissistantChatRequestTransfer;
use Generated\Shared\Transfer\AissistantChatResponseTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Aissistant\Client\Aissistant\AissistantFactory getFactory()
 */
class AissistantClient extends AbstractClient implements AissistantClientInterface
{
    public function ask(AissistantChatRequestTransfer $requestTransfer): AissistantChatResponseTransfer
    {
        return $this->getFactory()->createOpenAiWrapper()->chat($requestTransfer);
    }
}
