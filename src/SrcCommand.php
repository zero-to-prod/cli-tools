<?php

namespace Zerotoprod\CliTools;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @link https://github.com/zero-to-prod/cli-tools
 */
#[AsCommand(
    name: SrcCommand::signature,
    description: 'Project source link'
)]
class SrcCommand extends Command
{
    /**
     * @link https://github.com/zero-to-prod/cli-tools
     */
    public const signature = 'cli-tools:src';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeLn('https://github.com/zero-to-prod/cli-tools');

        return Command::SUCCESS;
    }
}