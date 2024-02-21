<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет одну специальную сущность в тексте сообщения (хэштег, имя пользователя, Url-адрес и т.д.).
 *
 * @link https://core.telegram.org/bots/api#messageentity
 *
 * @method      string getType()              Тип сущности.
 * @method         int getOffset()            Смещение в символах (UTF-16) до начала объекта.
 * @method         int getLength()            Длина объекта в символах (UTF-16).
 * @method string|null getUrl()           (+) Url-адрес, который будет открыт после того, как пользователь нажмет на текст.
 * @method   User|null getUser()          (+) Объект упомянутого пользователя.
 * @method string|null getLanguage()      (+) Используемый в блоке язык программирования.
 * @method string|null getCustomEmojiId() (+) Уникальный идентификатор пользовательского эмоджи.
 *
 * @method $this setType(string $type)                   Тип сущности.
 * @method $this setOffset(int $offset)                  Смещение в символах (UTF-16) до начала объекта.
 * @method $this setLength(int $length)                  Длина объекта в символах (UTF-16).
 * @method $this setUrl(string $url)                     Url-адрес, который будет открыт после того, как пользователь нажмет на текст.
 * @method $this setUser(User $user)                     Объект упомянутого пользователя.
 * @method $this setLanguage(string $language)           Используемый в блоке язык программирования.
 * @method $this setCustomEmojiId(string $customEmojiId) Уникальный идентификатор пользовательского эмоджи.
 */
#[Required([
    'type',
    'offset',
    'length'
])]
#[Depends([
    'user' => User::class
])]
class MessageEntity extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        string $type, // MessageEntityType::class
        int $offset,
        int $length,
        ?string $url = null,
        ?User $user = null,
        ?string $language = null,
        ?string $customEmojiId = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }

    # # #

    /**
     * Упоминание пользователя.
     */
    public function isMention(): bool
    {
        return $this->getType() == MessageEntityType::MENTION;
    }

    /**
     * Хештег.
     */
    public function isHashtag(): bool
    {
        return $this->getType() == MessageEntityType::HASHTAG;
    }

    /**
     * Валютный тег.
     */
    public function isCashtag(): bool
    {
        return $this->getType() == MessageEntityType::CASHTAG;
    }

    /**
     * Команда бота.
     */
    public function isBotCommand(): bool
    {
        return $this->getType() == MessageEntityType::BOT_COMMAND;
    }

    /**
     * Ссылка.
     */
    public function isUrl(): bool
    {
        return $this->getType() == MessageEntityType::URL;
    }

    /**
     * Адрес электронной почты.
     */
    public function isEmail(): bool
    {
        return $this->getType() == MessageEntityType::EMAIL;
    }

    /**
     * Телефонный номер.
     */
    public function isPhoneNumber(): bool
    {
        return $this->getType() == MessageEntityType::PHONE_NUMBER;
    }

    /**
     * Жирный текст.
     */
    public function isBold(): bool
    {
        return $this->getType() == MessageEntityType::BOLD;
    }

    /**
     * Курсивный текст.
     */
    public function isItalic(): bool
    {
        return $this->getType() == MessageEntityType::ITALIC;
    }

    /**
     * Подчеркнутый текст.
     */
    public function isUnderline(): bool
    {
        return $this->getType() == MessageEntityType::UNDERLINE;
    }

    /**
     * Зачеркнутый текст.
     */
    public function isStrikethrough(): bool
    {
        return $this->getType() == MessageEntityType::STRIKETHROUGH;
    }

    /**
     * Спойлер.
     */
    public function isSpoiler(): bool
    {
        return $this->getType() == MessageEntityType::SPOILER;
    }

    /**
     * Строкой программного кода.
     */
    public function isCode(): bool
    {
        return $this->getType() == MessageEntityType::CODE;
    }

    /**
     * Блок программного кода.
     */
    public function isPre(): bool
    {
        return $this->getType() == MessageEntityType::PRE;
    }

    /**
     * Текстовая ссылка.
     */
    public function isTextLink(): bool
    {
        return $this->getType() == MessageEntityType::TEXT_LINK;
    }

    /**
     * Упоминание пользователя.
     * Для пользователей {@link https://telegram.org/blog/edit#new-mentions без псевдонима}.
     */
    public function isTextMention(): bool
    {
        return $this->getType() == MessageEntityType::TEXT_MENTION;
    }

    /**
     * Пользовательский эмоджи-стикер.
     */
    public function isCustomEmoji(): bool
    {
        return $this->getType() == MessageEntityType::CUSTOM_EMOJI;
    }
}
