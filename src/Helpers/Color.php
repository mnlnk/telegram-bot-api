<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Helpers;

class Color
{
    /**
     * Массив идентифиаторов цветов акцента.
     *
     * @link https://core.telegram.org/bots/api#accent-colors
     *
     * @return array[][]
     */
    public static function accent(): array
    {
        return [
            'light' => [
                0  => ['red'],
                1  => ['orange'],
                2  => ['purple'],
                3  => ['green'],
                4  => ['cyan'],
                5  => ['blue'],
                6  => ['pink'],
                7  => ['e15052', 'f9ae63'],
                8  => ['e0802b', 'fac534'],
                9  => ['a05ff3', 'f48fff'],
                10 => ['27a910', 'a7dc57'],
                11 => ['27acce', '82e8d6'],
                12 => ['3391d4', '7dd3f0'],
                13 => ['dd4371', 'ffbe9f'],
                14 => ['247bed', 'f04856', 'ffffff'],
                15 => ['d67722', '1ea011', 'ffffff'],
                16 => ['179e42', 'e84a3f', 'ffffff'],
                17 => ['2894af', '6fc456', 'ffffff'],
                18 => ['0c9ab3', 'ffad95', 'ffe6b5'],
                19 => ['7757d6', 'f79610', 'ffde8e'],
                20 => ['1585cf', 'f2ab1d', 'ffffff']
            ],
            'dark' => [
                0  => ['red'],
                1  => ['orange'],
                2  => ['purple'],
                3  => ['green'],
                4  => ['cyan'],
                5  => ['blue'],
                6  => ['pink'],
                7  => ['ff9380', '992f37'],
                8  => ['ecb04e', 'c35714'],
                9  => ['c697ff', '5e31c8'],
                10 => ['a7eb6e', '167e2d'],
                11 => ['40d8d0', '045c7f'],
                12 => ['52bfff', '0b5494'],
                13 => ['ff86a6', '8e366e'],
                14 => ['3fa2fe', 'e5424f', 'ffffff'],
                15 => ['ff905e', '32a527', 'ffffff'],
                16 => ['66d364', 'd5444f', 'ffffff'],
                17 => ['22bce2', '3da240', 'ffffff'],
                18 => ['22bce2', 'ff9778', 'ffda6b'],
                19 => ['9791ff', 'f2731d', 'ffdb59'],
                20 => ['3da6eb', 'eea51d', 'ffffff']
            ]
        ];
    }

    /**
     * Массив идентифиаторов цветов акцента профиля.
     *
     * @link https://core.telegram.org/bots/api#profile-accent-colors
     *
     * @return array[][]
     */
    public static function accentProfile(): array
    {
        return [
            'light' => [
                0  => ['ba5650'],
                1  => ['c27c3e'],
                2  => ['956ac8'],
                3  => ['49a355'],
                4  => ['3e97ad'],
                5  => ['5a8fbb'],
                6  => ['b85378'],
                7  => ['7f8b95'],
                8  => ['c9565d', 'd97c57'],
                9  => ['cf7244', 'cc9433'],
                10 => ['9662d4', 'b966b6'],
                11 => ['3d9755', '89a650'],
                12 => ['3d95ba', '50ad98'],
                13 => ['538bc2', '4da8bd'],
                14 => ['b04f74', 'd1666d'],
                15 => ['637482', '7b8a97']
            ],
            'dark' => [
                0  => ['9c4540'],
                1  => ['945e2c'],
                2  => ['715099'],
                3  => ['33713b'],
                4  => ['387e87'],
                5  => ['477194'],
                6  => ['944763'],
                7  => ['435261'],
                8  => ['994343', 'ac583e'],
                9  => ['8f552f', 'a17232'],
                10 => ['634691', '9250a2'],
                11 => ['296a43', '5f8f44'],
                12 => ['306c7c', '3e987e'],
                13 => ['38618c', '458ba1'],
                14 => ['884160', 'a65259'],
                15 => ['53606e', '384654']
            ]
        ];
    }
}
