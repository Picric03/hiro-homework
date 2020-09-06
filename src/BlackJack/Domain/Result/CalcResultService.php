<?php


namespace app\Domain\Result;


use app\Domain\Player\Hand\CalcHandPointService;
use app\Domain\Player\Player;

class CalcResultService
{
    private $result;
    private $mainPlayer;
    private $otherPlayers;

    /**
     * CalcResultService constructor.
     * @param $mainPlayer
     * @param $otherPlayers
     */
    public function __construct($mainPlayer, $otherPlayers)
    {
        $this->result = new Result();
        $this->mainPlayer = $mainPlayer;
        $this->otherPlayers = $otherPlayers;
    }

    public function getResult(): Result
    {
        return $this->result;
    }


    public function calcResult(): void
    {
        $mainPlayerPoint = $this->calcHandPoint($this->mainPlayer);

        foreach ($this->otherPlayers as $player) {
            $otherPlayerPoint = $this->calcHandPoint($player);

            if ($otherPlayerPoint === $mainPlayerPoint) {
                return;
            }

            if ($otherPlayerPoint <= 21 && ($otherPlayerPoint > $mainPlayerPoint || $mainPlayerPoint > 21)) {
                $this->result->setLose();
                return;
            }
        }
        if ($mainPlayerPoint > 21) {
            return;
        }

        $this->result->setWin();
    }

    private function calcHandPoint(Player $player): int
    {
        $service = new CalcHandPointService($player->getHand());
        $service->calcHandPoint();
        return $service->getHandPoint();
    }




}