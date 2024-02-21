<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost\Sources;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет буст полученый путем подписки на Телеграм Премиум или подарком подписки Телеграм Премиум другому пользователю.
 *
 * @link https://core.telegram.org/bots/api#chatboostsourcepremium
 *
 * @method string getSource() Источник буста.
 * @method   User getUser()   Объект пользователя, который забустил чат.
 */
#[Required([
    'source',
    'user'
])]
#[Depends([
    'user' => User::class
])]
class ChatBoostSourcePremium extends ChatBoostSource
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['source'] = ChatBoostSource::PREMIUM;

        parent::__construct($data);
    }
}
