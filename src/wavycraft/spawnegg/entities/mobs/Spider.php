<?php

declare(strict_types=1);

namespace wavycraft\spawnegg\entities\mobs;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

use wavycraft\spawnegg\entities\MobEntity;
use function mt_rand;

class Spider extends MobEntity
{
    const TYPE_ID = EntityIds::SPIDER;

    public function getName() : string{
		return "Spider";
	 }

    public function getMaxHealth(): int
    {
        return 16;
    }

    public function getDrops(): array
    {
	return [
            VanillaItems::STRING()->setCount(mt_rand(1, 2)),
            VanillaItems::SPIDER_EYE()->setCount(mt_rand(1, 2))
	];
    }

    public function getXpDropAmount(): int
    {
        return 5 + mt_rand(1, 3);
    }
}
