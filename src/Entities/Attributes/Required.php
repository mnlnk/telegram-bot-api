<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Attributes;

use Attribute;

/**
 * Указывает обязательные поля сущности.
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Required
{
    /**
     * Конструктор.
     */
    public function __construct(protected array $required = [])
    {
        //
    }
}
