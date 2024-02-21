<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use CURLFile;
use Manuylenko\Telegram\Bot\Api\Exceptions\FileNotFoundException;

/**
 * Представляет загружаемый на сервер файл.
 *
 * @link https://core.telegram.org/bots/api#inputfile
 */
class InputFile extends CURLFile
{
    /**
     * Конструктор.
     */
    public function __construct(string $filename, ?string $mimeType = null, ?string $postedFilename = null)
    {
        if (!file_exists($filename)) {
            throw new FileNotFoundException(sprintf('Файл "%s" не найден', $filename));
        }

        if ($postedFilename === null) {
            $postedFilename = pathinfo(str_replace('\\', '/', $filename), PATHINFO_BASENAME);
        }

        parent::__construct($filename, $mimeType, $postedFilename);
    }

    # # #

    /**
     * Создает объект загружаемого файла.
     */
    public static function make(
        string $filename, // url-адрес или путь к файлу
        ?string $postedFilename = null,
        ?string $mimeType = null
    ): static
    {
        return new static( // https://www.php.net/manual/ru/class.curlfile.php
            $filename,
            $mimeType,
            $postedFilename
        );
    }
}
