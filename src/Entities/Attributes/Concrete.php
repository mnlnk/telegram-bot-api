<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Attributes;

use Attribute;

/**
 * Указывает, что у сущности есть конкретная реализация.
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Concrete
{
    //
}
