<?php
namespace app\Domain\Dealer;


use app\Domain\Deck\Card;
use app\Domain\Deck\Deck;

class StartingAceRule implements DealRule
{
    public function getCards(Deck $deck): array
    {
        return [
            $deck->getCardByNumber(1),
            $deck->distribute(),
        ];
    }

}