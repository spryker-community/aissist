<?php

namespace Pyz\Yves\Assistant\Controller;

use Pyz\Yves\Assistant\AssistantDependencyProvider;
use Pyz\Yves\Assistant\AssistantFactory;
use Spryker\Service\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * @method AssistantFactory getFactory()
 */
class AssistantController  extends AbstractController
{
    protected const ARG_PROMPT = 'prompt';

    public function indexAction(Request $request)
    {
        $response = $this->getFactory()->createAssistantClient()->ask("How are you?");

        return $this->jsonResponse($response);

    }

}
