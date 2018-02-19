<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 02/02/2018
 * Time: 15:18
 */

namespace AppBundle\Utils;


use AppBundle\Entity\Plat;

class PlatManager
{
    /**
     * @param Plat $plat
     * @return bool
     */
    public function isBigDeal(Plat $plat)
    {
        $isBigDeal = false;
        if ($plat->getPrice() < 10) {
            $isBigDeal = true;
        }

        return $isBigDeal;
    }
}