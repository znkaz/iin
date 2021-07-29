<?php

namespace ZnKaz\Iin\Domain\Libs;

use ZnKaz\Iin\Domain\Entities\CheckSumEntity;
use ZnKaz\Iin\Domain\Exceptions\CheckSumGenerateException;

class CheckSum
{

    private $sequences = [
        [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
        [10, 11, 1, 2, 3, 4, 5, 6, 7, 8, 9],
        [3, 4, 5, 6, 7, 8, 9, 10, 11, 1, 2],
    ];
    
    public function generateSum(string $inn): CheckSumEntity
    {
        foreach ($this->sequences as $sequence) {
            $sum = $this->calcSum($sequence, $inn);
            if ($sum != 10) {
                $checkSumEntity = new CheckSumEntity();
                $checkSumEntity->setSum($sum);
                $checkSumEntity->setSequence($sequence);
                return $checkSumEntity;
            }
        }

        throw new CheckSumGenerateException();
    }

    private function calcSum(array $arr, string $inn): int
    {
        $multiplication = 0;
        foreach ($arr as $index => $rank) {
            $char = $inn[$rank - 1];
            $multiplier = $index + 1;
            $multiplication = $multiplication + $multiplier * $char;
        }
        return $multiplication % 11;
    }




    // проверяем ИИН/БИН на корректность (!!! старый алгоритм, не используется !!!)
    // a12=(1*a1+3*a2+7*a3+9*а4+3*а5+1*а6+9*a7+7*a8+3*a9+9*a10+1*a11) mod 10,

    // https://github.com/shatmanov/iinCheck
    // https://infostart.ru/1c/articles/68884/
    // https://github.com/Mi7teR/inn-validate/blob/master/src/index.ts
    // https://ru.wikipedia.org/wiki/%D0%98%D0%BD%D0%B4%D0%B8%D0%B2%D0%B8%D0%B4%D1%83%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9_%D0%B8%D0%B4%D0%B5%D0%BD%D1%82%D0%B8%D1%84%D0%B8%D0%BA%D0%B0%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D1%8B%D0%B9_%D0%BD%D0%BE%D0%BC%D0%B5%D1%80
    // https://www.npmjs.com/package/inn-validate
    // https://ru.wikipedia.org/wiki/%D0%91%D0%B8%D0%B7%D0%BD%D0%B5%D1%81-%D0%B8%D0%B4%D0%B5%D0%BD%D1%82%D0%B8%D1%84%D0%B8%D0%BA%D0%B0%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D1%8B%D0%B9_%D0%BD%D0%BE%D0%BC%D0%B5%D1%80
    // https://serj.ws/salyk


    /*private static function generateSum($inn): int
    {
        $multiplication =
            1 * $inn[0] +
            2 * $inn[1] +
            3 * $inn[2] +
            4 * $inn[3] +
            5 * $inn[4] +
            6 * $inn[5] +
            7 * $inn[6] +
            8 * $inn[7] +
            9 * $inn[8] +
            10 * $inn[9];
//11 * $inn[10];

        $sum = $multiplication % 11;
        if ($sum == 10) {
            $sum =
                1 * $inn[10] +
                2 * $inn[11] +
                3 * $inn[1] +
                4 * $inn[2] +
                5 * $inn[3] +
                6 * $inn[4] +
                7 * $inn[5] +
                8 * $inn[6] +
                9 * $inn[7] +
                10 * $inn[8] +
                11 * $inn[9];
        }

        return $sum;
    }*/

    /*private static function generateSum($inn): int
    {
        $multiplication =
            7 * $inn[0] +
            2 * $inn[1] +
            4 * $inn[2] +
            10 * $inn[3] +
            3 * $inn[4] +
            5 * $inn[5] +
            9 * $inn[6] +
            4 * $inn[7] +
            6 * $inn[8] +
            8 * $inn[9];
        return $multiplication % 11 % 10;
    }*/
}
