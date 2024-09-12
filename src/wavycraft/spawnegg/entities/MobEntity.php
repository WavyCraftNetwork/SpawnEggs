<?php

declare(strict_types=1);

namespace wavycraft\spawnegg\entities;

use pocketmine\entity\EntitySizeInfo;
use pocketmine\entity\Living;

class MobEntity extends Living
{
    protected function getInitialSizeInfo(): EntitySizeInfo
    {
        return new EntitySizeInfo(1.8, 0.6);
    }

    public static function getNetworkTypeId(): string
    {
        return static::TYPE_ID;
    }

    public function getName(): string
    {
        $data = explode("\\", get_class($this));
        return end($data);
    }

    public function canSaveWithChunk(): bool
    {
        return false;
    }
}
