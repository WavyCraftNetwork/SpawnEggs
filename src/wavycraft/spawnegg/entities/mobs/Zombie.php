<?php

declare(strict_types=1);

namespace wavycraft\spawnegg\entities\mobs;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

use wavycraft\spawnegg\entities\MobEntity;
use function mt_rand;

class Zombie extends MobEntity
{
    const TYPE_ID = EntityIds::ZOMBIE;

    public function getName() : string{
		return "Zombie";
	 }

    public function getDrops(): array
    {
        $drops = [
            VanillaItems::ROTTEN_FLESH()->setCount(mt_rand(0, 2))
        ];

        if (mt_rand(0, 199) < 5) {
            switch (mt_rand(0, 2)) {
                case 0:
                    $drops[] = VanillaItems::IRON_INGOT()->setCount(1);
                    break;
                case 1:
                    $drops[] = VanillaItems::CARROT()->setCount(1);
                    break;
                case 2:
                    $drops[] = VanillaItems::POTATO()->setCount(1);
                    break;
            }
        }

        return $drops;
    }

    public function getXpDropAmount(): int
    {
        return 5 + mt_rand(1, 3);
    }
}
