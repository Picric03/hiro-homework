<?php
namespace app\Domain\Deck;

class Deck
{
    private $cards = [];

    public function __construct()
    {
        $marks = ["spade", "heart", "diamond", "club"];

        foreach ($marks as $mark) {
            for ($i = 1; $i <= 13; $i++) {
                $this->cards[] = new Card($i, $mark);
            }
        }
    }

    public function distribute(): Card
    {
        $key = array_rand($this->cards);
        $card = $this->cards[$key];
        unset($this->cards[$key]);

        return $card;
    }

    public function getCardByNumber(int $number): Card
    {
        foreach ($this->cards as $key => $card) {
            if ($card->getNumber() === $number) {
                unset($this->cards[$key]);
                return $card;
            }
        }
        throw new \RuntimeException("デッキにカードが存在しません。");
    }

    public function getCards(): array
    {
        return $this->cards;
    }
}