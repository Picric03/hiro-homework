<?php
use app\Domain\Player\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{

    /**
     * @test
     */
    public function カードを手札に加える(): void
    {
        $card = new \app\Domain\Deck\Card(2, 'heart');
        $player = new Player();
        $player->addCard($card);
        $this->assertTrue(in_array($card, $player->getHand()->getCards(), true));
    }

}
