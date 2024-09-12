<?php

declare(strict_types=1);

namespace wavycraft\spawnegg\entities\mobs;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

use wavycraft\spawnegg\entities\MobEntity;
use function mt_rand;

class EnderMan extends MobEntity
{
    const TYPE_ID = EntityIds::ENDERMAN;

    public function getName() : string{
		return "Enderman";
	 }

    public function getDrops(): array
    {
        return [
            VanillaItems::ENDER_PEARL()->setCount(mt_rand(0, 1)),
        ];
    }

    public function getXpDropAmount(): int
    {
        return 5 + mt_rand(1, 3);
    }
}