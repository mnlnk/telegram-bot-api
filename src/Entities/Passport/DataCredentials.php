<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements\EncryptedPassportElement;

/**
 * Представляет реквизиты, которые можно использовать для расшифровки зашифрованных данных из поля "data" в {@link EncryptedPassportElement}.
 *
 * @link https://core.telegram.org/passport#datacredentials
 *
 * @method string getDataHash() Контрольная сумма зашифрованных данных.
 * @method string getSecret()   Секрет зашифрованных данных.
 */
#[Required([
    'data_hash',
    'secret'
])]
class DataCredentials extends Entity
{
    //
}
