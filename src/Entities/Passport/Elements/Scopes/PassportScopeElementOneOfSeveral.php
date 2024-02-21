<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements\Scopes;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет несколько элементов, один из которых должен быть предоставлен.
 *
 * @link https://core.telegram.org/passport#passportscopeelementoneofseveral
 *
 * @method PassportScopeElementOne[] getOneOf()           Массив объектов элементов.
 * @method                 bool|null getSelfie()      (+) Запросить селфи с документом из этого списка, который пользователь выбирает для загрузки.
 * @method                 bool|null getTranslation() (+) Запросить перевод документа из этого списка, который пользователь выбирает для загрузки.
 */
#[Required([
    'one_of'
])]
#[Depends([
    'one_of' => [PassportScopeElementOne::class]
])]
class PassportScopeElementOneOfSeveral extends PassportScopeElement
{
    //
}
