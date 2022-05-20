<?php

declare(strict_types=1);

namespace DiamondStrider1\StealIt\Commands;

use pocketmine\command\CommandSender;

class CmdInfo
{
    /**
     * Send an *informational* message.
     */
    public static function i(CommandSender $sender, string $message): void {
        $sender->sendMessage("§6[§cStealIt§6]§b $message");
    }

    /**
     * Send an *error* message.
     */
    public static function e(CommandSender $sender, string $message): void {
        $sender->sendMessage("§6[§cStealIt§6]§c $message");
    }

    public static function notplayer(CommandSender $sender): void {
        self::e($sender, "You must be a player to use this command!");
    }
}
