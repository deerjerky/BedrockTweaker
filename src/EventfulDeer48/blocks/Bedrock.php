<?php
declare(strict_types=1);
namespace EventfulDeer48;

use pocketmine\block\solid;
use pocketmine\item\TieredTool;

class Bedrock extends Solid{

	protected $id = self::BEDROCK;
  
	public function __construct(){
	}
	public function getName() : string{
  
		return "Bedrock";
	}
	public function getHardness() : float{
  
		return 100;
	}
	public function getBlastResistance() : float{
  
		return 20000;
	}
	public function isBreakable(Item $item) : bool{
  
		return true;
	}
}
?>
