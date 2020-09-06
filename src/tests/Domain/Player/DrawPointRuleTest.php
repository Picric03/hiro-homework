<?php
use PHPUnit\Framework\TestCase;

class DrawPointRuleTest extends TestCase
{
    /**
     * @test
     * @dataProvider ポイントが15以下の手札
     */
    public function 手札のポイントが15以下ならtrue(\app\Domain\Player\Hand\Hand $hand): void
    {
        $rule = new \app\Domain\Player\DrawPointRule();
        $this->assertTrue($rule->canDraw($hand));
    }

    public function ポイントが15以下の手札(): array
    {
        $hand1 = new \app\Domain\Player\Hand\Hand();
        $hand1->addCard(new \app\Domain\Deck\Card(1, 'heart'));

        $hand2 = new \app\Domain\Player\Hand\Hand();
        $hand2->addCard(new \app\Domain\Deck\Card(11, 'diamond'));
        $hand2->addCard(new \app\Domain\Deck\Card(5, 'club'));

        $hand3 = new \app\Domain\Player\Hand\Hand();
        $hand3->addCard(new \app\Domain\Deck\Card(3, 'spade'));

        return [
            [$hand1], [$hand2], [$hand3]
        ];
    }
}