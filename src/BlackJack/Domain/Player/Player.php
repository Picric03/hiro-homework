<?php


namespace app\Domain\Player;


use app\Domain\Deck\Card;
use app\Domain\Player\Hand\Hand;

class Player
{
    private $hand;

    /**
     * Player constructor.
     * @param $hand
     */
    public function __construct()
    {
        $this->hand = new Hand();
    }


    public function getHand(): Hand
    {
        return $this->hand;
    }


    public function addCard(Card $card): void
    {
        $this->hand->addCard($card);
    }
}