<?php
namespace Aissistant\Client\Aissistant;
interface AissistantClientInterface
{
    public function ask(string $question): string;
}
