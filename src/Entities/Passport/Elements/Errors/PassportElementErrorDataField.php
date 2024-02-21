<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements\Errors;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет проблему в одном из полей данных, предоставленных пользователем.
 *
 * @link https://core.telegram.org/bots/api#passportelementerrordatafield
 *
 * @method string getSource()    Источник ошибки.
 * @method string getType()      Тип элемента Телеграм Паспорт, в котором возникла проблема.
 * @method string getFieldName() Имя поля данных, в котором есть ошибка.
 * @method string getDataHash()  Хэш данных в кодировке Base64.
 * @method string getMessage()   Сообщение об ошибке.
 *
 * @method $this setType(string $type)           Тип элемента Телеграм Паспорт, в котором возникла проблема.
 * @method $this setFieldName(string $fieldName) Имя поля данных, в котором есть ошибка.
 * @method $this setDataHash(string $dataHash)   Хэш данных в кодировке Base64.
 * @method $this setMessage(string $message)     Сообщение об ошибке.
 */
#[Required([
    'source',
    'type',
    'field_name',
    'data_hash',
    'message'
])]
class PassportElementErrorDataField extends PassportElementError
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['source'] = PassportElementErrorSource::DATA;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        string $type, // PassportElementType::class
        string $fieldName,
        string $dataHash,
        string $message
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
