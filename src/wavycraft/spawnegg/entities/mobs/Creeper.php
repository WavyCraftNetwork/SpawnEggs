<?php

declare(strict_types=1);

namespace wavycraft\spawnegg\entities\mobs;

use pocketmine\item\VanillaItems;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

use wavycraft\spawnegg\entities\MobEntity;
use function mt_rand;

class Creeper extends MobEntity
{
    const TYPE_ID = EntityIds::CREEPER;

    public function getName() : string{
		return "Creeper";
	 }

    public function getDrops(): array
    {
        return [
            VanillaItems::GUNPOWDER()->setCount(mt_rand(0, 2)),
        ];
    }

    public function getXpDropAmount(): int
    {
        return 5 + mt_rand(1, 3);
    }
}
