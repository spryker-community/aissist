<?php
namespace Aissistant\Client\Aissistant\OpenAiWrapper;

use Aissistant\Client\Aissistant\AissistantConfig;
use Generated\Shared\Transfer\AissistantChatRequestTransfer;
use Generated\Shared\Transfer\AissistantChatResponseTransfer;
use OpenAI\Client as OpenAIClient;

class OpenAiWrapper
{
    protected OpenAIClient $openAIClient;
    protected AissistantConfig $config;

    public function __construct(
        OpenAIClient $openAIClient,
        AissistantConfig $config,
    ) {
        $this->openAIClient = $openAIClient;
        $this->config = $config;
    }

    public function chat(AissistantChatRequestTransfer $requestTransfer): AissistantChatResponseTransfer
    {
        $response = new AissistantChatResponseTransfer();

        if ($requestTransfer->getThreadId()) {
            $response->setThreadId($requestTransfer->getThreadId());

            $messageCreated = $this->openAIClient->threads()->messages()->create(
                $requestTransfer->getThreadId(),
                [
                    'role' => 'user',
                    'content' => $requestTransfer->getMessage()
                ]
            );

            $this->openAIClient->threads()->runs()->create(
                threadId: $requestTransfer->getThreadId(),
                parameters: [
                    'assistant_id' => $this->config->getAssistantId(),
                ],
            );
        } else {
            $threadCreated = $this->openAIClient->threads()->createAndRun(
                [
                    'assistant_id' => $this->config->getAssistantId(),
                    'thread' => [
                        'messages' =>
                            [
                                [
                                    'role' => 'user',
                                    'content' => $requestTransfer->getMessageOrFail(),
                                ],
                            ],
                    ],
                ],
            );

            $response->setThreadId($threadCreated->threadId);
        }

        sleep(15);

        $listMessagesResponse = $this->openAIClient->threads()->messages()->list($response->getThreadId(), [
            'limit' => 10
        ]);

        if (isset($listMessagesResponse->data[0]->content[0]['text']['value'])) {
            $response->setResponse($listMessagesResponse->data[0]->content[0]['text']['value']);
        }

        return $response;
    }
}
