<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Services;

use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет служебное сообщение о том, что пользователь разрешает боту писать сообщения
 * после добавления бота в меню вложений или запуска веб-приложения по ссылке.
 *
 * @link https://core.telegram.org/bots/api#writeaccessallowed
 *
 * @method   bool|null getFromRequest()        (+) Доступ был предоставлен после того, как пользователь принял явный запрос от веб-приложения, отправленный методом requestWriteAccess().
 * @method string|null getWebAppName()         (+) Имя веб-приложения, запущенного по ссылке.
 * @method   bool|null getFromAttachmentMenu() (+) Доступ был предоставлен при добавлении бота во вложение или в боковое меню.
 */
class WriteAccessAllowed extends Entity
{
    //
}
