<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements\Scopes\PassportScopeElement;

/**
 * Представляет запрашиваемые данные.
 *
 * @link https://core.telegram.org/passport#passportscope
 *
 * @method PassportScopeElement[] getData() Массив объектов запрашиваемых областей элементов, каждый тип может использоваться только один раз во всем массиве объектов.
 * @method                    int getV()    Версия области, должна быть 1.
 */
#[Required([
    'data',
    'v'
])]
#[Depends([
    'data' => [PassportScopeElement::class]
])]
class PassportScope extends Entity
{
    //
}
