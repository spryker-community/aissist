<?php

namespace Aissistant\Yves\Aissistant\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Aissistant\Client\Aissistant\AissistantFactory getFactory()
 */
class AissistantController  extends AbstractController
{
    protected const ARG_PROMPT = 'prompt';

    public function indexAction(Request $request)
    {
        $response = $this->getFactory()->createAissistantClient()->ask("How are you?");

        return $this->jsonResponse($response);

    }

}
