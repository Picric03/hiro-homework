<?php


namespace app\Domain\Player\Hand;


use app\Domain\Deck\Card;

class Hand
{
    private $cards = [];
    private $point = 0;

    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

}