<?php
use PHPUnit\Framework\TestCase;

class AcePointRuleTest extends TestCase
{
    /**
     * @test
     */
    public function エースのカードが対象になる(): void
    {
        $rule = new \app\Domain\Player\Hand\AcePointRule(11);
        $this->assertTrue($rule->isTargetCard(new \app\Domain\Deck\Card(1, 'diamond')));
    }

    /**
     * @test
     */
    public function エース以外は対象外(): void
    {
        $rule = new \app\Domain\Player\Hand\AcePointRule(11);
        $this->assertFalse($rule->isTargetCard(new \app\Domain\Deck\Card(13, 'diamond')));
        $this->assertFalse($rule->isTargetCard(new \app\Domain\Deck\Card(13, 'diamond')));
    }

    /**
     * @test
     */
    public function 合計の点数が21以下なら11とする(): void
    {
        $rule = new \app\Domain\Player\Hand\AcePointRule(10);
        $this->assertSame($rule->getCardPoint(new \app\Domain\Deck\Card(1, 'diamond')), 11);
    }

    /**
     * @test
     */
    public function 合計の点数が21以上なら1とする(): void
    {
        $rule = new \app\Domain\Player\Hand\AcePointRule(11);
        $this->assertSame($rule->getCardPoint(new \app\Domain\Deck\Card(1, 'diamond')), 1);
    }
}