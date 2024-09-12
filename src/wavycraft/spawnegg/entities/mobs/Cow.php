<?php

declare(strict_types=1);

namespace wavycraft\spawnegg\entities\mobs;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

use wavycraft\spawnegg\entities\MobEntity;
use function mt_rand;

class Cow extends MobEntity
{
    const TYPE_ID = EntityIds::COW;

    public function getName() : string{
		return "Cow";
	 }

    public function getMaxHealth(): int
    {
        return 10;
    }

    public function getDrops(): array
    {
        return [
            VanillaItems::RAW_BEEF()->setCount(mt_rand(1, 3)),
            VanillaItems::LEATHER()->setcount(mt_rand(0, 2))
        ];
    }

    public function getXpDropAmount(): int
    {
        return mt_rand(1, 3);
    }
}