<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements\Errors;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет проблему со списком сканированных документов.
 *
 * @link https://core.telegram.org/bots/api#passportelementerrorfiles
 *
 * @method   string getSource()     Источник ошибки.
 * @method   string getType()       Тип элемента Телеграм Паспорт, в котором возникла проблема.
 * @method string[] getFileHashes() Массив хэшей файлов в кодировке Base64.
 * @method   string getMessage()    Сообщение об ошибке.
 *
 * @method $this setType(string $type)               Тип элемента Телеграм Паспорт, в котором возникла проблема.
 * @method $this setFileHashes(string[] $fileHashes) Массив хэшей файлов в кодировке Base64.
 * @method $this setMessage(string $message)         Сообщение об ошибке.
 */
#[Required([
    'source',
    'type',
    'file_hashes',
    'message'
])]
class PassportElementErrorFiles extends PassportElementError
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['source'] = PassportElementErrorSource::FILES;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        string $type, // PassportElementType::class
        string $fileHashes,
        string $message
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
