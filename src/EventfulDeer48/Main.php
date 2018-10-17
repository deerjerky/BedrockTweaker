<?PHP

namespace EventfulDeer48;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;
use pocketmine\event\block\BlockBreakEvent;
include EventfulDeer48\blocks\Bedrock;

class Main extends PluginBase implements Listener {

  public function onEnable() : void {

    $this->getLogger()->info(TextFormat::GREEN . "BedrockTweaker is now enabled on " . $this->getServer()->getName());
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    BlockFactory::registerBlock(new Bedrock(), true);
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
	        }
	    }
	}

}

?>
