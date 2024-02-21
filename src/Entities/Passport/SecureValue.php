<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет учетные данные, необходимые для расшифровки зашифрованных значений.
 *
 * @link https://core.telegram.org/passport#securevalue
 *
 * @method   DataCredentials|null getData()        (+) Объект реквизитов для зашифрованных данных Телеграм Паспорт.
 * @method   FileCredentials|null getFrontSide()   (+) Объект реквизитов для зашифрованного документа лицевой стороны.
 * @method   FileCredentials|null getReverseSide() (+) Объект реквизитов для зашифрованного документа обратной стороны.
 * @method   FileCredentials|null getSelfie()      (+) Объект реквизитов для зашифрованного документа с селфи пользователя.
 * @method FileCredentials[]|null getTranslation() (+) Массив объектов реквизитов для зашифрованных документов с переводом.
 * @method FileCredentials[]|null getFiles()       (+) Массив объектов реквизитов для зашифрованных файлов.
 */
#[Depends([
    'data' => DataCredentials::class,
    'front_side' => FileCredentials::class,
    'reverse_side' => FileCredentials::class,
    'selfie' => FileCredentials::class,
    'translation' => [FileCredentials::class],
    'files' => [FileCredentials::class]
])]
class SecureValue extends Entity
{
    //
}
