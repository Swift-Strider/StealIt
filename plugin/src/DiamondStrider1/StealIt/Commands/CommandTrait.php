<?php

declare(strict_types=1);

namespace DiamondStrider1\StealIt\Commands;

use DiamondStrider1\StealIt\Plugin;

trait CommandTrait
{
    public function getOwningPlugin(): Plugin
    {
        return Plugin::get();
    }
}
