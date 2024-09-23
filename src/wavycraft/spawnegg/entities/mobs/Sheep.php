<?php

declare(strict_types=1);

namespace wavycraft\spawnegg\entities\mobs;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

use wavycraft\spawnegg\entities\MobEntity;
use function mt_rand;

class Sheep extends MobEntity
{
    const TYPE_ID = EntityIds::SHEEP;

    public function getName() : string{
		return "Sheep";
	 }

    public function getMaxHealth(): int
    {
        return 10;
    }

    public function getDrops(): array
    {
        return [
            VanillaItems::RAW_MUTTON()->setCount(mt_rand(1, 3)),
        ];
    }

    public function getXpDropAmount(): int
    {
        return mt_rand(1, 3);
    }
}
