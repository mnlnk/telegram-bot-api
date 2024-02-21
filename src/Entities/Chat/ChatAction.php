<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

/**
 * Представляет действия, выполняемые ботом.
 *
 * @link https://core.telegram.org/bots/api#sendchataction
 */
abstract class ChatAction
{
    /**
     * Набор текста.
     *
     * @var string
     */
    const TYPING = 'typing';

    /**
     * Загрузка фото.
     *
     * @var string
     */
    const UPLOAD_PHOTO = 'upload_photo';

    /**
     * Запись видео.
     *
     * @var string
     */
    const RECORD_VIDEO = 'record_video';

    /**
     * Загрузка видео.
     *
     * @var string
     */
    const UPLOAD_VIDEO = 'upload_video';

    /**
     * Запись голосового сообщения.
     *
     * @var string
     */
    const RECORD_VOICE = 'record_voice';

    /**
     * Загрузка голосового сообщения.
     *
     * @var string
     */
    const UPLOAD_VOICE = 'upload_voice';

    /**
     * Загрузка документа (файла).
     *
     * @var string
     */
    const UPLOAD_DOCUMENT = 'upload_document';

    /**
     * Выбор стикера.
     *
     * @var string
     */
    const CHOOSE_STICKER = 'choose_sticker';

    /**
     * Поиск местоположения.
     *
     * @var string
     */
    const FIND_LOCATION = 'find_location';

    /**
     * Запись видео-заметки.
     *
     * @var string
     */
    const RECORD_VIDEO_NOTE = 'record_video_note';

    /**
     * Загрузка видео-заметки.
     *
     * @var string
     */
    const UPLOAD_VIDEO_NOTE = 'upload_video_note';

    # # #

    /**
     * Действия бота в чате.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::TYPING,
            static::UPLOAD_PHOTO,
            static::RECORD_VIDEO,
            static::UPLOAD_VIDEO,
            static::RECORD_VOICE,
            static::UPLOAD_VOICE,
            static::UPLOAD_DOCUMENT,
            static::CHOOSE_STICKER,
            static::FIND_LOCATION,
            static::RECORD_VIDEO_NOTE,
            static::UPLOAD_VIDEO_NOTE
        ];
    }
}
