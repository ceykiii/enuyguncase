<?php

namespace App;
/**
 * @author : Cem Açar
 */
class Constants
{
    //Provider Url List
    public static $providerList = [
        'TrProvider',
        'EnProvider',
    ];

    //weekly workforce all develepoler
    public static $totalWorkforce = 15 * 45;
    //Weekly accoring to developer
    public static $maxCapacityOfDevolopers = [
        'developer 5' => 45 * 5,
        'developer 4' => 45 * 4,
        'developer 3' => 45 * 3,
        'developer 2' => 45 * 2,
        'developer 1' => 45,
    ];

}