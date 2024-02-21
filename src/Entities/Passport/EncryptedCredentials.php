<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements\EncryptedPassportElement;

/**
 * Представляет данные, необходимые для расшифровки и аутентификации {@link EncryptedPassportElement}.
 *
 * @link https://core.telegram.org/bots/api#encryptedcredentials
 *
 * @method string getData()   Зашифрованные в кодировке Base64 JSON-сериализованные данные с уникальной полезной нагрузкой пользователя, хэшами данных и секретами.
 * @method string getHash()   Хэш данных в кодировке Base64 для аутентификации данных.
 * @method string getSecret() Секрет в кодировке Base64, зашифрованный открытым ключом RSA бота, необходимый для расшифровки данных.
 */
#[Required([
    'data',
    'hash',
    'secret'
])]
class EncryptedCredentials extends Entity
{
	//
}
