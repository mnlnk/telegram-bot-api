<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements\Scopes;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет один конкретный элемент, который должен быть предоставлен.
 *
 * @link https://core.telegram.org/passport#passportscopeelementone
 *
 * @method    string getType()            Тип элемента.
 * @method bool|null getSelfie()      (+) Запросить селфи пользователя с документом.
 * @method bool|null getTranslation() (+) Запросить перевод документа пользователя.
 * @method bool|null getNativeNames() (+) Запросить имя, фамилию и отчество пользователя на языке страны проживания пользователя.
 */
#[Required([
    'type'
])]
class PassportScopeElementOne extends PassportScopeElement
{
    //
}
