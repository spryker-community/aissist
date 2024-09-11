<?php
namespace Aissistant\Client\Aissistant;
use Generated\Shared\Transfer\AissistantChatRequestTransfer;
use Generated\Shared\Transfer\AissistantChatResponseTransfer;

interface AissistantClientInterface
{
    public function ask(AissistantChatRequestTransfer $requestTransfer): AissistantChatResponseTransfer;
}
