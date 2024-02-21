<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Query\Inline\Result;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\InlineKeyboardMarkup;
use Manuylenko\Telegram\Bot\Api\Entities\Query\Inline\Content\InputMessageContent;
use Manuylenko\Telegram\Bot\Api\Entities\Query\Inline\InlineQueryResultType;

/**
 * Представляет контакт с номером телефона.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultcontact
 *
 * @method                    string getType()                    Тип результата.
 * @method                    string getId()                      Уникальный идентификатор результата.
 * @method                    string getPhoneNumber()             Телефонный номер контакта.
 * @method                    string getFirstName()               Имя контакта.
 * @method               string|null getLastName()            (+) Фамилия контакта.
 * @method               string|null getVcard()               (+) Дополнительные данные о контакте в виде vCard.
 * @method InlineKeyboardMarkup|null getReplyMarkup()         (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method  InputMessageContent|null getInputMessageContent() (+) Объект содержимого сообщения, которое будет отправлено вместо контакта.
 * @method               string|null getThumbnailUrl()        (+) Url-адрес миниатюры результата.
 * @method                  int|null getThumbnailWidth()      (+) Ширина миниатюры.
 * @method                  int|null getThumbnailHeight()     (+) Высота миниатюры.
 *
 * @method $this setId(string $id)                                                Уникальный идентификатор результата.
 * @method $this setPhoneNumber(string $phoneNumber)                              Телефонный номер контакта.
 * @method $this setFirstName(string $firstName)                                  Имя контакта.
 * @method $this setLastName(string $lastName)                                    Фамилия контакта.
 * @method $this setVcard(string $vcard)                                          Дополнительные данные о контакте в виде vCard.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup)                Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method $this setInputMessageContent(InputMessageContent $inputMessageContent) Объект содержимого сообщения, которое будет отправлено вместо контакта.
 * @method $this setThumbnailUrl(string $thumbnailUrl)                            Url-адрес миниатюры результата.
 * @method $this setThumbnailWidth(int $thumbnailWidth)                           Ширина миниатюры.
 * @method $this setThumbnailHeight(int $thumbnailHeight)                         Высота миниатюры.
 *
 * @see https://en.wikipedia.org/wiki/VCard
 */
#[Required([
    'type',
    'id',
    'phone_number',
    'first_name'
])]
#[Depends([
    'reply_markup' => InlineKeyboardMarkup::class,
    'input_message_content' => InputMessageContent::class
])]
class InlineQueryResultResultContact extends InlineQueryResult
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InlineQueryResultType::CONTACT;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        string $id,
        string $phoneNumber,
        string $firstName,
        ?string $lastName = null,
        ?string $vcard = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?InputMessageContent $inputMessageContent = null,
        ?string $thumbnailUrl = null,
        ?int $thumbnailWidth = null,
        ?int $thumbnailHeight = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
