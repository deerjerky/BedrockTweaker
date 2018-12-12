<?php
declare(strict_types=1);
namespace EventfulDeer48;

use pocketmine\block\Solid;
use pocketmine\item\TieredTool;
use pocketmine\block\BlockToolType;
use EventfulDeer48\BedrockTweaker;

class Bedrock extends Solid{

	protected $id = self::BEDROCK;

	public function __construct(){
	}
	public function getName() : string{

		return "Bedrock";
	}
	public function getHardness() : float{

		return $config[0];
	}
	public function getBlastResistance() : float{

		return $config[1];
	}
	public function isBreakable(Item $item) : bool{

		return true;
	}
}
?>
