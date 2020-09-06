<?php


namespace app\Domain\Dealer;


use app\Domain\Deck\Deck;
use app\Domain\Player\Player;

interface DealRule
{
    public function getCards(Deck $deck): array;
}