<?php

namespace Zerotoprod\CliTools;

use Symfony\Component\Console\Application;

/**
 * @link https://github.com/zero-to-prod/cli-tools
 */
class CliTools
{
    /**
     * @link https://github.com/zero-to-prod/cli-tools
     */
    public static function register(Application $Application): void
    {
        $Application->add(new SrcCommand());
    }
}