<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Suggestions;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Предоставляет информацию о предлагаемой публикации.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostinfo
 *
 * @method                  string getState()        Состояние предлагаемого поста.
 * @method SuggestedPostPrice|null getPrice()    (+) Предлагаемая цена публикации.
 * @method                int|null getSendDate() (+) Предлагаемая дата отправки публикации. Если поле пропущено, публикация может быть опубликована в любое время в течение 30 дней по усмотрению пользователя или администратора, одобрившего её
 *
 * @since 9.2
 */
#[Required([
    'state'
])]
#[Depends([
    'price' => SuggestedPostPrice::class
])]
class SuggestedPostInfo extends Entity
{
    /**
     * В ожидании.
     */
    public function isPending(): bool
    {
        return $this->getState() == SuggestedPostState::PENDING;
    }

    /**
     * Одобрено.
     */
    public function isApproved(): bool
    {
        return $this->getState() == SuggestedPostState::APPROVED;
    }

    /**
     * Отклонено.
     */
    public function isDeclined(): bool
    {
        return $this->getState() == SuggestedPostState::DECLINED;
    }
}
