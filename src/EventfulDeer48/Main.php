<?PHP

namespace EventfulDeer48;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;
use pocketmine\event\block\BlockBreakEvent;
use EventfulDeer48\blocks\Bedrock;

class Main extends PluginBase implements Listener {

  public function onEnable() : void {
	  $this->getServer()->getPluginManager->registerEvents($this, $this);
	  BlockFactory::registerBlock(new Bedrock(), true);


  }

  public function onLoad() : void {


  }

  public function onDisable() : void {


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
