<?php

declare(strict_types=1);

namespace wavycraft\spawnegg\entities\mobs;

use pocketmine\item\VanillaItems;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

use wavycraft\spawnegg\entities\MobEntity;
use function mt_rand;

class Witch extends MobEntity
{
    const TYPE_ID = EntityIds::WITCH;

    public function getName() : string{
		return "Witch";
	 }

    public function getDrops(): array
    {
        //TODO: Implement witches drops e.g redstone dust ect.
	return [];
    }

    public function getXpDropAmount(): int
    {
        return 5 + mt_rand(1, 3);
    }
}
