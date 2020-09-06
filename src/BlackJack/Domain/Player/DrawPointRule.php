<?php


namespace app\Domain\Player;


use app\Domain\Player\Hand\CalcHandPointService;
use app\Domain\Player\Hand\Hand;

class DrawPointRule implements DrawRule
{
    public function canDraw(Hand $hand): bool
    {
        $calcPoint = new CalcHandPointService($hand);
        $calcPoint->calcHandPoint();

        return $calcPoint->getHandPoint() <= 15;
    }

}