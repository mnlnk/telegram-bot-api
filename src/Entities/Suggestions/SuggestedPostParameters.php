<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Suggestions;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет параметры поста, предлагаемого ботом.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostparameters
 *
 * @method SuggestedPostPrice|null getPrice()    (+) Предлагаемая цена за публикацию. Если поле не заполнено, публикация неоплачена.
 * @method                int|null getSendDate() (+) Предлагаемая дата отправки публикации. Если указано, то дата должна находиться в диапазоне от 300 до 2678400 секунд (30 дней). Если поле не заполнено, публикация может быть опубликована в любое время в течение 30 дней по усмотрению пользователя, одобрившего её.
 *
 * @since 9.2
 */
#[Depends([
    'price' => SuggestedPostPrice::class
])]
class SuggestedPostParameters extends Entity
{
    //
}
