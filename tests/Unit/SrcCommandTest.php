<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Zerotoprod\:package_namespace\SrcCommand;

class SrcCommandTest extends TestCase
{
    #[Test] public function command(): void
    {
        $application = new Application();
        $application->add(new SrcCommand());

        $command = $application->find(':package_slug:src');
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);

        $commandTester->assertCommandIsSuccessful();
    }
}