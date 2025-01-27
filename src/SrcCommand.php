<?php

namespace Zerotoprod\:package_namespace;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: ':package_slug:src',
    description: 'Project source link'
)]
class SrcCommand extends Command
{

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeLn('https://github.com/zero-to-prod/:package_slug');

        return Command::SUCCESS;
    }
}