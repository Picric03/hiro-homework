<?php
use PHPUnit\Framework\TestCase;

class DealerTest extends TestCase
{
    /**
     * @test
     */
    public function distribute_カードを2枚プレイヤーに配る(): void
    {
        $player = new \app\Domain\Player\Player();
        $dealer = new \app\Domain\Dealer\Dealer();
        $dealer->distribute(new \app\Domain\Deck\Deck(), $player);

        $this->assertSame(count($player->getHand()->getCards()), 2);
    }


    /**
     * @test
     */
    public function distributeOnRule_渡されたルールでプレイヤーにカードを配る(): void
    {
        $player = new \app\Domain\Player\Player();
        $dealer = new \app\Domain\Dealer\Dealer();
        $dealer->distributeOnRule(new \app\Domain\Dealer\StartingAceRule(), new \app\Domain\Deck\Deck(), $player);

        $this->assertSame(count($player->getHand()->getCards()), 2);
        $this->assertSame($player->getHand()->getCards()[0]->getNumber(), 1);
    }
}