<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api;

use Manuylenko\Telegram\Bot\Api\Entities\Bot\BotDescription;
use Manuylenko\Telegram\Bot\Api\Entities\Bot\BotName;
use Manuylenko\Telegram\Bot\Api\Entities\Bot\BotShortDescription;
use Manuylenko\Telegram\Bot\Api\Entities\Bot\Commands\BotCommand;
use Manuylenko\Telegram\Bot\Api\Entities\Bot\Commands\Scope\BotCommandScope;
use Manuylenko\Telegram\Bot\Api\Entities\Bot\Menu\MenuButton;
use Manuylenko\Telegram\Bot\Api\Entities\Business\BusinessConnection;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost\UserChatBoosts;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\ChatAdministratorRights;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\ChatFullInfo;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\ChatInviteLink;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\ChatPermissions;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Forum\ForumTopic;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Members\ChatMember;
use Manuylenko\Telegram\Bot\Api\Entities\EntityFactory;
use Manuylenko\Telegram\Bot\Api\Entities\File;
use Manuylenko\Telegram\Bot\Api\Entities\InputFile;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\InlineKeyboardMarkup;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\KeyboardMarkup;
use Manuylenko\Telegram\Bot\Api\Entities\Media\InputMedia;
use Manuylenko\Telegram\Bot\Api\Entities\Media\InputPaidMedia;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Game\GameHighScore;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\LinkPreviewOptions;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Message;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageId;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll\InputPollOption;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll\Poll;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction\Types\ReactionType;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Replies\ReplyParameters;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers\InputSticker;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers\MaskPosition;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers\Sticker;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers\StickerSet;
use Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements\Errors\PassportElementError;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\LabeledPrice;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\ShippingOption;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\Stars\StarTransactions;
use Manuylenko\Telegram\Bot\Api\Entities\Query\Inline\Result\InlineQueryResult;
use Manuylenko\Telegram\Bot\Api\Entities\Query\InlineQueryResultsButton;
use Manuylenko\Telegram\Bot\Api\Entities\SentWebAppMessage;
use Manuylenko\Telegram\Bot\Api\Entities\Update;
use Manuylenko\Telegram\Bot\Api\Entities\User;
use Manuylenko\Telegram\Bot\Api\Entities\UserProfilePhotos;
use Manuylenko\Telegram\Bot\Api\Entities\WebhookInfo;
use Manuylenko\Telegram\Bot\Api\Exceptions\ResponseException;
use Manuylenko\Telegram\Bot\Api\Exceptions\TelegramBotException;
use Manuylenko\Telegram\Bot\Api\Helpers\Request;
use Manuylenko\Telegram\Bot\Api\Helpers\Utils;

/**
 * Класс API.
 *
 * @link https://core.telegram.org/bots/api-changelog#october-31-2024
 */
class Api
{
    /**
     * Текущая версия Bot API.
     */
    const BOT_API_VERSION = '7.11';

    /**
     * Url запроса.
     */
    const REQUEST_URL = 'https://api.telegram.org/bot';

    /**
     * Url для получения пути к файлу.
     */
    const REQUEST_URL_FILE = 'https://api.telegram.org/file/bot';


    /**
     * Токен бота.
     */
    protected string $token;


    /**
     * Конструктор.
     */
    public function __construct(string $token)
    {
        if (empty($token)) {
            throw new TelegramBotException("Не указан токен бота");
        }

        if (! preg_match('/^\d+:[\w-]+$/', $token)) {
            throw new TelegramBotException("Указан не корректный токен бота");
        }

        $this->token = $token;
    }

    /**
     * Вызывает метод Bot API.
     */
    protected function call(array $params = [], array $toJson = []): array|string|int|float|bool
    {
        $method = debug_backtrace(2, 2)[1]['function'];

        if (!empty($params)) {
            $params = Utils::getFuncArgs(static::class, $method, $params);

            foreach ($toJson as $key) {
                if (isset($params[$key])) {
                    $params[$key] = Utils::toJson($params[$key]);
                }
            }
        }

        $response = (new Request(Api::REQUEST_URL.$this->token.'/'.$method))->send($params);

        if (!$response->getOk()) {
            throw new ResponseException($response);
        }

        return $response->getResult();
    }

    /**
     * Результат вызова является сообщением или булевым значением.
     */
    protected function returnMessageOrBool(array|bool $data): Message|bool
    {
        return is_array($data) ? EntityFactory::make(Message::class, $data) : $data;
    }

    # # #

    #region Updates

    /**
     * Получает массив входящих обновлений.
     *
     * @link https://core.telegram.org/bots/api#getupdates
     *
     * @param ?string[] $allowedUpdates
     *
     * @return Update[]
     */
    public function getUpdates(
        ?int $offset = null,
        ?int $limit = null, // 1-100 (100)
        ?int $timeout = null, // (0)
        ?array $allowedUpdates = null // UpdateType::class
    ): array
    {
        return EntityFactory::makeArray(Update::class, $this->call(func_get_args(), [
            'allowed_updates'
        ]));
    }

    /**
     * Получает информацию о текущем статусе Webhook.
     *
     * @link https://core.telegram.org/bots/api#getwebhookinfo
     */
    public function getWebhookInfo(): WebhookInfo
    {
        return EntityFactory::make(WebhookInfo::class, $this->call());
    }

    /**
     * Указывает URL-адрес для получения входящих обновлений через исходящий веб-хук.
     *
     * @link https://core.telegram.org/bots/api#setwebhook
     *
     * @param ?string[] $allowedUpdates
     */
    public function setWebhook(
        string $url, // https
        ?InputFile $certificate = null,
        ?string $ipAddress = null,
        ?int $maxConnections = null, // 1-100 (40)
        ?array $allowedUpdates = null, // UpdateType::class
        ?bool $dropPendingUpdates = null,
        ?string $secretToken = null // 1-256, [A-Za-z0-9_-]+
    ): bool
    {
        return $this->call(func_get_args(), [
            'allowed_updates'
        ]);
    }

    /**
     * Удаляет интеграцию Webhook.
     *
     * @link https://core.telegram.org/bots/api#deletewebhook
     */
    public function deleteWebhook(
        ?bool $dropPendingUpdates = null
    ): bool
    {
        return $this->call(func_get_args());
    }

    #endregion

    #region Chats

    /**
     * Получает основную информацию о чате.
     *
     * @link https://core.telegram.org/bots/api#getchat
     */
    public function getChat(
        int|string $chatId
    ): ChatFullInfo
    {
        return EntityFactory::make(ChatFullInfo::class, $this->call(func_get_args()));
    }

    /**
     * Получает список бустов, добавленных пользователем в чат канала.
     *
     * @link https://core.telegram.org/bots/api#getuserchatboosts
     */
    public function getUserChatBoosts(
        int|string $chatId,
        int $userId
    ): UserChatBoosts
    {
        return EntityFactory::make(UserChatBoosts::class, $this->call(func_get_args()));
    }

