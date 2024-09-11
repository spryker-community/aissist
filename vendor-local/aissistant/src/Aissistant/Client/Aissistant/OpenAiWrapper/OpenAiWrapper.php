<?php
namespace Aissistant\Client\Aissistant\Model;
use OpenAI\Client as OpenAIClient;
class OpenAiWrapper
{
    protected OpenAIClient $openAIClient;
    public function __construct(OpenAIClient $openAIClient)
    {
        $this->openAIClient = $openAIClient;
    }

    public function chat(string $question): string
    {
        $response = $this->openAIClient->chat()->create([
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'user', 'content' => $question],
            ],
        ]);

        return $response->choices[0]->message->content;
    }

}
