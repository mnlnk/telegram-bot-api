<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Business;

use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет права бизнес-бота.
 *
 * @link https://core.telegram.org/bots/api#businessbotrights
 *
 * @method bool|null getCanReply()                   (+) Разрешено отправлять и редактировать сообщения в приватных чатах, в которые были входящие сообщения за последние 24 часа.
 * @method bool|null getCanReadMessages()            (+) Разрешено отмечать входящие личные сообщения как прочитанные.
 * @method bool|null getCanDeleteSentMessages()      (+) Разрешено удалять сообщения, отправленные ботом.
 * @method bool|null getCanDeleteAllMessages()       (+) Разрешено удалять все личные сообщения в управляемых чатах.
 * @method bool|null getCanEditName()                (+) Разрешено редактировать имя и фамилию бизнес-аккаунта.
 * @method bool|null getCanEditBio()                 (+) Разрешено редактировать описание бизнес-аккаунта.
 * @method bool|null getCanEditProfilePhoto()        (+) Разрешено редактировать фото профиля бизнес-аккаунта.
 * @method bool|null getCanEditUsername()            (+) Разрешено редактировать имя пользователя бизнес-аккаунта.
 * @method bool|null getCanChangeGiftSettings()      (+) Разрешено изменять настройки конфиденциальности, касающиеся подарков, для бизнес-аккаунта.
 * @method bool|null getCanViewGiftsAndStars()       (+) Разрешено просматривать подарки и количество Telegram Stars, принадлежащих бизнес-аккаунту.
 * @method bool|null getCanConvertGiftsToStars()     (+) Разрешено конвертировать обычные подарки, принадлежащие бизнес-аккаунту, в Telegram Stars.
 * @method bool|null getCanTransferAndUpgradeGifts() (+) Разрешено передавать и улучшать подарки, принадлежащие бизнес-аккаунту.
 * @method bool|null getCanTransferStars()           (+) Разрешено переводить Telegram Stars, полученные бизнес-аккаунтом, на свой собственный аккаунт или использовать их для улучшения и передачи подарков.
 * @method bool|null getCanManageStories()           (+) Разрешено публиковать, редактировать и удалять истории от имени бизнес-аккаунта.
 */
class BusinessBotRights extends Entity
{
    //
}
