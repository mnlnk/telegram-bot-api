<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Replies;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\LivePhoto;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Animation;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Audio;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Checklist\Checklist;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Contact;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Dice;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Document;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Game\Game;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway\Giveaway;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway\GiveawayWinners;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\LinkPreviewOptions;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Location;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Origin\MessageOrigin;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll\Poll;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers\Sticker;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Venue;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Video;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\VideoNote;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Voice;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\PaidMediaInfo;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\Invoice;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;
use Manuylenko\Telegram\Bot\Api\Entities\Stories\Story;

/**
 * Представляет информацию о сообщении, на которое отвечают, которое может прийти из другого чата или темы форума.
 *
 * @link https://core.telegram.org/bots/api#externalreplyinfo
 *
 * @method           MessageOrigin getOrigin()                 Источник сообщения, на которое было отправлено ответное сообщение.
 * @method               Chat|null getChat()               (+) Чат, которому принадлежит исходное сообщение.
 * @method                int|null getMessageId()          (+) Уникальный идентификатор сообщения внутри исходного чата.
 * @method LinkPreviewOptions|null getLinkPreviewOptions() (+) Параметры, используемые для создания предварительного просмотра ссылки для исходного сообщения, если это текстовое сообщение.
 * @method          Animation|null getAnimation()          (+) Анимация.
 * @method              Audio|null getAudio()              (+) Фудиофайл.
 * @method           Document|null getDocument()           (+) Документ (файла).
 * @method          LivePhoto|null getLivePhoto()          (+) Живое фото.
 * @method      PaidMediaInfo|null getPaidMedia()          (+) Платный медиафайл.
 * @method        PhotoSize[]|null getPhoto()              (+) Массив фотографии (доступные размеры фотографии).
 * @method            Sticker|null getSticker()            (+) Стикер.
 * @method              Story|null getStory()              (+) История.
 * @method              Video|null getVideo()              (+) Видео.
 * @method          VideoNote|null getVideoNote()          (+) Видеозаметка.
 * @method              Voice|null getVoice()              (+) Голосовое сообщение.
 * @method               bool|null getHasMediaSpoiler()    (+) Медиа-сообщение закрыто анимацией-спойлером.
 * @method          Checklist|null getChecklist()          (+) Контрольный список.
 * @method            Contact|null getContact()            (+) Контакт.
 * @method               Dice|null getDice()               (+) Игральная кость со случайным значением.
 * @method               Game|null getGame()               (+) Игра.
 * @method           Giveaway|null getGiveaway()           (+) Запланированный розыгрыш (информация о розыгрыше).
 * @method    GiveawayWinners|null getGiveawayWinners()    (+) Завершеный розыгрыш с участием публичных победителей.
 * @method            Invoice|null getInvoice()            (+) Счета на оплату.
 * @method           Location|null getLocation()           (+) Местоположение (локация).
 * @method               Poll|null getPoll()               (+) Опрос.
 * @method              Venue|null getVenue()              (+) Место проведения (встречи).
 */
#[Required([
    'origin'
])]
#[Depends([
    'origin' => MessageOrigin::class,
    'chat' => Chat::class,
    'link_preview_options' => LinkPreviewOptions::class,
    'animation' => Animation::class,
    'audio' => Audio::class,
    'document' => Document::class,
    'live_photo' => LivePhoto::class,
    'paid_media' => PaidMediaInfo::class,
    'photo' => [PhotoSize::class],
    'sticker' => Sticker::class,
    'story' => Story::class,
    'video' => Video::class,
    'video_note' => VideoNote::class,
    'voice' => Voice::class,
    'checklist' => Checklist::class,
    'contact' => Contact::class,
    'dice' => Dice::class,
    'game' => Game::class,
    'giveaway' => Giveaway::class,
    'giveaway_winners' => GiveawayWinners::class,
    'invoice' => Invoice::class,
    'location' => Location::class,
    'poll' => Poll::class,
    'venue' => Venue::class
])]
class ExternalReplyInfo extends Entity
{
    //
}
