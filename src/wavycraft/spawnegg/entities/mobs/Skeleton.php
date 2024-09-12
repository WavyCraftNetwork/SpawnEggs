<?php

declare(strict_types=1);

namespace wavycraft\spawnegg\entities\mobs;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

use wavycraft\spawnegg\entities\MobEntity;
use function mt_rand;

class Skeleton extends MobEntity
{
    const TYPE_ID = EntityIds::SKELETON;

   public function getName() : string{
		return "Skeleton";
	 }

    public function getDrops(): array
    {
        return [
            VanillaItems::ARROW()->setCount(mt_rand(0, 2)),
            VanillaItems::BONE()->setCount(mt_rand(0, 2)),
        ];
    }

    public function getXpDropAmount(): int
    {
        return 5 + mt_rand(1, 3);
    }
}