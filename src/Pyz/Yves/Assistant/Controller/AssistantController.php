<?php

namespace Pyz\Yves\Assistant\Controller;

use Generated\Shared\Transfer\AissistantChatRequestTransfer;
use Pyz\Yves\Assistant\AssistantFactory;
use Symfony\Component\HttpFoundation\Request;
use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * @method AssistantFactory getFactory()
 */
class AssistantController  extends AbstractController
{
    /**
     * @var string
     */
    public const MESSAGE = 'message';

    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        var_dump($session);
        $threadId = null;
        $message = $request->query->get(static::MESSAGE) ?? '';

        $requestTransfer = new AissistantChatRequestTransfer();
        $requestTransfer->setThreadId($threadId);
        $requestTransfer->setMessage($message);

        if (!empty($message)) {
            $response = $this->getFactory()->createAssistantClient()->ask($requestTransfer);
            return $this->jsonResponse($response);
        }
        return $this->jsonResponse("repeat your question");
    }

}
