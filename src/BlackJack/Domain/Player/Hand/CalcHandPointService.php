<?php
namespace app\Domain\Player\Hand;


class CalcHandPointService
{
    private $hand;
    private $handPoint = 0;

    /**
     * CalcHandPointService constructor.
     * @param Hand $hand
     */
    public function __construct(Hand $hand)
    {
        $this->hand = $hand;
    }

    public function calcHandPoint(): void
    {
        $faceCardRule = new FaceCardPointRule();
        foreach ($this->hand->getCards() as $card) {
            $aceRule = new AcePointRule($this->handPoint);

            if ($faceCardRule->isTargetCard($card)) {
                $this->handPoint += $faceCardRule->getCardPoint($card);
            } else if ($aceRule->isTargetCard($card)) {
                $this->handPoint += $aceRule->getCardPoint($card);
            } else {
                $this->handPoint += $card->getNumber();
            }
        }
    }

    public function getHandPoint(): int
    {
        return $this->handPoint;
    }


}