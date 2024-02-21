<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost\Sources;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет буст полученый за счет создания подарочных кодов Телеграм Премиум для буста чата.
 *
 * @link https://core.telegram.org/bots/api#chatboostsourcegiftcode
 *
 * @method string getSource() Источник буста.
 * @method   User getUser()   Объект пользователя, для которого создан подарочный код.
 */
#[Required([
    'source',
    'user'
])]
#[Depends([
    'user' => User::class
])]
class ChatBoostSourceGiftCode extends ChatBoostSource
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['source'] = ChatBoostSource::GIFT_CODE;

        parent::__construct($data);
    }
}
