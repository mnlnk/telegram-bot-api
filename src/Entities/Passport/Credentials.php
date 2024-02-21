<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет реквизиты.
 *
 * @link https://core.telegram.org/passport#credentials
 *
 * @method SecureData getSecureData() Объект реквизитов для зашифрованных данных.
 * @method     string getNonce()      Одноразовый номер, указанный ботом.
 */
#[Required([
    'secure_data',
    'nonce'
])]
#[Depends([
    'secure_data' => SecureData::class
])]
class Credentials extends Entity
{
    //
}
