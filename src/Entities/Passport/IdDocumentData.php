<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет данные документа, удостоверяющего личность.
 *
 * @link https://core.telegram.org/passport#iddocumentdata
 *
 * @method      string getDocumentNo()     Номер документа.
 * @method string|null getExpiryDate() (+) Дата истечения срока действия; в формате ДД.ММ.ГГГГ.
 */
#[Required([
    'document_no'
])]
class IdDocumentData extends Entity
{
    //
}
