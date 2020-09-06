<?php


namespace app\Domain\Player\Hand;


use app\Domain\Deck\Card;

interface CardPointRule
{
    public function isTargetCard(Card $card): bool;
    public function getCardPoint(Card $card): int;
}