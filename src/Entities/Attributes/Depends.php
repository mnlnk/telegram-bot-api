<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Attributes;

use Attribute;

/**
 * Указывает поля которые зависят от других сущностей.
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Depends
{
    /**
     * Конструктор.
     */
    public function __construct(protected array $depends = [])
    {
        //
    }
}
