<?php

namespace Aissistant\Yves\Aissistant\Controller;

use Generated\Shared\Transfer\AissistantChatRequestTransfer;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Aissistant\Yves\Aissistant\AissistantFactory getFactory()
 */
class AissistantController  extends AbstractController
{
    protected const MESSAGE = 'message';
    protected const THREAD_ID = 'aisistantThreadId';

    public function indexAction(Request $request)
    {

        $message = $request->query->get(static::MESSAGE);
        if ($message === null){
            return $this->jsonResponse("Empty response");
        }

        $sessionClient = $this->getFactory()->getSessionClient();
        $threadId = $sessionClient->get(static::THREAD_ID);

        $aissistantChatRequestTransfer = new AissistantChatRequestTransfer();
        $aissistantChatRequestTransfer->setThreadId($threadId);
        $aissistantChatRequestTransfer->setMessage($message);

        $aissistantChatResponseTransfer = $this->getFactory()->getAissistantClient()->ask($aissistantChatRequestTransfer);

        if ($aissistantChatResponseTransfer->getResponse() === null) {
            return $this->jsonResponse('I am sorry, I could not understand your request');
        }

        $sessionClient->set(static::THREAD_ID, $aissistantChatResponseTransfer->getThreadId());

        return $this->jsonResponse($aissistantChatResponseTransfer->getResponse());
    }

}
