<?php


namespace app\Domain\Player\Hand;


use app\Domain\Deck\Card;

class AcePointRule implements CardPointRule
{
    private $totalCardPoint;

    /**
     * AcePointRule constructor.
     * @param $totalCardPoint
     */
    public function __construct($totalCardPoint)
    {
        $this->totalCardPoint = $totalCardPoint;
    }


    public function isTargetCard(Card $card): bool
    {
        return $card->getNumber() === 1;
    }

    public function getCardPoint(Card $card): int
    {
        if (!$this->isTargetCard($card)) {
            throw new \LogicException("対象外のカードです。");
        }

        if ($this->totalCardPoint + 11 <= 21) {
            return 11;
        }
        return 1;
    }

}