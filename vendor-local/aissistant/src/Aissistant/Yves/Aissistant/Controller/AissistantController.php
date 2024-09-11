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
        $message = $request->query->get(static::MESSAGE) ?? '';
        $session = $this->getFactory()->getSessionClient();
        $threadId = $session->get(static::THREAD_ID);
        if (empty($message)) {
            return $this->jsonResponse("Empty response");
        }

        $requestTransfer = new AissistantChatRequestTransfer();
        $requestTransfer->setThreadId($threadId);
        $requestTransfer->setMessage($message);
        $response = $this->getFactory()->getAissistantClient()->ask($requestTransfer);

        if ($response->getResponse()) {
            $session->set(static::THREAD_ID, $response->getThreadId());
            $textResponse = $response->getResponse();
        } else {
            $textResponse = 'Empty response';
        }
        return $this->jsonResponse($textResponse);
    }

}
