<?php
use PHPUnit\Framework\TestCase;

class StartingAceRuleTest extends TestCase
{
    /**
     * @test
     */
    public function エースを取得する(): void
    {
        $rule = new \app\Domain\Dealer\StartingAceRule();
        $cards = $rule->getCards(new \app\Domain\Deck\Deck());

        $this->assertSame($cards[0]->getNumber(), 1);
        $this->assertTrue($cards[1] instanceof \app\Domain\Deck\Card);
    }
}