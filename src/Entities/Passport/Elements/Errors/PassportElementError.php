<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements\Errors;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет ошибку в отправленном элементе Телеграм Паспорт, которую должен устранить пользователь.
 *
 * @link https://core.telegram.org/bots/api#passportelementerror
 *
 * @see PassportElementErrorDataField
 * @see PassportElementErrorFile
 * @see PassportElementErrorFiles
 * @see PassportElementErrorFrontSide
 * @see PassportElementErrorReverseSide
 * @see PassportElementErrorSelfie
 * @see PassportElementErrorTranslationFile
 * @see PassportElementErrorTranslationFiles
 * @see PassportElementErrorUnspecified
 */
#[Concrete]
abstract class PassportElementError extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['source']) {
            PassportElementErrorSource::DATA              => new PassportElementErrorDataField($data),
            PassportElementErrorSource::FILE              => new PassportElementErrorFile($data),
            PassportElementErrorSource::FILES             => new PassportElementErrorFiles($data),
            PassportElementErrorSource::FRONT_SIDE        => new PassportElementErrorFrontSide($data),
            PassportElementErrorSource::REVERSE_SIDE      => new PassportElementErrorReverseSide($data),
            PassportElementErrorSource::SELFIE            => new PassportElementErrorSelfie($data),
            PassportElementErrorSource::TRANSLATION_FILE  => new PassportElementErrorTranslationFile($data),
            PassportElementErrorSource::TRANSLATION_FILES => new PassportElementErrorTranslationFiles($data),
            PassportElementErrorSource::UNSPECIFIED       => new PassportElementErrorUnspecified($data),
            default                                       => null
        };
    }
}
