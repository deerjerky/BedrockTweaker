<?PHP

namespace EventfulDeer48;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\block\BlockFactory;
include EventfulDeer48\blocks\Bedrock;

class BedrockTweaker extends PluginBase implements Listener {

  public function onEnable() : void {

    $this->getLogger()->info(TextFormat::GREEN . "BedrockTweaker is now enabled on " . $this->getServer()->getName());
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    BlockFactory::registerBlock(new Bedrock(), true);
	if (!$config) {
		$config[0] = 100;
		$config[1] = 20000;
	}
  }

  public function onLoad() : void {

    $this->getLogger()->info(TextFormat::BLUE . "BedrockTweaker is now loaded on " . $this->getServer()->getName());

  }

  public function onDisable() : void {

    $this->getLogger()->info(TextFormat::RED . "BedrockTweaker is now disabled on " . $this->getServer()->getName());

  }

  public function onBreak(BlockBreakEvent $event) {

    $block = $event->getBlock();

    if ($block->getID() === 7) {

      if ($event->getItem()->getID() !== 278) {

        $event->setCancelled(true);
	        } else {
	      $event->setCancelled(false);
	    }
	}

  public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {

    $command = strtolower($command->getName());
    $prefix = TextFormat::GREEN . "B" . TextFormat::RED . "T" . TextFormat::GRAY . " > ";

    switch($command) {

      case "bedrocksethardness":

        if ($sender->hasPermission("bedrocktweaker.setbedrock") || $sender->hasPermission("bedrocktweaker.*")) {

          if (!$args) {

            $sender->sendMessage($prefix . TextFormat::RED . "Please enter a valid value.");
            return true;

          } elseif ($args[0]) {

            $config[0] = $args[0];
            $sender->sendMessage($prefix . TextFormat::GREEN . "Successfully set the bedrock hardness to " . $config[0]);
            return true;

          } else {
            return false;
          }
        }

        break;

        case "bedrocksetblastresistance":

          if ($sender->hasPermission("bedrocktweaker.setbedrock") || $sender->hasPermission("bedrocktweaker.*")) {

            if (!$args) {

              $sender->sendMessage($prefix . TextFormat::RED . "Please enter a valid value.");
              return true;

            } elseif ($args[0]) {

              $config[1] = $args[0];
              $sender->sendMessage($prefix . TextFormat::GREEN . "Successfully set the bedrock blast resistance to " . $config[1]);
              return true;

            } else {
              return false;
            }
          }
	  
	  break;
		    
	  case "bedrockstats":
		    
	    if ($sender->hasPermission("bedrocktweaker.stats") || $sender->hasPermission("bedrocktweaker.*")) {
		    
	      $sender->sendMessage($prefix . TextFormat::WHITE . "The current stats of Bedrock are:");
	      $sender->sendMessage($prefix . TextFormat::GRAY . "Hardness: " . TextFormat::WHITE . $config[0]);
	      $sender->sendMessage($prefix . TextFormat::GRAY . "Blast Resistance: " . TextFormat::WHITE . $config[1]);
	      return true;
		    
	    } else {
	      return false;
	    }
	break;
		
	case "bedrockreset":
		
		if ($sender->hasPermission("bedrocktweaker.reset") || $sender->hasPermission("bedrocktweaker.*")) {
			$config[0] = 100;
			$config[1] = 20000;
			$sender->sendMessage($prefix . TextFormat::GREEN . "Bedrock stats have been reset.");
		}
    }
  }
}

?>

