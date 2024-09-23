<?php

declare(strict_types=1);

namespace wavycraft\spawnegg;

use pocketmine\plugin\PluginBase;
use pocketmine\entity\EntityDataHelper;
use pocketmine\entity\EntityFactory;
use pocketmine\entity\Living;
use pocketmine\entity\Location;
use pocketmine\inventory\CreativeInventory;
use pocketmine\item\StringToItemParser;
use pocketmine\math\Vector3;
use pocketmine\world\World;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\data\bedrock\item\ItemTypeNames;
use pocketmine\data\bedrock\item\SavedItemData;
use pocketmine\world\format\io\GlobalItemDataHandlers;

use wavycraft\spawnegg\items\EVanillaItems;
use wavycraft\spawnegg\entities\mobs\{Cow, Creeper, EnderMan, Pig, Skeleton, Spider, Witch, Sheep};

class Loader extends PluginBase {

    private static $instance;

    protected function onLoad() : void{
        self::$instance = $this;
    }

    protected function onEnable() : void{
        $this->saveDefaultConfig();
        $entities = [
            "Cow" => Cow::class,
            "Creeper" => Creeper::class,
            "EnderMan" => EnderMan::class,
            "Pig" => Pig::class,
            "Skeleton" => Skeleton::class,
            "Spider" => Spider::class,
            "Witch" => Witch::class,
            "Sheep" => Sheep::class
        ];
        foreach ($entities as $entityName => $typeClass) {
            EntityFactory::getInstance()->register($typeClass, static function (World $world, CompoundTag $nbt) use ($entityName): Living {
                return new $entityName(EntityDataHelper::parseLocation($nbt, $world), $nbt);
            }, [$entityName], $typeClass::TYPE_ID);
        }

        $itemDeserializer = GlobalItemDataHandlers::getDeserializer();
        $itemSerializer = GlobalItemDataHandlers::getSerializer();
        
        $stringToItemParser = StringToItemParser::getInstance();
        
        $creativeInventory = CreativeInventory::getInstance();

        $pig_egg = EVanillaItems::PIG_SPAWN_EGG();
        $cow_egg = EVanillaItems::COW_SPAWN_EGG();
        $creeper_egg = EVanillaItems::CREEPER_SPAWN_EGG();
        $witch_egg = EVanillaItems::WITCH_SPAWN_EGG();
        $skeleton_egg = EVanillaItems::SKELETON_SPAWN_EGG();
        $spider_egg = EVanillaItems::SPIDER_SPAWN_EGG();
        $enderman_egg = EVanillaItems::ENDERMAN_SPAWN_EGG();
        $sheep_egg = EVanillaItems::SHEEP_SPAWN_EGG();

        $itemDeserializer->map(
            ItemTypeNames::PIG_SPAWN_EGG,
            static fn() => clone $pig_egg
        );

        $itemDeserializer->map(
            ItemTypeNames::COW_SPAWN_EGG,
            static fn() => clone $cow_egg
        );

        $itemDeserializer->map(
            ItemTypeNames::CREEPER_SPAWN_EGG,
            static fn() => clone $creeper_egg
        );

        $itemDeserializer->map(
            ItemTypeNames::WITCH_SPAWN_EGG,
            static fn() => clone $witch_egg
        );

        $itemDeserializer->map(
            ItemTypeNames::SKELETON_SPAWN_EGG,
            static fn() => clone $skeleton_egg
        );

       $itemDeserializer->map(
            ItemTypeNames::SPIDER_SPAWN_EGG,
            static fn() => clone $spider_egg
        );

        $itemDeserializer->map(
            ItemTypeNames::ENDERMAN_SPAWN_EGG,
            static fn() => clone $enderman_egg
        );

        $itemDeserializer->map(
            ItemTypeNames::SHEEP_SPAWN_EGG,
            static fn() => clone $sheep_egg
        );

        $itemSerializer->map(
            $pig_egg,
            static fn() => new SavedItemData(ItemTypeNames::PIG_SPAWN_EGG)
        );

        $itemSerializer->map(
            $cow_egg,
            static fn() => new SavedItemData(ItemTypeNames::COW_SPAWN_EGG)
        );

        $itemSerializer->map(
            $creeper_egg,
            static fn() => new SavedItemData(ItemTypeNames::CREEPER_SPAWN_EGG)
        );

        $itemSerializer->map(
            $witch_egg,
            static fn() => new SavedItemData(ItemTypeNames::WITCH_SPAWN_EGG)
        );

         $itemSerializer->map(
            $skeleton_egg,
            static fn() => new SavedItemData(ItemTypeNames::SKELETON_SPAWN_EGG)
        );

        $itemSerializer->map(
            $spider_egg,
            static fn() => new SavedItemData(ItemTypeNames::SPIDER_SPAWN_EGG)
        );

        $itemSerializer->map(
            $enderman_egg,
            static fn() => new SavedItemData(ItemTypeNames::ENDERMAN_SPAWN_EGG)
        );

        $itemSerializer->map(
            $sheep_egg,
            static fn() => new SavedItemData(ItemTypeNames::SHEEP_SPAWN_EGG)
        );

        $stringToItemParser->register(
            "pig_spawn_egg",
            static fn() => clone $pig_egg
        );

        $stringToItemParser->register(
            "cow_spawn_egg",
            static fn() => clone $cow_egg
        );

        $stringToItemParser->register(
            "creeper_spawn_egg",
            static fn() => clone $creeper_egg
        );

        $stringToItemParser->register(
            "witch_spawn_egg",
            static fn() => clone $witch_egg
        );

        $stringToItemParser->register(
            "skeleton_spawn_egg",
            static fn() => clone $skeleton_egg
        );

        $stringToItemParser->register(
            "spider_spawn_egg",
            static fn() => clone $spider_egg
        );

        $stringToItemParser->register(
            "enderman_spawn_egg",
            static fn() => clone $enderman_egg
        );

        $stringToItemParser->register(
            "sheep_spawn_egg",
            static fn() => clone $sheep_egg
        );

        $creativeInventory->add($pig_egg);
        $creativeInventory->add($cow_egg);
        $creativeInventory->add($creeper_egg);
        $creativeInventory->add($witch_egg);
        $creativeInventory->add($skeleton_egg);
        $creativeInventory->add($spider_egg);
        $creativeInventory->add($enderman_egg);
        $creativeInventory->add($sheep_egg);
    }

    public static function getInstance(): self
    {
        return self::$instance;
    }
}
