<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Passport\PassportFile;

/**
 * Представляет документы или другие элементы Телеграм Паспорт, которыми пользователь поделился с ботом.
 *
 * @link https://core.telegram.org/bots/api#encryptedpassportelement
 *
 * @method              string getType()            Тип элемента.
 * @method         string|null getData()        (+) Данные элемента Телеграм Паспорт, зашифрованные в кодировке Base64, предоставленные пользователем.
 * @method         string|null getPhoneNumber() (+) Подтвержденный номер телефона пользователя.
 * @method         string|null getEmail()       (+) Подтвержденный адрес электронной почты пользователя.
 * @method PassportFile[]|null getFiles()       (+) Массив объектов зашифрованных файлов с документами, предоставленными пользователем.
 * @method   PassportFile|null getFrontSide()   (+) Объект зашифрованного файла с лицевой стороной документа, предоставленного пользователем.
 * @method   PassportFile|null getReverseSide() (+) Объект зашифрованного файла с обратной стороной документа, предоставленного пользователем.
 * @method   PassportFile|null getSelfie()      (+) Объект зашифрованного файла с селфи пользователя, держащего документ.
 * @method PassportFile[]|null getTranslation() (+) Массив зашифрованных файлов с переведенными версиями документов, предоставленных пользователем.
 * @method              string getHash()            Хэш элемента в кодировке Base64.
 */
#[Required([
    'type',
    'hash'
])]
#[Depends([
    'files' => [PassportFile::class],
    'front_side' => PassportFile::class,
    'reverse_side' => PassportFile::class,
    'selfie' => PassportFile::class,
    'translation' => [PassportFile::class]
])]
class EncryptedPassportElement extends Entity
{
    //
}
