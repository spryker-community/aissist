<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */


namespace Aissistant\Zed\Aissistant\Communication\Console;

use Generated\Shared\Transfer\AissistantChatRequestTransfer;
use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Aissistant\Zed\Aissistant\Communication\AissistantCommunicationFactory getFactory()
 */
class ChatConsole extends Console
{
    /**
     * @var string
     */
    public const COMMAND_NAME = 'aissistant:chat';

    /**
     * @var string
     */
    public const DESCRIPTION = 'chat with openai';

    /**
     * @var string
     */
    protected const ARG_PROMPT = 'prompt';


    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription(self::DESCRIPTION);

        $this->addArgument(static::ARG_PROMPT, InputArgument::REQUIRED, self::DESCRIPTION);

        parent::configure();
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int 0 if everything went fine, or an exit code
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $threadId = null;
        $message = $input->getArgument(static::ARG_PROMPT);

        $requestTransfer = new AissistantChatRequestTransfer();
        $requestTransfer->setThreadId($threadId);
        $requestTransfer->setMessage($message);

        $response = $this->getFactory()->getAissistantClient()->ask($requestTransfer);

        $output->writeln($response->getResponse());

        return Command::SUCCESS;
    }
}
