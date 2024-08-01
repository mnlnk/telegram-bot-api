<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Replies;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Animation;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Audio;
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
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Story;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Venue;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Video;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\VideoNote;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Voice;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\PaidMediaInfo;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\Invoice;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;

/**
 * Представляет информацию о сообщении, на которое отвечают, которое может прийти из другого чата или темы форума.
 *
 * @link https://core.telegram.org/bots/api#externalreplyinfo
 *
 * @method           MessageOrigin getOrigin()                 Объект происхождения сообщения, на которое ответило данное сообщение.
 * @method               Chat|null getChat()               (+) Объект чата, которому принадлежит исходное сообщение.
 * @method                int|null getMessageId()          (+) Уникальный идентификатор сообщения внутри исходного чата.
 * @method LinkPreviewOptions|null getLinkPreviewOptions() (+) Объект параметров, используемые для создания предварительного просмотра ссылки для исходного сообщения, если это текстовое сообщение.
 * @method          Animation|null getAnimation()          (+) Объект анимации.
 * @method              Audio|null getAudio()              (+) Объект аудиофайла.
 * @method           Document|null getDocument()           (+) Объект документа (файла).
 * @method      PaidMediaInfo|null getPaidMedia()          (+) Объект платного медиафайла.
 * @method        PhotoSize[]|null getPhoto()              (+) Массив объектов фотографии, доступные размеры фотографии.
 * @method            Sticker|null getSticker()            (+) Объект стикера.
 * @method              Story|null getStory()              (+) Объект пересланной истории.
 * @method              Video|null getVideo()              (+) Объект видео.
 * @method          VideoNote|null getVideoNote()          (+) Объект видеозаметки.
 * @method              Voice|null getVoice()              (+) Объект голосового сообщения.
 * @method               bool|null getHasMediaSpoiler()    (+) Медиа-сообщение закрыто анимацией-спойлером.
 * @method            Contact|null getContact()            (+) Объект контакта.
 * @method               Dice|null getDice()               (+) Объект игральной кости со случайным значением.
 * @method               Game|null getGame()               (+) Объект игры.
 * @method           Giveaway|null getGiveaway()           (+) Объект запланированного розыгрыша, информация о розыгрыше.
 * @method    GiveawayWinners|null getGiveawayWinners()    (+) Объект завершеного розыгрыша с участием публичных победителей.
 * @method            Invoice|null getInvoice()            (+) Объект счета на оплату.
 * @method           Location|null getLocation()           (+) Объект местоположения.
 * @method               Poll|null getPoll()               (+) Объект опроса.
 * @method              Venue|null getVenue()              (+) Объект места проведения.
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
    'paid_media' => PaidMediaInfo::class,
    'photo' => [PhotoSize::class],
    'sticker' => Sticker::class,
    'story' => Story::class,
    'video' => Video::class,
    'video_note' => VideoNote::class,
    'voice' => Voice::class,
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
