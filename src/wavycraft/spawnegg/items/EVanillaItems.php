<?php

declare(strict_types=1);

namespace wavycraft\spawnegg\items;

use wavycraft\spawnegg\entities\mobs\{Cow, Creeper, EnderMan, Pig, Skeleton, Spider, Witch};

use pocketmine\entity\Entity;
use pocketmine\entity\Location;
use pocketmine\item\Item;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemTypeIds;
use pocketmine\item\SpawnEgg;
use pocketmine\math\Vector3;
use pocketmine\utils\CloningRegistryTrait;
use pocketmine\world\World;

/**
 * @method static SpawnEgg PIG_SPAWN_EGG()
 * @method static SpawnEgg COW_SPAWN_EGG()
 * @method static SpawnEgg CREEPER_SPAWN_EGG()
 * @method static SpawnEgg ENDERMAN_SPAWN_EGG()
 * @method static SpawnEgg SKELETON_SPAWN_EGG()
 * @method static SpawnEgg WITCH_SPAWN_EGG()
 * @method static SpawnEgg SPIDER_SPAWN_EGG()
 */
class EVanillaItems
{
    use CloningRegistryTrait;

    private function __construct()
    {
        //NOOP
    }

    /**
     * @param string $name
     * @param Item $item
     * @return void
     */
    protected static function register(string $name, Item $item): void
    {
        self::_registryRegister($name, $item);
    }

    /**
     * @return Item[]
     */
    public static function getAll(): array
    {
        /** @var Item[] $result */
        $result = self::_registryGetAll();
        return $result;
    }

    /**
     * @return void
     */
    protected static function setup(): void
    {
        self::registerSpawnEggs();
    }

    private static function registerSpawnEggs() : void{
		self::register("pig_spawn_egg", new class(new ItemIdentifier(ItemTypeIds::newId()), "Pig Spawn Egg") extends SpawnEgg{
			protected function createEntity(World $world, Vector3 $pos, float $yaw, float $pitch) : Entity{
				return new Pig(Location::fromObject($pos, $world, $yaw, $pitch));
			}
		});
		self::register("cow_spawn_egg", new class(new ItemIdentifier(ItemTypeIds::newId()), "Cow Spawn Egg") extends SpawnEgg{
			public function createEntity(World $world, Vector3 $pos, float $yaw, float $pitch) : Entity{
				return new Cow(Location::fromObject($pos, $world, $yaw, $pitch));
			}
		});
		self::register("enderman_spawn_egg", new class(new ItemIdentifier(ItemTypeIds::newId()), "Enderman Spawn Egg") extends SpawnEgg{
			public function createEntity(World $world, Vector3 $pos, float $yaw, float $pitch) : Entity{
				return new Enderman(Location::fromObject($pos, $world, $yaw, $pitch));
			}
		});
		
		self::register("creeper_spawn_egg", new class(new ItemIdentifier(ItemTypeIds::newId()), "Creeper Spawn Egg") extends SpawnEgg{
			public function createEntity(World $world, Vector3 $pos, float $yaw, float $pitch) : Entity{
				return new Creeper(Location::fromObject($pos, $world, $yaw, $pitch));
			}
		});
		
		self::register("skeleton_spawn_egg", new class(new ItemIdentifier(ItemTypeIds::newId()), "Skeleton Spawn Egg") extends SpawnEgg{
			public function createEntity(World $world, Vector3 $pos, float $yaw, float $pitch) : Entity{
				return new Skeleton(Location::fromObject($pos, $world, $yaw, $pitch));
			}
		});
		
		self::register("spider_spawn_egg", new class(new ItemIdentifier(ItemTypeIds::newId()), "Spider Spawn Egg") extends SpawnEgg{
			public function createEntity(World $world, Vector3 $pos, float $yaw, float $pitch) : Entity{
				return new Spider(Location::fromObject($pos, $world, $yaw, $pitch));
			}
		});
		
		self::register("witch_spawn_egg", new class(new ItemIdentifier(ItemTypeIds::newId()), "Witch Spawn Egg") extends SpawnEgg{
			public function createEntity(World $world, Vector3 $pos, float $yaw, float $pitch) : Entity{
				return new Witch(Location::fromObject($pos, $world, $yaw, $pitch));
			}
		});

	        self::register("sheep_spawn_egg", new class(new ItemIdentifier(ItemTypeIds::newId()), "Sheep Spawn Egg") extends SpawnEgg{
			public function createEntity(World $world, Vector3 $pos, float $yaw, float $pitch) : Entity{
				return new Sheep(Location::fromObject($pos, $world, $yaw, $pitch));
			}
		});
	}
}
