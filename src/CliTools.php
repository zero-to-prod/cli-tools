<?php

namespace Zerotoprod\CliTools;

use Symfony\Component\Console\Application;

class CliTools
{
    public static function register(Application $Application): void
    {
        $Application->add(new SrcCommand());
    }
}