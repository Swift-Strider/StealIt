<?php

declare(strict_types=1);

namespace DiamondStrider1\StealIt\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\PluginOwned;
use pocketmine\Server;

class CopyHandCommand extends Command implements PluginOwned
{
    use CommandTrait;

    public function __construct()
    {
        parent::__construct(
            "copyhand",
            "Make a replica of the player's held item and give it to yourself.",
            "copyhand <player>"
        );
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$sender instanceof Player) {
            CmdInfo::notplayer($sender);
            return;
        }

        if (!$this->testPermission($sender, "stealit.copyhand")) {
            return;
        }

        if (!isset($args[0])) {
            CmdInfo::e($sender, "You must give the name of a player!");
            return;
        }

        $player = Server::getInstance()->getPlayerByPrefix($args[0]);
        if ($player === null) {
            CmdInfo::e($sender, "That player is not online!");
            return;
        }

        $item = $player->getInventory()->getItemInHand();
        $canAdd = $sender->getInventory()->canAddItem($item);

        if (!$canAdd) {
            CmdInfo::e($sender, "You don't have enough inventory space to copy from that player!");
            return;
        }

        $sender->getInventory()->addItem($item);

        $playerName = $player->getName();
        CmdInfo::i($sender, "Successfully copied $playerName's hand!");
    }
}
