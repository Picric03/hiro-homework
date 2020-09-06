<?php


namespace app\Domain\Player;


use app\Domain\Player\Hand\Hand;

interface DrawRule
{
    public function canDraw(Hand $hand): bool;
}