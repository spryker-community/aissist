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

    public function indexAction(Request $request)
    {
        $threadId = null;
        $message = $request->query->get(static::MESSAGE) ?? '';

        $requestTransfer = new AissistantChatRequestTransfer();
        $requestTransfer->setThreadId($threadId);
        $requestTransfer->setMessage($message);

        if (!empty($message)) {
            $response = $this->getFactory()->getAissistantClient()->ask($requestTransfer);
            return $this->jsonResponse($response);
        }
        return $this->jsonResponse("repeat your question");
    }

}
