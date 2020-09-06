<?php
namespace app\Domain\Player\Hand;

use app\Domain\Deck\Card;

class FaceCardPointRule implements CardPointRule
{
    public function isTargetCard(Card $card): bool
    {
        return $card->getNumber() >= 11;
    }

    public function getCardPoint(Card $card): int
    {
        if (!$this->isTargetCard($card)) {
            throw new \LogicException("対象外のカードです。");
        }

        return 10;
    }

}