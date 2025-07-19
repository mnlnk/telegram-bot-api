### Примеры:


```php
use Manuylenko\Telegram\Bot\Api\Api;
use Manuylenko\Telegram\Bot\Api\Entities\InputFile;

// ...

$token = '0123456789:AAFYmpDWKXs_qc-2Let7p2VaHIC-cLrXLtE';

$api = new Api($token);

// ...

// Отправка текстового сообщения
$api->sendMessage('@channelname', 'Привет, мир!');

// Отправка видео
$api->sendVideo('@channelname', 'https://veshok.com/dw/load.php?id=37188');

// Отправка документа 
$api->sendDocument('@channelname', InputFile::make('C:\Some\File.zip'));
```
