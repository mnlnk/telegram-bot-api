## Telegram Bot Api v2.5.0 ([7.10](https://core.telegram.org/bots/api#september-6-2024))

#### Описание:
Библиотека для работы с [Bot API](https://core.telegram.org/api#bot-api) Telegram.

#### Требования:
+ `PHP >= 8.0`
+ `ext-curl`
+ `ext-json`

#### Установка:
```
composer require mnlnk/telegram-bot-api
```

#### Примеры:
```php
use Manuylenko\Telegram\Bot\Api\Api;
use Manuylenko\Telegram\Bot\Api\Entities\InputFile;


// ..

$token = '0123456789:AAFYmpDWKXs_qc-2Let7p2VaHIC-cLrXLtE';

$api = new Api($token);

// Отправка текстового сообщения
$api->sendMessage('@channelname', 'Привет, мир!');

// Отправка видео
$api->sendVideo('@channelname', 'https://veshok.com/dw/load.php?id=37188');

// Отправка документа 
$api->sendDocument('@channelname', InputFile::make('C:\Some\File.zip'));
```

#### Список доступных методов:

##### Обновления
+ [getUpdates()](https://core.telegram.org/bots/api#getupdates) - Получает массив входящих обновлений.
+ [getWebhookInfo()](https://core.telegram.org/bots/api#getwebhookinfo) - Получает информацию о текущем статусе Webhook.
+ [setWebhook()](https://core.telegram.org/bots/api#setwebhook) - Устанавливает Webhook.
+ [deleteWebhook()](https://core.telegram.org/bots/api#deletewebhook) - Удаляет Webhook.

##### Чаты
+ [getChat()](https://core.telegram.org/bots/api#getchat) - Получает основную информацию о чате.
+ [getUserChatBoosts()](https://core.telegram.org/bots/api#getuserchatboosts) - Получает список бустов, добавленных пользователем в чат.
+ [sendChatAction()](https://core.telegram.org/bots/api#sendchataction) - Сообщает пользователю, что что-то происходит на стороне бота.
+ [pinChatMessage()](https://core.telegram.org/bots/api#pinchatmessage) - Добавляет сообщение в список закрепленных сообщений чата.
+ [unpinChatMessage()](https://core.telegram.org/bots/api#unpinchatmessage) - Открепляет закрепленное сообщение в чате.
+ [unpinAllChatMessages()](https://core.telegram.org/bots/api#unpinallchatmessages) - Очищает список всех закрепленных сообщений в чате.
+ [exportChatInviteLink()](https://core.telegram.org/bots/api#exportchatinvitelink) - Создает новую ссылку для приглашения в чат.
+ [revokeChatInviteLink()](https://core.telegram.org/bots/api#revokechatinvitelink) - Отзывает пригласительную ссылку, созданую ботом.
+ [createChatInviteLink()](https://core.telegram.org/bots/api#createchatinvitelink) - Создает дополнительную ссылку для приглашения в чат.
+ [editChatInviteLink()](https://core.telegram.org/bots/api#editchatinvitelink) - Редактирует дополнительную пригласительную ссылку.
+ [createChatSubscriptionInviteLink()](https://core.telegram.org/bots/api#createchatsubscriptioninvitelink) - Создает ссылку-приглашение на подписку для канала.
+ [editChatSubscriptionInviteLink()](https://core.telegram.org/bots/api#editchatsubscriptioninvitelink) - Редактирует ссылку-приглашение на подписку для канала.
+ [approveChatJoinRequest()](https://core.telegram.org/bots/api#approvechatjoinrequest) - Одобряет запрос на присоединение пользователя к чату.
+ [declineChatJoinRequest()](https://core.telegram.org/bots/api#declinechatjoinrequest) - Отклоняет запрос на присоединение пользователя к чату.
+ [leaveChat()](https://core.telegram.org/bots/api#leavechat) - Выходит из группы, супергруппы или канала.

##### Пользователи чата
+ [getChatMemberCount()](https://core.telegram.org/bots/api#getchatmembercount) - Получает количество участников в чате.
+ [getChatMember()](https://core.telegram.org/bots/api#getchatmember) - Получает информацию о конкретном участнике чата.
+ [getChatAdministrators()](https://core.telegram.org/bots/api#getchatadministrators) - Получает список всех администраторов чата.
+ [restrictChatMember()](https://core.telegram.org/bots/api#restrictchatmember) - Ограничивает пользователя в супергруппе.
+ [promoteChatMember()](https://core.telegram.org/bots/api#promotechatmember) - Изменяет права пользователя в супергруппе или канале.
+ [banChatMember()](https://core.telegram.org/bots/api#banchatmember) - Блокирует и удаляет пользователя из группы, супергруппы или канала.
+ [unbanChatMember()](https://core.telegram.org/bots/api#unbanchatmember) - Разблокирует ранее удаленного пользователя в супергруппе или канале.
+ [banChatSenderChat()](https://core.telegram.org/bots/api#banchatsenderchat) - Блокирует канал в супергруппе или на канале.
+ [unbanChatSenderChat()](https://core.telegram.org/bots/api#unbanchatsenderchat) - Разблокирует канал в супергруппе или на канале.

##### Параметры чата
+ [getChatMenuButton()](https://core.telegram.org/bots/api#getchatmenubutton) - Получает текущее значение кнопки меню бота.
+ [setChatTitle()](https://core.telegram.org/bots/api#setchattitle) - Устанавливает заголовок чата.
+ [setChatPhoto()](https://core.telegram.org/bots/api#setchatphoto) - Устанавливает фотографию чата.
+ [setChatDescription()](https://core.telegram.org/bots/api#setchatdescription) - Устанавливает описание группы, супергруппы или канала.
+ [setChatPermissions()](https://core.telegram.org/bots/api#setchatpermissions) - Устанавливает разрешения по умолчанию для всех участников.
+ [setChatAdministratorCustomTitle()](https://core.telegram.org/bots/api#setchatadministratorcustomtitle) - Устанавливает пользовательское название (титул) для администратора в супергруппе.
+ [setChatMenuButton()](https://core.telegram.org/bots/api#setchatmenubutton) - Устанавливает кнопку меню бота или кнопку меню по умолчанию.
+ [deleteChatPhoto()](https://core.telegram.org/bots/api#deletechatphoto) - Удаляет фотографию чата.

##### Форумы
+ [createForumTopic()](https://core.telegram.org/bots/api#createforumtopic) - Создает тему форума.
+ [editForumTopic()](https://core.telegram.org/bots/api#editforumtopic) - Редактирует тему форума.
+ [closeForumTopic()](https://core.telegram.org/bots/api#closeforumtopic) - Закрывает тему форума.
+ [reopenForumTopic()](https://core.telegram.org/bots/api#reopenforumtopic) - Открывает закрытую ранее тему форума.
+ [deleteForumTopic()](https://core.telegram.org/bots/api#deleteforumtopic) - Удаляет тему форума.
+ [unpinAllForumTopicMessages()](https://core.telegram.org/bots/api#unpinallforumtopicmessages) - Очищает список закрепленных сообщений в теме форума.
+ [editGeneralForumTopic()](https://core.telegram.org/bots/api#editgeneralforumtopic) - Редактирует название "Основной" темы форума.
+ [closeGeneralForumTopic()](https://core.telegram.org/bots/api#closegeneralforumtopic) - Закрывает открытую "Основную" тему форума.
+ [reopenGeneralForumTopic()](https://core.telegram.org/bots/api#reopengeneralforumtopic) - Повторно открывает закрытую "Основную" тему форума.
+ [hideGeneralForumTopic()](https://core.telegram.org/bots/api#hidegeneralforumtopic) - Скрывает "Основную" тему форума.
+ [unhideGeneralForumTopic()](https://core.telegram.org/bots/api#unhidegeneralforumtopic) - Отображает скрытую "Основную" тему форума.
+ [unpinAllGeneralForumTopicMessages()](https://core.telegram.org/bots/api#unpinallgeneralforumtopicmessages) - Очищает список закрепленных сообщений в "Основной" теме форума.
+ [getForumTopicIconStickers()](https://core.telegram.org/bots/api#getforumtopiciconstickers) - Получает массив стикеров для использования в качестве значков темы форума.

##### Сообщения
+ [sendMessage()](https://core.telegram.org/bots/api#sendmessage) - Отправляет текстовое сообщение.
+ [sendAudio()](https://core.telegram.org/bots/api#sendaudio) - Отправляет аудиофайл.
+ [sendAnimation()](https://core.telegram.org/bots/api#sendanimation) - Отправляет анимацию.
+ [sendVideo()](https://core.telegram.org/bots/api#sendvideo) - Отправляет видео.
+ [sendContact()](https://core.telegram.org/bots/api#sendcontact) - Отправляет телефонный контакт.
+ [sendDice()](https://core.telegram.org/bots/api#senddice) - Отправляет игральную кость.
+ [sendDocument()](https://core.telegram.org/bots/api#senddocument) - Отправляет документ (файл).
+ [sendPaidMedia()](https://core.telegram.org/bots/api#sendpaidmedia) - Отправляет платные медиа в чат канала.
+ [sendMediaGroup()](https://core.telegram.org/bots/api#sendmediagroup) - Отправляет группу фотографий или видео в виде альбома.
+ [sendPhoto()](https://core.telegram.org/bots/api#sendphoto) - Отправляет фотографию.
+ [sendVideoNote()](https://core.telegram.org/bots/api#sendvideonote) - Отправляет видеозаметку.
+ [sendVoice()](https://core.telegram.org/bots/api#sendvoice) - Отправляет голосовую заметку.
+ [sendVenue()](https://core.telegram.org/bots/api#sendvenue) - Отправляет место встречи.
+ [sendLocation()](https://core.telegram.org/bots/api#sendlocation) - Отправляет местоположение.
+ [sendPoll()](https://core.telegram.org/bots/api#sendpoll) - Отправляет опрос.
+ [forwardMessage()](https://core.telegram.org/bots/api#forwardmessage) - Пересылает сообщение.
+ [forwardMessages()](https://core.telegram.org/bots/api#forwardmessages) - Пересылает несколько сообщений.
+ [copyMessage()](https://core.telegram.org/bots/api#copymessage) - Копирует сообщение.
+ [copyMessages()](https://core.telegram.org/bots/api#copymessages) - Копирует несколько сообщение.

##### Редактирование сообщений
+ [editMessageText()](https://core.telegram.org/bots/api#editmessagetext) - Редактирует текстовое или игровое сообщение.
+ [editMessageCaption()](https://core.telegram.org/bots/api#editmessagecaption) - Редактирует подпись сообщения.
+ [editMessageMedia()](https://core.telegram.org/bots/api#editmessagemedia) - Редактирует мультимедийное сообщение.
+ [editMessageReplyMarkup()](https://core.telegram.org/bots/api#editmessagereplymarkup) - Редактирует клавиатуру сообщения.
+ [editMessageLiveLocation()](https://core.telegram.org/bots/api#editmessagelivelocation) - Редактирует сообщение о местоположении в реальном времени.
+ [stopMessageLiveLocation()](https://core.telegram.org/bots/api#stopmessagelivelocation) - Останавливает обновление сообщения о текущем местоположении.
+ [stopPoll()](https://core.telegram.org/bots/api#stoppoll) - Останавливает отправленный ранее опрос.
+ [deleteMessage()](https://core.telegram.org/bots/api#deletemessage) - Удаляет сообщение.
+ [deleteMessages()](https://core.telegram.org/bots/api#deletemessages) - Удаляет несколько сообщений одновременно.

##### Реакции
+ [setMessageReaction()](https://core.telegram.org/bots/api#setmessagereaction) - Изменяет выбранные реакции у сообщения.

##### Игры
+ [sendGame()](https://core.telegram.org/bots/api#sendgame) - Отправляет игру.
+ [getGameHighScores()](https://core.telegram.org/bots/api#getgamehighscores) - Получает данные из таблицы рекордов.
+ [setGameScore()](https://core.telegram.org/bots/api#setgamescore) - Устанавливает счет пользователя в игре.

##### Стикеры
+ [sendSticker()](https://core.telegram.org/bots/api#sendsticker) - Отправляет стикер.
+ [getStickerSet()](https://core.telegram.org/bots/api#getstickerset) - Получает набор стикеров.
+ [getCustomEmojiStickers()](https://core.telegram.org/bots/api#getcustomemojistickers) - Получает информацию о пользовательских эмоджи стикерах.
+ [uploadStickerFile()](https://core.telegram.org/bots/api#uploadstickerfile) - Загружает файл стикера на сервер.
+ [createNewStickerSet()](https://core.telegram.org/bots/api#createnewstickerset) - Создает новый набор стикеров.
+ [addStickerToSet()](https://core.telegram.org/bots/api#addstickertoset) - Добавляет стикер в набор стикеров.
+ [setStickerPositionInSet()](https://core.telegram.org/bots/api#setstickerpositioninset) - Устанавливает позицию стикера в наборе стикеров.
+ [setStickerSetThumbnail()](https://core.telegram.org/bots/api#setstickersetthumbnail) - Устанавливает миниатюру для набора стикеров.
+ [setChatStickerSet()](https://core.telegram.org/bots/api#setchatstickerset) - Устанавливает набор стикеров для группы или супергруппы.
+ [setCustomEmojiStickerSetThumbnail()](https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail) - Устанавливает миниатюру пользовательского набора стикеров с эмоджи.
+ [setStickerSetTitle()](https://core.telegram.org/bots/api#setstickersettitle) - Устанавливает название созданного набора стикеров.
+ [setStickerEmojiList()](https://core.telegram.org/bots/api#setstickeremojilist) - Устанавливавет список смайлов, связанных со стикером.
+ [setStickerKeywords()](https://core.telegram.org/bots/api#setstickerkeywords) - Устанавливает ключевые слова для поиска, связанные со стикером.
+ [setStickerMaskPosition()](https://core.telegram.org/bots/api#setstickermaskposition) - Устанавливает положение маски стикера.
+ [replaceStickerInSet()](https://core.telegram.org/bots/api#replacestickerinset) - Заменяет существующий стикер в наборе стикеров на новый.
+ [deleteStickerFromSet()](https://core.telegram.org/bots/api#deletestickerfromset) - Удаляет стикер из набора.
+ [deleteStickerSet()](https://core.telegram.org/bots/api#deletestickerset) - Удаляет набор стикеров, созданный ботом.
+ [deleteChatStickerSet()](https://core.telegram.org/bots/api#deletechatstickerset) - Удаляет набор стикеров для группы или супергруппы.

##### Запросы
+ [answerCallbackQuery()](https://core.telegram.org/bots/api#answercallbackquery) - Отправляет ответ на запрос обратного вызова.
+ [answerInlineQuery()](https://core.telegram.org/bots/api#answerinlinequery) - Отправляет ответ на встроенный запрос.
+ [answerWebAppQuery()](https://core.telegram.org/bots/api#answerwebappquery) - Отправляет сообщение о результате взаимодействия с веб-приложением.

##### Платежи
+ [sendInvoice()](https://core.telegram.org/bots/api#sendinvoice) - Отправляет счет на оплату.
+ [createInvoiceLink()](https://core.telegram.org/bots/api#createinvoicelink) - Создает ссылку для счета-фактуры.
+ [answerPreCheckoutQuery()](https://core.telegram.org/bots/api#answerprecheckoutquery) - Отправляет ответ на запросы предварительной проверки заказа.
+ [answerShippingQuery()](https://core.telegram.org/bots/api#answershippingquery) - Отправляет ответ на запрос доставки.
+ [getStarTransactions()](https://core.telegram.org/bots/api#getstartransactions) - Получает транзакции Telegram Star в хронологическом порядке.
+ [refundStarPayment()](https://core.telegram.org/bots/api#refundstarpayment) - Возвращает успешный платеж в Telegram Stars.

##### Конфигурация бота
+ [getMe()](https://core.telegram.org/bots/api#getme) - Получает основную информацию о боте.
+ [getMyName()](https://core.telegram.org/bots/api#getmyname) - Получает текущее имя бота.
+ [getMyShortDescription()](https://core.telegram.org/bots/api#getmyshortdescription) - Получает короткое описание бота.
+ [getMyDescription()](https://core.telegram.org/bots/api#getmydescription) - Получает описание бота.
+ [getMyCommands()](https://core.telegram.org/bots/api#getmycommands) - Получает список команд бота.
+ [getMyDefaultAdministratorRights()](https://core.telegram.org/bots/api#setmydefaultadministratorrights) - Получает права администратора по умолчанию для бота.
+ [setMyName()](https://core.telegram.org/bots/api#setmyname) - Изменяет имя бота.
+ [setMyShortDescription()](https://core.telegram.org/bots/api#setmyshortdescription) - Изменяет короткое описание бота, которое отображается на странице профиля бота.
+ [setMyDescription()](https://core.telegram.org/bots/api#setmydescription) - Изменяет описание бота, которое отображается в чате с ботом, если чат пуст.
+ [setMyCommands()](https://core.telegram.org/bots/api#setmycommands) - Устанавливает список команд бота.
+ [setMyDefaultAdministratorRights()](https://core.telegram.org/bots/api#getmydefaultadministratorrights) - Устанавливает права администратора по умолчанию, запрашиваемые ботом.
+ [deleteMyCommands()](https://core.telegram.org/bots/api#deletemycommands) - Удаляет список команд бота.
+ [getBusinessConnection()](https://core.telegram.org/bots/api#getbusinessconnection) - Получает информацию о подключеннии бота к бизнес-аккаунту.

##### Телеграм Паспорт
+ [setPassportDataErrors()](https://core.telegram.org/bots/api#setpassportdataerrors) - Сообщает пользователю, о возникших ошибках в элементах Телеграм Паспорт.

##### Разное
+ [getFile()](https://core.telegram.org/bots/api#getfile) - Получает основную информацию о файле и подготавливает его к загрузке.
+ [getFileUrl()](https://core.telegram.org/bots/api#file) - (#) Получает URL-ссылку на файл.
+ [getUserProfilePhotos()](https://core.telegram.org/bots/api#getuserprofilephotos) - Получает список всех изображений профиля пользователя.
+ [close()](https://core.telegram.org/bots/api#close) - Закрывает экземпляр бота перед перемещением его с одного локального сервера на другой.
+ [logOut()](https://core.telegram.org/bots/api#logout) - Бот выходит с облачного сервера API бота перед локальным запуском бота.

Методы отмеченые символом (#) отсутствуют в нативном API сервера, но реализованы в данной библиотеке.