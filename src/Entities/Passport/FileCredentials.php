<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет реквизиты для расшифровки зашифрованных файлов из полей "front_side", "back_side", "selfie", "files" и "translation" в {@link EncryptedPassportElement}.
 *
 * @link https://core.telegram.org/passport#filecredentials
 *
 * @method string getFileHash() Контрольная сумма зашифрованного файла.
 * @method string getSecret()   Секрет зашифрованного файла.
 */
#[Required([
    'file_hash',
    'secret'
])]
class FileCredentials extends Entity
{
    //
}
