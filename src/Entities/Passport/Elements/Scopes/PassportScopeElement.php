<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements\Scopes;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет запрошенный элемент.
 *
 * @link https://core.telegram.org/passport#passportscopeelement
 *
 * @see PassportScopeElementOneOfSeveral
 * @see PassportScopeElementOne
 */
#[Concrete]
abstract class PassportScopeElement extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): static
    {
        return isset($data['one_of']) ? new PassportScopeElementOneOfSeveral($data) : new PassportScopeElementOne($data);
    }
}
