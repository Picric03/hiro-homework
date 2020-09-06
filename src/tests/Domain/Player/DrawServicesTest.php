<?php

use PHPUnit\Framework\TestCase;
use app\Domain\Player\Player;

class DrawServicesTest extends TestCase
{
    /**
     * @test
     */
    public function DrawRulesがtrueの時のみカードを引ける(): void
    {

        $drawRules = new \app\Domain\Player\DrawRules();
        $drawRules->addRule(new \app\Domain\Player\DrawPointRule());

        $player = new Player();

        $drawService = new \app\Domain\Player\DrawServices($player, new \app\Domain\Deck\Deck(), $drawRules);
        $drawService->drawCard();

        $this->assertTrue(count($player->getHand()->getCards()) > 0);
    }

}