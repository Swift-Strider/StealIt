<?php

declare(strict_types=1);

namespace DiamondStrider1\StealIt;

use DiamondStrider1\StealIt\Commands\CopyHandCommand;
use DiamondStrider1\StealIt\Commands\StealHandCommand;
use pocketmine\plugin\PluginBase;

class Plugin extends PluginBase
{
    private static self $instance;

    public function onLoad(): void
    {
        self::$instance = $this;
    }

    public function onEnable(): void
    {
        $commands = $this->getServer()->getCommandMap();
        $commands->registerAll(
            "StealIt",
            [
                new CopyHandCommand,
                new StealHandCommand
            ]
        );
    }

    public static function get(): self
    {
        return self::$instance;
    }
}
