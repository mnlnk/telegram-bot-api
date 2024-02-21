<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements\Errors;

/**
 * Представляет типы источников элементов Телеграм Паспорт.
 *
 * @link https://core.telegram.org/bots/api#passportelementerror
 */
abstract class PassportElementErrorSource
{
    /**
     * Поле данных.
     *
     * @var string
     */
    const DATA = 'data';

    /**
     * Лицевая сторона документа.
     *
     * @var string
     */
    const FRONT_SIDE = 'front_side';

    /**
     * Обратная сторона документа.
     *
     * @var string
     */
    const REVERSE_SIDE = 'reverse_side';

    /**
     *  Селфи с документом.
     *
     * @var string
     */
    const SELFIE = 'selfie';

    /**
     * Сканированный документа.
     *
     * @var string
     */
    const FILE = 'file';

    /**
     * Список сканированных документов.
     *
     * @var string
     */
    const FILES = 'files';

    /**
     *  Файл с переводом документа.
     *
     * @var string
     */
    const TRANSLATION_FILE = 'translation_file';

    /**
     * Список файлов с переводом документа.
     *
     * @var string
     */
    const TRANSLATION_FILES = 'translation_files';

    /**
     * Неустановленное место.
     *
     * @var string
     */
    const UNSPECIFIED = 'unspecified';

    # # #

    /**
     * Типы источников.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::DATA,
            static::FRONT_SIDE,
            static::REVERSE_SIDE,
            static::SELFIE,
            static::FILE,
            static::FILES,
            static::TRANSLATION_FILE,
            static::TRANSLATION_FILES,
            static::UNSPECIFIED
        ];
    }
}
