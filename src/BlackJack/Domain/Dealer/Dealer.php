<?php
namespace app\Domain\Dealer;


use app\Domain\Deck\Deck;
use app\Domain\Player\Player;

class Dealer
{
    public function distribute(Deck $deck, Player $player): void
    {
        $player->addCard($deck->distribute());
        $player->addCard($deck->distribute());
    }

    public function distributeOnRule(DealRule $rule, Deck $deck, Player $player): void
    {
        $cards = $rule->getCards($deck);
        foreach ($cards as $card) {
            $player->addCard($card);
        }
    }
}