    /**
     * Сообщает пользователю, что что-то происходит на стороне бота.
     *
     * @link https://core.telegram.org/bots/api#sendchataction
     */
    public function sendChatAction(
        int|string $chatId,
        string $action, // ChatAction::class
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Добавляет сообщение в список закрепленных сообщений чата.
     *
     * @link https://core.telegram.org/bots/api#pinchatmessage
     */
    public function pinChatMessage(
        int|string $chatId,
        int $messageId,
        ?bool $disableNotification = null,
        ?string $businessConnectionId = null
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Удаляет сообщение из списка закрепленных сообщений в чате.
     *
     * @link https://core.telegram.org/bots/api#unpinchatmessage
     */
    public function unpinChatMessage(
        int|string $chatId,
        ?int $messageId = null,
        ?string $businessConnectionId = null
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Очищает список закрепленных сообщений в чате.
     *
     * @link https://core.telegram.org/bots/api#unpinallchatmessages
     */
    public function unpinAllChatMessages(
        int|string $chatId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Создает новую ссылку для приглашения в чат.
     *
     * @link https://core.telegram.org/bots/api#exportchatinvitelink
     */
    public function exportChatInviteLink(
        int|string $chatId
    ): string
    {
        return $this->call(func_get_args());
    }

    /**
     * Отзывает пригласительную ссылку созданную ботом.
     *
     * @link https://core.telegram.org/bots/api#revokechatinvitelink
     */
    public function revokeChatInviteLink(
        int|string $chatId,
        string $inviteLink
    ): ChatInviteLink
    {
        return EntityFactory::make(ChatInviteLink::class, $this->call(func_get_args()));
    }

    /**
     * Создает дополнительную ссылку для приглашения в чат.
     *
     * @link https://core.telegram.org/bots/api#createchatinvitelink
     */
    public function createChatInviteLink(
        int|string $chatId,
        ?string $name = null, // 0-32
        ?int $expireDate = null,
        ?int $memberLimit = null, // 1-99999
        ?bool $createsJoinRequest = null
    ): ChatInviteLink
    {
        return EntityFactory::make(ChatInviteLink::class, $this->call(func_get_args()));
    }

    /**
     * Редактирует дополнительную пригласительную ссылку, созданную ботом.
     *
     * @link https://core.telegram.org/bots/api#editchatinvitelink
     */
    public function editChatInviteLink(
        int|string $chatId,
        string $inviteLink,
        ?string $name = null, // 0-32
        ?int $expireDate = null,
        ?int $memberLimit = null, // 1-99999
        ?bool $createsJoinRequest = null
    ): ChatInviteLink
    {
        return EntityFactory::make(ChatInviteLink::class, $this->call(func_get_args()));
    }

    /**
     * Создает ссылку-приглашение на подписку для канала.
     *
     * @link https://core.telegram.org/bots/api#createchatsubscriptioninvitelink
     */
    public function createChatSubscriptionInviteLink(
        int|string $chatId,
        int $subscriptionPeriod,
        int $subscriptionPrice, // 1-2500
        ?string $name = null // 0-32
    ): ChatInviteLink
    {
        return EntityFactory::make(ChatInviteLink::class, $this->call(func_get_args()));
    }

    /**
     * Редактирует ссылку-приглашение на подписку для канала.
     *
     * @link https://core.telegram.org/bots/api#editchatsubscriptioninvitelink
     */
    public function editChatSubscriptionInviteLink(
        int|string $chatId,
        string $inviteLink,
        ?string $name = null // 0-32
    ): ChatInviteLink
    {
        return EntityFactory::make(ChatInviteLink::class, $this->call(func_get_args()));
    }

    /**
     * Одобряет запрос на присоединение пользователя к чату.
     *
     * @link https://core.telegram.org/bots/api#approvechatjoinrequest
     */
    public function approveChatJoinRequest(
        int|string $chatId,
        int $userId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Отклоняет запрос на присоединение пользователя к чату.
     *
     * @link https://core.telegram.org/bots/api#declinechatjoinrequest
     */
    public function declineChatJoinRequest(
        int|string $chatId,
        int $userId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Бот выходит из группы, супергруппы или канала.
     *
     * @link https://core.telegram.org/bots/api#leavechat
     */
    public function leaveChat(
        int|string $chatId
    ): bool
    {
        return $this->call(func_get_args());
    }

    #endregion

    #region ChatUsers

    /**
     * Получает количество участников в чате.
     *
     * @link https://core.telegram.org/bots/api#getchatmembercount
     */
    public function getChatMemberCount(
        int|string $chatId
    ): int
    {
        return $this->call(func_get_args());
    }

    /**
     * Получает информацию об участнике чата.
     *
     * @link https://core.telegram.org/bots/api#getchatmember
     */
    public function getChatMember(
        int|string $chatId,
        int $userId
    ): ChatMember
    {
        return EntityFactory::make(ChatMember::class, $this->call(func_get_args()));
    }

    /**
     * Получает список администраторов чата.
     *
     * @link https://core.telegram.org/bots/api#getchatadministrators
     *
     * @return ChatMember[]
     */
    public function getChatAdministrators(
        int|string $chatId
    ): array
    {
        return EntityFactory::makeArray(ChatMember::class, $this->call(func_get_args()));
    }

    /**
     * Ограничивает пользователя в супергруппе.
     *
     * @link https://core.telegram.org/bots/api#restrictchatmember
     */
    public function restrictChatMember(
        int|string $chatId,
        int $userId,
        ChatPermissions $permissions,
        ?bool $useIndependentChatPermissions = null,
        ?int $untilDate = null
    ): bool
    {
        return $this->call(func_get_args(), [
            'permissions'
        ]);
    }

    /**
     * Изменяет права пользователя в супергруппе или канале.
     *
     * @link https://core.telegram.org/bots/api#promotechatmember
     */
    public function promoteChatMember(
        int|string $chatId,
        int $userId,
        ?bool $isAnonymous = null,
        ?bool $canManageChat = null,
        ?bool $canDeleteMessages = null,
        ?bool $canManageVideoChats = null,
        ?bool $canRestrictMembers = null,
        ?bool $canPromoteMembers = null,
        ?bool $canChangeInfo = null,
        ?bool $canInviteUsers = null,
        ?bool $canPostMessages = null,
        ?bool $canEditMessages = null,
        ?bool $canPinMessages = null,
        ?bool $canPostStories = null,
        ?bool $canEditStories = null,
        ?bool $canDeleteStories = null,
        ?bool $canManageTopics = null
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Блокирует пользователя в группе, супергруппе или канале.
     *
     * @link https://core.telegram.org/bots/api#banchatmember
     */
    public function banChatMember(
        int|string $chatId,
        int $userId,
        ?int $untilDate = null,
        ?bool $revokeMessages = null,
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Разблокирует ранее заблокированного пользователя в супергруппе или канале.
     *
     * @link https://core.telegram.org/bots/api#unbanchatmember
     */
    public function unbanChatMember(
        int|string $chatId,
        int $userId,
        ?bool $onlyIfBanned = null
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Блокирует чат канала в супергруппе или на канале.
     *
     * @link https://core.telegram.org/bots/api#banchatsenderchat
     */
    public function banChatSenderChat(
        int|string $chatId,
        int $senderChatId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Разблокирует канальный чат в супергруппе или на канале.
     *
     * @link https://core.telegram.org/bots/api#unbanchatsenderchat
     */
    public function unbanChatSenderChat(
        int|string $chatId,
        int $senderChatId
    ): bool
    {
        return $this->call(func_get_args());
    }

    #endregion

    #region ChatSettings

    /**
     * Получает текущее значение кнопки меню бота.
     *
     * @link https://core.telegram.org/bots/api#getchatmenubutton
     */
    public function getChatMenuButton(
        ?int $chatId = null
    ): MenuButton
    {
        return EntityFactory::make(MenuButton::class, $this->call(func_get_args()));
    }

    /**
     * Устанавливает заголовок чата.
     *
     * @link https://core.telegram.org/bots/api#setchattitle
     */
    public function setChatTitle(
        int|string $chatId,
        string $title // 1-128
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Устанавливает фотографию чата.
     *
     * @link https://core.telegram.org/bots/api#setchatphoto
     */
    public function setChatPhoto(
        int|string $chatId,
        InputFile $photo
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Устанавливает описание группы, супергруппы или канала.
     *
     * @link https://core.telegram.org/bots/api#setchatdescription
     */
    public function setChatDescription(
        int|string $chatId,
        ?string $description = null // 0-255
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Устанавливает разрешения по умолчанию для всех участников.
     *
     * @link https://core.telegram.org/bots/api#setchatpermissions
     */
    public function setChatPermissions(
        int|string $chatId,
        ChatPermissions $permissions,
        ?bool $useIndependentChatPermissions = null
    ): bool
    {
        return $this->call(func_get_args(), [
            'permissions'
        ]);
    }

    /**
     * Устанавливает пользовательское название (роль) для администратора в супергруппе.
     *
     * @link https://core.telegram.org/bots/api#setchatadministratorcustomtitle
     */
    public function setChatAdministratorCustomTitle(
        int|string $chatId,
        int $userId,
        string $customTitle // 0-16
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Изменяет кнопку меню бота в приватном чате или кнопку меню по умолчанию.
     *
     * @link https://core.telegram.org/bots/api#setchatmenubutton
     */
    public function setChatMenuButton(
        ?int $chatId = null,
        ?MenuButton $menuButton = null
    ): bool
    {
        return $this->call(func_get_args(), [
            'menu_button'
        ]);
    }

    /**
     * Удаляет фотографию чата.
     *
     * @link https://core.telegram.org/bots/api#deletechatphoto
     */
    public function deleteChatPhoto(
        int|string $chatId
    ): bool
    {
        return $this->call(func_get_args());
    }

    #endregion

    #region Forums

    /**
     * Создает тему форума в чате супергруппы.
     *
     * @link https://core.telegram.org/bots/api#createforumtopic
     */
    public function createForumTopic(
        int|string $chatId,
        string $name, // 1-128
        ?int $iconColor = null, // IconColor::class
        ?string $iconCustomEmojiId = null
    ): ForumTopic
    {
        return EntityFactory::make(ForumTopic::class, $this->call(func_get_args()));
    }

    /**
     * Редактирует название и значек темы форума в чате супергруппы.
     *
     * @link https://core.telegram.org/bots/api#editforumtopic
     */
    public function editForumTopic(
        int|string $chatId,
        int $messageThreadId,
        ?string $name = null, // 0-128
        ?string $iconCustomEmojiId = null
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Закрывает тему форума в чате супергруппы.
     *
     * @link https://core.telegram.org/bots/api#closeforumtopic
     */
    public function closeForumTopic(
        int|string $chatId,
        int $messageThreadId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Открывает закрытую ранее тему форума в чате супергруппы.
     *
     * @link https://core.telegram.org/bots/api#reopenforumtopic
     */
    public function reopenForumTopic(
        int|string $chatId,
        int $messageThreadId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Удаляет тему форума вместе со всеми ее сообщениями в чате супергруппы.
     *
     * @link https://core.telegram.org/bots/api#deleteforumtopic
     */
    public function deleteForumTopic(
        int|string $chatId,
        int $messageThreadId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Очисщает список закрепленных сообщений в теме форума.
     *
     * @link https://core.telegram.org/bots/api#unpinallforumtopicmessages
     */
    public function unpinAllForumTopicMessages(
        int|string $chatId,
        int $messageThreadId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Редактирует название "Основной" темы форума в чате супергруппы.
     *
     * @link https://core.telegram.org/bots/api#editgeneralforumtopic
     */
    public function editGeneralForumTopic(
        int|string $chatId,
        string $name // 1-128
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Закрывает открытую "Основную" тему форума в чате супергруппы.
     *
     * @link https://core.telegram.org/bots/api#closegeneralforumtopic
     */
    public function closeGeneralForumTopic(
        int|string $chatId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Повторно открывает закрытую "Основную" тему форума в чате супергруппы.
     *
     * @link https://core.telegram.org/bots/api#reopengeneralforumtopic
     */
    public function reopenGeneralForumTopic(
        int|string $chatId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Скрывает "Основную" тему форума в чате супергруппы.
     *
     * @link https://core.telegram.org/bots/api#hidegeneralforumtopic
     */
    public function hideGeneralForumTopic(
        int|string $chatId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Отображает скрытую "Основную" тему в чате супергруппы форума.
     *
     * @link https://core.telegram.org/bots/api#unhidegeneralforumtopic
     */
    public function unhideGeneralForumTopic(
        int|string $chatId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Очищает список закрепленных сообщений в "Основной" теме форума.
     *
     * @link https://core.telegram.org/bots/api#unpinallgeneralforumtopicmessages
     */
    public function unpinAllGeneralForumTopicMessages(
        int|string $chatId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Получает список собственных стикеров для использования в качестве значков темы форума в чате супергруппы.
     *
     * @link https://core.telegram.org/bots/api#getforumtopiciconstickers
     *
     * @return Sticker[]
     */
    public function getForumTopicIconStickers(): array
    {
        return EntityFactory::makeArray(Sticker::class, $this->call());
    }

    #endregion

    #region Messages

    /**
     * Отправляет текстовое сообщение.
     *
     * @link https://core.telegram.org/bots/api#sendmessage
     *
     * @param ?MessageEntity[] $entities
     */
    public function sendMessage(
        int|string $chatId,
        string $text, // 1-4096
        ?string $parseMode = null, // ParseMode::class
        ?array $entities = null,
        ?LinkPreviewOptions $linkPreviewOptions  = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'link_preview_options',
            'entities',
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет аудио-файл.
     *
     * @link https://core.telegram.org/bots/api#sendaudio
     *
     * @param ?MessageEntity[] $captionEntities
     */
    public function sendAudio(
        int|string $chatId,
        InputFile|string $audio,
        ?string $caption = null, // 0-1024
        ?string $parseMode = null, // ParseMode::class
        ?array $captionEntities = null,
        ?int $duration = null,
        ?string $performer = null,
        ?string $title = null,
        InputFile|string|null $thumbnail = null, // JPEG, <= 200kB, <= 320x320
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'caption_entities',
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет анимацию.
     *
     * @link https://core.telegram.org/bots/api#sendanimation
     *
     * @param ?MessageEntity[] $captionEntities
     */
    public function sendAnimation(
        int|string $chatId,
        InputFile|string $animation,
        ?int $duration = null,
        ?int $width = null,
        ?int $height = null,
        InputFile|string|null $thumbnail = null, // JPEG, <= 200kB, <= 320x320
        ?string $caption = null, // 0-1024
        ?string $parseMode = null, // ParseMode::class
        ?array $captionEntities = null,
        ?bool $showCaptionAboveMedia = null,
        ?bool $hasSpoiler = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'caption_entities',
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет видео.
     *
     * @link https://core.telegram.org/bots/api#sendvideo
     *
     * @param ?MessageEntity[] $captionEntities
     */
    public function sendVideo(
        int|string $chatId,
        InputFile|string $video,
        ?int $duration = null,
        ?int $width = null,
        ?int $height = null,
        InputFile|string|null $thumbnail = null, // JPEG, <= 200kB, <= 320x320
        ?string $caption = null, // 0-1024
        ?string $parseMode = null, // ParseMode::class
        ?array $captionEntities = null,
        ?bool $showCaptionAboveMedia = null,
        ?bool $hasSpoiler = null,
        ?bool $supportsStreaming = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'caption_entities',
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет контакт.
     *
     * @link https://core.telegram.org/bots/api#sendcontact
     */
    public function sendContact(
        int|string $chatId,
        string $phoneNumber,
        string $firstName,
        ?string $lastName = null,
        ?string $vcard = null, // 0-2048
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет игральную кость, которая отображает случайное значение.
     *
     * @link https://core.telegram.org/bots/api#senddice
     */
    public function sendDice(
        int|string $chatId,
        ?string $emoji = null, // DEmoji::class
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет файл (документ).
     *
     * @link https://core.telegram.org/bots/api#senddocument
     *
     * @param ?MessageEntity[] $captionEntities
     */
    public function sendDocument(
        int|string $chatId,
        InputFile|string $document,
        InputFile|string|null $thumbnail = null, // JPEG, <= 200kB, <= 320x320
        ?string $caption = null, // 0-1024
        ?string $parseMode = null, // ParseMode::class
        ?array $captionEntities = null,
        ?bool $disableContentTypeDetection = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'caption_entities',
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет платные медиа в чат канала.
     *
     * @link https://core.telegram.org/bots/api#sendpaidmedia
     *
     * @param InputPaidMedia[] $media
     * @param MessageEntity[]|null $captionEntities
     */
    public function sendPaidMedia(
        int|string $chatId,
        int $starCount,
        array $media, // <= 10
        ?string $payload = null, // 0-128
        ?string $caption = null, // 0-1024
        ?string $parseMode = null, // ParseMode::class
        ?array $captionEntities = null,
        ?bool $showCaptionAboveMedia = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'media',
            'caption_entities',
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет группу фотографий, видео, документов или аудио в виде альбома.
     *
     * @link https://core.telegram.org/bots/api#sendmediagroup
     *
     * @param InputMedia[] $media
     *
     * @return Message[]
     */
    public function sendMediaGroup(
        int|string $chatId,
        array $media, // 2-10
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?string $businessConnectionId = null
    ): array
    {
        return EntityFactory::makeArray(Message::class, $this->call(func_get_args(), [
            'media',
            'reply_parameters'
        ]));
    }

    /**
     * Отправляет фотографию.
     *
     * @link https://core.telegram.org/bots/api#sendphoto
     *
     * @param ?MessageEntity[] $captionEntities
     */
    public function sendPhoto(
        int|string $chatId,
        InputFile|string $photo, // <= 10mB, W+H <= 10000, W/H <= 20
        ?string $caption = null, // 0-1024
        ?string $parseMode = null, // ParseMode::class
        ?array $captionEntities = null,
        ?bool $showCaptionAboveMedia = null,
        ?bool $hasSpoiler = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'caption_entities',
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет видеозаметку.
     *
     * @link https://core.telegram.org/bots/api#sendvideonote
     */
    public function sendVideoNote(
        int|string $chatId,
        InputFile|string $videoNote,
        ?int $duration = null,
        ?int $length = null,
        InputFile|string|null $thumbnail = null, // JPEG, <= 200kB, <= 320x320
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет голосовую заметку.
     *
     * @link https://core.telegram.org/bots/api#sendvoice
     *
     * @param ?MessageEntity[] $captionEntities
     */
    public function sendVoice(
        int|string $chatId,
        InputFile|string $voice,
        ?string $caption = null, // 0-1024
        ?string $parseMode = null, // ParseMode::class
        ?array $captionEntities = null,
        ?int $duration = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'caption_entities',
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет информацию о месте встречи.
     *
     * @link https://core.telegram.org/bots/api#sendvenue
     */
    public function sendVenue(
        int|string $chatId,
        float $latitude,
        float $longitude,
        string $title,
        string $address,
        ?string $foursquareId = null,
        ?string $foursquareType = null,
        ?string $googlePlaceId = null,
        ?string $googlePlaceType = null, // https://developers.google.com/maps/documentation/places/web-service/supported_types
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет местоположение.
     *
     * @link https://core.telegram.org/bots/api#sendlocation
     */
    public function sendLocation(
        int|string $chatId,
        float $latitude,
        float $longitude,
        ?float $horizontalAccuracy = null, // 0-1500
        ?int $livePeriod = null, // 60-86400
        ?int $heading = null, // 1-360
        ?int $proximityAlertRadius = null, // 1-100000
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Отправляет опрос.
     *
     * @link https://core.telegram.org/bots/api#sendpoll
     *
     * @param InputPollOption[] $options
     * @param ?MessageEntity[] $questionEntities
     * @param ?MessageEntity[] $explanationEntities
     */
    public function sendPoll(
        int|string $chatId,
        string $question, // 1-300
        array $options, // 2-10
        ?bool $isAnonymous = null,
        ?string $questionParseMode = null, // ParseMode::class
        ?array $questionEntities = null,
        ?string $type = null, // PollType::class
        ?bool $allowsMultipleAnswers = null,
        ?int $correctOptionId = null, // 0..
        ?string $explanation = null, // 0-200, <= \n
        ?string $explanationParseMode = null,
        ?array $explanationEntities = null,
        ?int $openPeriod = null, // 5-600
        ?int $closeDate = null, // time() + [5-600]
        ?bool $isClosed = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?int $messageThreadId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'options',
            'question_entities',
            'explanation_entities',
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Пересылает сообщение.
     *
     * @link https://core.telegram.org/bots/api#forwardmessage
     */
    public function forwardMessage(
        int|string $chatId,
        int|string $fromChatId,
        int $messageId,
        ?int $messageThreadId = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args()));
    }

    /**
     * Пересылает несколько сообщений любого типа.
     * Если некоторые из указанных сообщений не удается найти или переслать, они пропускаются.
     *
     * @link https://core.telegram.org/bots/api#forwardmessages
     *
     * @param int[] $messageIds
     *
     * @return MessageId[]
     */
    public function forwardMessages(
        int|string $chatId,
        int|string $fromChatId,
        array $messageIds, // 1-100
        ?int $messageThreadId = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null
    ): array
    {
        return EntityFactory::makeArray(MessageId::class, $this->call(func_get_args(), [
            'message_ids'
        ]));
    }

    /**
     * Копирует сообщение.
     *
     * @link https://core.telegram.org/bots/api#copymessage
     *
     * @param ?MessageEntity[] $captionEntities
     */
    public function copyMessage(
        int|string $chatId,
        int|string $fromChatId,
        int $messageId,
        ?int $messageThreadId = null,
        ?string $caption = null, // 0-1024
        ?string $parseMode = null, // ParseMode::class
        ?array $captionEntities = null,
        ?bool $showCaptionAboveMedia = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null
    ): MessageId
    {
        return EntityFactory::make(MessageId::class, $this->call(func_get_args(), [
            'caption_entities',
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Копирует несколько сообщений.
     *
     * @link https://core.telegram.org/bots/api#copymessages
     *
     * @param int[] $messageIds
     *
     * @return MessageId[]
     */
    public function copyMessages(
        int|string $chatId,
        int|string $fromChatId,
        array $messageIds, // 1-100
        ?int $messageThreadId = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $removeCaption = null
    ): array
    {
        return EntityFactory::makeArray(MessageId::class, $this->call(func_get_args(), [
            'message_ids'
        ]));
    }

    #endregion

    #region EditingMessages

    /**
     * Редактирует текстовое или игровое сообщение.
     *
     * @link https://core.telegram.org/bots/api#editmessagetext
     *
     * @param ?MessageEntity[] $entities
     */
    public function editMessageText(
        string $text, // 1-4096
        int|string|null $chatId = null, // !$inlineMessageId
        ?int $messageId = null, // !$inlineMessageId
        ?string $inlineMessageId = null, // !$chatId && !$messageId
        ?string $parseMode = null, // ParseMode::class
        ?array $entities = null,
        ?string $businessConnectionId = null,
        ?LinkPreviewOptions $linkPreviewOptions  = null,
        ?InlineKeyboardMarkup $replyMarkup = null
    ): Message|bool
    {
        return $this->returnMessageOrBool($this->call(func_get_args(), [
            'entities',
            'link_preview_options',
            'reply_markup'
        ]));
    }

    /**
     * Редактирует подпись сообщения.
     *
     * @link https://core.telegram.org/bots/api#editmessagecaption
     *
     * @param ?MessageEntity[] $captionEntities
     */
    public function editMessageCaption(
        string $caption, // 0-1024
        int|string|null $chatId = null, // !$inlineMessageId
        ?int $messageId = null, // !$inlineMessageId
        ?string $inlineMessageId = null, // !$chatId && !$messageId
        ?string $parseMode = null, // ParseMode::class
        ?array $captionEntities = null,
        ?bool $showCaptionAboveMedia = null,
        ?string $businessConnectionId = null,
        ?InlineKeyboardMarkup $replyMarkup = null
    ): Message|bool
    {
        return $this->returnMessageOrBool($this->call(func_get_args(), [
            'caption_entities',
            'reply_markup'
        ]));
    }

    /**
     * Редактирует мультимедийное сообщение.
     *
     * @link https://core.telegram.org/bots/api#editmessagemedia
     */
    public function editMessageMedia(
        InputMedia $media,
        int|string|null $chatId = null, // !$inlineMessageId
        ?int $messageId = null, // !$inlineMessageId
        ?string $inlineMessageId = null, // !$chatId && !$messageId
        ?string $businessConnectionId = null,
        ?InlineKeyboardMarkup $replyMarkup = null
    ): Message|bool
    {
        return $this->returnMessageOrBool($this->call(func_get_args(), [
            'media',
            'reply_markup'
        ]));
    }

    /**
     * Редактирует клавиатуру сообщения.
     *
     * @link https://core.telegram.org/bots/api#editmessagereplymarkup
     */
    public function editMessageReplyMarkup(
        int|string|null $chatId = null, // !$inlineMessageId
        ?int $messageId = null, // !$inlineMessageId
        ?string $inlineMessageId = null, // !$chatId && !$messageId
        ?string $businessConnectionId = null,
        ?InlineKeyboardMarkup $replyMarkup = null
    ): Message|bool
    {
        return $this->returnMessageOrBool($this->call(func_get_args(), [
            'reply_markup'
        ]));
    }

    /**
     * Редактирует сообщение о местоположении в реальном времени.
     *
     * @link https://core.telegram.org/bots/api#editmessagelivelocation
     */
    public function editMessageLiveLocation(
        float $latitude,
        float $longitude,
        int|string|null $chatId = null, // !$inlineMessageId
        ?int $messageId = null, // !$inlineMessageId
        ?string $inlineMessageId = null, // !$chatId && !$messageId
        ?int $livePeriod = null, // <= 24 * 60 * 60 (24 часа)
        ?float $horizontalAccuracy = null, // 0-1500
        ?int $heading = null, // 1-360
        ?int $proximityAlertRadius = null, // 1-100000
        ?string $businessConnectionId = null,
        ?InlineKeyboardMarkup $replyMarkup = null
    ): Message|bool
    {
        return $this->returnMessageOrBool($this->call(func_get_args(), [
            'reply_markup'
        ]));
    }

    /**
     * Останавливает обновление сообщения о текущем местоположении.
     *
     * @link https://core.telegram.org/bots/api#stopmessagelivelocation
     */
    public function stopMessageLiveLocation(
        int|string|null $chatId = null, // !$inlineMessageId
        ?int $messageId = null, // !$inlineMessageId
        ?string $inlineMessageId = null, // !$chatId && !$messageId
        ?string $businessConnectionId = null,
        ?InlineKeyboardMarkup $replyMarkup = null
    ): Message|bool
    {
        return $this->returnMessageOrBool($this->call(func_get_args(), [
            'reply_markup'
        ]));
    }

    /**
     * Останавливает отправленный ранее опрос.
     *
     * @link https://core.telegram.org/bots/api#stoppoll
     */
    public function stopPoll(
        int|string $chatId,
        int $messageId,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Poll
    {
        return EntityFactory::make(Poll::class, $this->call(func_get_args(), [
            'reply_markup'
        ]));
    }

    /**
     * Удаляет сообщение.
     *
     * @link https://core.telegram.org/bots/api#deletemessage
     */
    public function deleteMessage(
        int|string $chatId,
        int $messageId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Удаляет нескольких сообщений одновременно.
     * Если некоторые из указанных сообщений не удается найти, они пропускаются.
     *
     * @link https://core.telegram.org/bots/api#deletemessages
     *
     * @param int[] $messageIds
     */
    public function deleteMessages(
        int|string $chatId,
        array $messageIds // 1-100
    ): bool
    {
        return $this->call(func_get_args(), [
            'message_ids'
        ]);
    }

    #endregion

    #region Reactions

    /**
     * Изменяет выбранные реакции у сообщения.
     *
     * @link https://core.telegram.org/bots/api#setmessagereaction
     *
     * @param ReactionType[] $reaction
     */
    public function setMessageReaction(
        int|string $chatId,
        int $messageId,
        ?array $reaction = null,
        ?bool $isBig = null
    ): bool
    {
        return $this->call(func_get_args(), [
            'reaction'
        ]);
    }

    #endregion

    #region Games

    /**
     * Отправляет игру.
     *
     * @link https://core.telegram.org/bots/api#sendgame
     */
    public function sendGame(
        int $chatId,
        string $gameShortName,
        ?int $messageThreadId = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Получает данные из таблицы рекордов.
     *
     * @link https://core.telegram.org/bots/api#getgamehighscores
     *
     * @return GameHighScore[]
     */
    public function getGameHighScores(
        int $userId,
        ?int $chatId = null, // !$inlineMessageId
        ?int $messageId = null, // !$inlineMessageId
        ?string $inlineMessageId = null // !$chatId && !$messageId
    ): array
    {
        return EntityFactory::makeArray(GameHighScore::class, $this->call(func_get_args()));
    }

    /**
     * Устанавливает счет пользователя в игре.
     *
     * @link https://core.telegram.org/bots/api#setgamescore
     */
    public function setGameScore(
        int $userId,
        int $score, // <= 0
        ?bool $force = null,
        ?bool $disableEditMessage = null,
        ?int $chatId = null, // !$inlineMessageId
        ?int $messageId = null, // !$inlineMessageId
        ?string $inlineMessageId = null // !$chatId && !$messageId
    ): Message|bool
    {
        return $this->returnMessageOrBool($this->call(func_get_args()));
    }

    #endregion

    #region Stickers

    /**
     * Отправляет стикер.
     *
     * @link https://core.telegram.org/bots/api#sendsticker
     */
    public function sendSticker(
        int|string $chatId,
        InputFile|string $sticker, // WEBP|TGS|WEBM
        ?string $emoji = null,
        ?int $messageThreadId = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        ?KeyboardMarkup $replyMarkup = null,
        ?string $businessConnectionId = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Получает набор стикеров.
     *
     * @link https://core.telegram.org/bots/api#getstickerset
     */
    public function getStickerSet(
        string $name
    ): StickerSet
    {
        return EntityFactory::make(StickerSet::class, $this->call(func_get_args()));
    }

    /**
     * Получает информацию о пользовательских эмоджи стикерах по их идентификаторам.
     *
     * @link https://core.telegram.org/bots/api#getcustomemojistickers
     *
     * @param string[] $customEmojiIds
     *
     * @return Sticker[]
     */
    public function getCustomEmojiStickers(
        array $customEmojiIds // 1-200
    ): array
    {
        return EntityFactory::makeArray(Sticker::class, $this->call(func_get_args()));
    }

    /**
     * Загружает файл со стикером для последующего использования в методах {@link createNewStickerSet()} и {@link addStickerToSet()}
     *
     * @link https://core.telegram.org/bots/api#uploadstickerfile
     */
    public function uploadStickerFile(
        int $userId,
        InputFile $sticker, // WEBP|PNG|TGS|WEBM
        string $stickerFormat // StickerFormat:class
    ): File
    {
        return EntityFactory::make(File::class, $this->call(func_get_args()));
    }

    /**
     * Создает новый набор стикеров, принадлежащий пользователю.
     *
     * @link https://core.telegram.org/bots/api#createnewstickerset
     *
     * @param InputSticker[] $stickers
     */
    public function createNewStickerSet(
        int $userId,
        string $name, // 1-64, [A-Za-z0-9_]+_by_<bot_username>
        string $title, // 1-64
        array $stickers, // 1-50
        ?string $stickerType = null, // StickerType:class
        ?bool $needsRepainting = null
    ): bool
    {
        return $this->call(func_get_args(), [
            'stickers'
        ]);
    }

    /**
     * Добавляет новый стикер в набор, созданный ботом.
     *
     * @link https://core.telegram.org/bots/api#addstickertoset
     */
    public function addStickerToSet(
        int $userId,
        string $name,
        InputSticker $sticker,
    ): bool
    {
        return $this->call(func_get_args(), [
            'sticker'
        ]);
    }

    /**
     * Перемещает стикер в наборе, созданном ботом, в определенное место.
     *
     * @link https://core.telegram.org/bots/api#setstickerpositioninset
     */
    public function setStickerPositionInSet(
        string $sticker,
        int $position // 0..
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Устанавливает эскиз (превью) набора стикеров.
     *
     * @link https://core.telegram.org/bots/api#setstickersetthumbnail
     */
    public function setStickerSetThumbnail(
        string $name,
        int $userId,
        string $format, // StickerFormat:class
        InputFile|string|null $thumbnail = null // WEBP|PNG, <= 128kB или TGS|WEBM, <= 32kB, <= 3s : W=100, H=100
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Устанавливает новый набор групповых стикеров для супергруппы.
     *
     * @link https://core.telegram.org/bots/api#setchatstickerset
     */
    public function setChatStickerSet(
        int|string $chatId,
        string $stickerSetName
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Устанавливает миниатюру пользовательского набора стикеров с эмоджи.
     *
     * @link https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail
     */
    public function setCustomEmojiStickerSetThumbnail(
        string $name,
        ?string $customEmojiId
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Устанавливает название созданного набора стикеров.
     *
     * @link https://core.telegram.org/bots/api#setstickersettitle
     */
    public function setStickerSetTitle(
        string $name,
        string $title // 1-64
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Изменяет список смайлов, связанных с обычным или пользовательским стикером.
     *
     * @link https://core.telegram.org/bots/api#setstickeremojilist
     *
     * @param string[] $emojiList
     */
    public function setStickerEmojiList(
        string $sticker,
        array $emojiList // 1-20
    ): bool
    {
        return $this->call(func_get_args(), [
            'emoji_list'
        ]);
    }

    /**
     * Изменяет ключевые слова для поиска, связанные с обычным или пользовательским стикером.
     *
     * @link https://core.telegram.org/bots/api#setstickerkeywords
     *
     * @param ?string[] $keywords
     */
    public function setStickerKeywords(
        string $sticker,
        ?array $keywords = null // 0-20
    ): bool
    {
        return $this->call(func_get_args(), [
            'keywords'
        ]);
    }

    /**
     * Изменяет положение маски стикера.
     *
     * @link https://core.telegram.org/bots/api#setstickermaskposition
     */
    public function setStickerMaskPosition(
        string $sticker,
        ?MaskPosition $maskPosition = null
    ): bool
    {
        return $this->call(func_get_args(), [
            'mask_position'
        ]);
    }

    /**
     * Заменяет существующий стикер в наборе стикеров на новый.
     *
     * @link https://core.telegram.org/bots/api#replacestickerinset
     */
    public function replaceStickerInSet(
        int $userId,
        string $name,
        string $oldSticker,
        InputSticker $sticker
    ): bool
    {
        return $this->call(func_get_args(), [
            'sticker'
        ]);
    }

    /**
     * Удаляет стикер из набора, созданного ботом.
     *
     * @link https://core.telegram.org/bots/api#deletestickerfromset
     */
    public function deleteStickerFromSet(
        string $sticker
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Удаляет набор стикеров, созданный ботом.
     *
     * @link https://core.telegram.org/bots/api#deletestickerset
     */
    public function deleteStickerSet(
        string $name
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Удаляет набор групповых стикеров из супергруппы.
     *
     * @link https://core.telegram.org/bots/api#deletechatstickerset
     */
    public function deleteChatStickerSet(
        int|string $chatId
    ): bool
    {
        return $this->call(func_get_args());
    }

    #endregion

    #region Queries

    /**
     * Отправляет ответ на запрос обратного вызова, отправленный со встроенной клавиатуры.
     *
     * @link https://core.telegram.org/bots/api#answercallbackquery
     */
    public function answerCallbackQuery(
        string $callbackQuery_id,
        ?string $text = null, // 0-200
        ?bool $showAlert = null, // (false)
        ?string $url = null,
        ?int $cacheTime = null // (0)
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Отправляет ответ на встроенный запрос.
     *
     * @link https://core.telegram.org/bots/api#answerinlinequery
     *
     * @param InlineQueryResult[] $results
     */
    public function answerInlineQuery(
        string $inlineQueryId,
        array $results,
        ?int $cacheTime = null, // (300)
        ?bool $isPersonal = null,
        ?string $nextOffset = null, // <= 64b
        ?InlineQueryResultsButton $button = null
    ): bool
    {
        return $this->call(func_get_args(), [
            'results',
            'button'
        ]);
    }

    /**
     * Отправляет сообщение о результате взаимодействия с веб-приложением.
     *
     * @link https://core.telegram.org/bots/api#answerwebappquery
     */
    public function answerWebAppQuery(
        string $webAppQueryId,
        InlineQueryResult $result
    ): SentWebAppMessage
    {
        return EntityFactory::make(SentWebAppMessage::class, $this->call(func_get_args(), [
            'result'
        ]));
    }

    #endregion

    #region Payments

    /**
     * Отпраляет счет.
     *
     * @link https://core.telegram.org/bots/api#sendinvoice
     *
     * @param LabeledPrice[] $prices
     * @param int[] $suggestedTipAmounts
     */
    public function sendInvoice(
        string|int $chatId,
        string $title, // 1-32
        string $description, // 1-255
        string $payload, // 1-128b
        string $currency, // https://core.telegram.org/bots/payments#supported-currencies
        array $prices,
        ?string $providerToken = null,
        ?int $messageThreadId = null,
        ?int $maxTipAmount = null, // https://core.telegram.org/bots/payments/currencies.json
        ?array $suggestedTipAmounts = null, // 1-4
        ?string $startParameter = null,
        ?string $providerData = null,
        ?string $photoUrl = null,
        ?int $photoSize = null,
        ?int $photoWidth = null,
        ?int $photoHeight = null,
        ?bool $needName = null,
        ?bool $needPhoneNumber = null,
        ?bool $needEmail = null,
        ?bool $needShippingAddress = null,
        ?bool $sendPhoneNumberToProvider = null,
        ?bool $sendEmailToProvider = null,
        ?bool $isFlexible = null,
        ?bool $disableNotification = null,
        ?bool $protectContent = null,
        ?bool $allowPaidBroadcast = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        ?InlineKeyboardMarkup $replyMarkup = null
    ): Message
    {
        return EntityFactory::make(Message::class, $this->call(func_get_args(), [
            'prices',
            'suggested_tip_amounts',
            'provider_data',
            'reply_parameters',
            'reply_markup'
        ]));
    }

    /**
     * Создает ссылку на счет.
     *
     * @link https://core.telegram.org/bots/api#createinvoicelink
     *
     * @param LabeledPrice[] $prices
     * @param int[] $suggestedTipAmounts
     */
    public function createInvoiceLink(
        string $title, // 1-32
        string $description, // 1-128b
        string $payload,
        string $currency, // https://core.telegram.org/bots/payments#supported-currencies
        array $prices,
        ?string $providerToken = null,
        ?int $maxTipAmount = null, // https://core.telegram.org/bots/payments/currencies.json
        ?array $suggestedTipAmounts = null, // 1-4
        ?string $providerData = null,
        ?string $photoUrl = null,
        ?int $photoSize = null,
        ?int $photoWidth = null,
        ?int $photoHeight = null,
        ?bool $needName = null,
        ?bool $needPhoneNumber = null,
        ?bool $needEmail = null,
        ?bool $needShippingAddress = null,
        ?bool $sendPhoneNumberToProvider = null,
        ?bool $sendEmailToProvider = null,
        ?bool $isFlexible = null
    ): string
    {
        return $this->call(func_get_args(), [
            'prices',
            'suggested_tip_amounts',
            'provider_data'
        ]);
    }

    /**
     * Отправляет ответ на запросы перед оформлением заказа.
     *
     * @link https://core.telegram.org/bots/api#answerprecheckoutquery
     */
    public function answerPreCheckoutQuery(
        string $preCheckoutQueryId,
        bool $ok,
        ?string $errorMessage = null
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Отправляет ответ на запрос о доставке.
     *
     * @link https://core.telegram.org/bots/api#answershippingquery
     *
     * @param ShippingOption[] $shippingOptions
     */
    public function answerShippingQuery(
        string $shippingQueryId,
        bool $ok,
        ?array $shippingOptions = null, // $ok
        ?string $errorMessage = null // !$ok
    ): bool
    {
        return $this->call(func_get_args(), [
            'shipping_options'
        ]);
    }

    /**
     * Получает транзакции Telegram Star в хронологическом порядке.
     *
     * @link https://core.telegram.org/bots/api#refundstarpayment
     */
    public function getStarTransactions(
        ?int $offset = null,
        ?int $limit = null // 1-100 (100)
    ): StarTransactions
    {
        return EntityFactory::make(StarTransactions::class, $this->call(func_get_args()));
    }

    /**
     * Возвращает успешный платеж в Telegram Stars.
     *
     * @link https://core.telegram.org/bots/api#refundstarpayment
     */
    public function refundStarPayment(
        int $userId,
        string $telegramPaymentChargeId
    ): bool
    {
        return $this->call(func_get_args());
    }

    #endregion

    #region Passport

    /**
     * Сообщает пользователю, что некоторые из предоставленных им элементов телеграм паспорт содержат ошибки.
     *
     * @link https://core.telegram.org/bots/api#setpassportdataerrors
     *
     * @param PassportElementError[] $errors
     */
    public function setPassportDataErrors(
        int $userId,
        array $errors
    ): bool
    {
        return $this->call(func_get_args(), [
            'errors'
        ]);
    }

    #endregion

    #region Bot

    /**
     * Получает объект с основной информацией о боте.
     *
     * @link https://core.telegram.org/bots/api#getme
     */
    public function getMe(): User
    {
        return EntityFactory::make(User::class, $this->call());
    }

    /**
     * Получает текущее имя бота.
     *
     * @link https://core.telegram.org/bots/api#getmyname
     */
    public function getMyName(
        ?string $languageCode = null // 2, ISO 639-1
    ): BotName
    {
        return EntityFactory::make(BotName::class, $this->call(func_get_args()));
    }

    /**
     * Получает краткое описание бота.
     *
     * @link https://core.telegram.org/bots/api#getmyshortdescription
     */
    public function getMyShortDescription(
        ?string $languageCode = null // 2, ISO 639-1
    ): BotShortDescription
    {
        return EntityFactory::make(BotShortDescription::class, $this->call(func_get_args()));
    }

    /**
     * Получает текущее описание бота.
     *
     * @link https://core.telegram.org/bots/api#getmydescription
     */
    public function getMyDescription(
        ?string $languageCode = null // 2, ISO 639-1
    ): BotDescription
    {
        return EntityFactory::make(BotDescription::class, $this->call(func_get_args()));
    }

    /**
     * Получает список команд бота.
     *
     * @link https://core.telegram.org/bots/api#getmycommands
     *
     * @return BotCommand[]
     */
    public function getMyCommands(
        ?BotCommandScope $scope = null,
        ?string $languageCode = null // 2, ISO 639-1
    ): array
    {
        return EntityFactory::makeArray(BotCommand::class, $this->call(func_get_args(), [
            'scope'
        ]));
    }

    /**
     * Получает текущие права администратора бота по умолчанию.
     *
     * @link https://core.telegram.org/bots/api#getmydefaultadministratorrights
     */
    public function getMyDefaultAdministratorRights(
        ?bool $forChannels = null
    ): ChatAdministratorRights
    {
        return EntityFactory::make(ChatAdministratorRights::class, $this->call(func_get_args()));
    }

    /**
     * Изменяет имя бота.
     *
     * @link https://core.telegram.org/bots/api#setmyname
     */
    public function setMyName(
        ?string $name = null, // 0-64
        ?string $languageCode = null // 2, ISO 639-1
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Изменяет краткое описание бота, которое отображается на странице профиля бота и отправляется вместе со ссылкой.
     *
     * @link https://core.telegram.org/bots/api#setmyshortdescription
     */
    public function setMyShortDescription(
        ?string $shortDescription = null, // 0-120
        ?string $languageCode = null // 2, ISO 639-1
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Изменяет описание бота, которое отображается в чате с ботом, если чат пуст.
     *
     * @link https://core.telegram.org/bots/api#setmydescription
     */
    public function setMyDescription(
        ?string $description = null, // 0-512
        ?string $languageCode = null // 2, ISO 639-1
    ): bool
    {
        return $this->call(func_get_args());
    }

    /**
     * Изменяет список команд бота.
     *
     * @link https://core.telegram.org/bots/api#setmycommands
     *
     * @param BotCommand[] $commands
     */
    public function setMyCommands(
        array $commands, // 1-100
        ?BotCommandScope $scope = null,
        ?string $languageCode = null // 2, ISO 639-1
    ): bool
    {
        return $this->call(func_get_args(), [
            'commands',
            'scope'
        ]);
    }

    /**
     * Изменяет права администратора по умолчанию, запрашиваемые ботом при его добавлении в качестве администратора в группы или каналы.
     *
     * @link https://core.telegram.org/bots/api#setmydefaultadministratorrights
     */
    public function setMyDefaultAdministratorRights(
        ?ChatAdministratorRights $rights = null,
        ?bool $forChannels = null
    ): bool
    {
        return $this->call(func_get_args(), [
            'rights'
        ]);
    }

    /**
     * Удаляет список команд бота.
     *
     * @link https://core.telegram.org/bots/api#deletemycommands
     */
    public function deleteMyCommands(
        ?BotCommandScope $scope = null,
        ?string $languageCode = null // 2, ISO 639-1
    ): bool
    {
        return $this->call(func_get_args(), [
            'scope'
        ]);
    }

    /**
     * Получает информацию о подключении бота к бизнес-аккаунту.
     *
     * @link https://core.telegram.org/bots/api#getbusinessconnection
     */
    public function getBusinessConnection(
        string $businessConnectionId
    ): BusinessConnection
    {
        return EntityFactory::make(BusinessConnection::class, $this->call(func_get_args()));
    }

    #endregion

    #region Other

    /**
     * Получает основную информацию о файле и подготавливает его к загрузке.
     *
     * @link https://core.telegram.org/bots/api#getfile
     */
    public function getFile(
        string $fileId
    ): File
    {
        return EntityFactory::make(File::class, $this->call(func_get_args()));
    }

    /**
     * (*) Получает Url-ссылку на файл.
     *
     * ВАЖНО: Ссылка НЕ предназначена для публичного доступа к файлу, т.к. в ней будет присутствовать секретный токен бота.
     *
     * @link https://core.telegram.org/bots/api#getfile
     */
    public function getFileUrl(string $fileId): string
    {
        return self::REQUEST_URL_FILE.$this->token.'/'.$this->getFile($fileId)->getFilePath();
    }

    /**
     * Получает список изображений профиля пользователя.
     *
     * @link https://core.telegram.org/bots/api#getuserprofilephotos
     */
    public function getUserProfilePhotos(
        string $userId,
        ?int $offset = null,
        ?int $limit = null // 1-100 (100)
    ): UserProfilePhotos
    {
        return EntityFactory::make(UserProfilePhotos::class, $this->call(func_get_args()));
    }

    /**
     * Закрывает экземпляр бота перед его перемещением с одного локального сервера на другой.
     *
     * @link https://core.telegram.org/bots/api#close
     */
    public function close(): bool
    {
        return $this->call();
    }

    /**
     * Выходит из облачного сервера API бота перед локальным запуском бота.
     *
     * @link https://core.telegram.org/bots/api#logout
     */
    public function logOut(): bool
    {
        return $this->call();
    }

    #endregion
}
