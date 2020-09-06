<?php
use PHPUnit\Framework\TestCase;

class FaceCardPointRuleTest extends TestCase
{

    /**
     * @test
     */
    public function 絵札が対象になる(): void
    {
        $rule = new \app\Domain\Player\Hand\FaceCardPointRule();
        $this->assertTrue($rule->isTargetCard(new \app\Domain\Deck\Card(11, 'heart')));
        $this->assertTrue($rule->isTargetCard(new \app\Domain\Deck\Card(13, 'diamond')));
    }


    /**
     * @test
     */
    public function 絵札以外は対象にならない(): void
    {
        $rule = new \app\Domain\Player\Hand\FaceCardPointRule();
        $this->assertFalse($rule->isTargetCard(new \app\Domain\Deck\Card(1, 'club')));
        $this->assertFalse($rule->isTargetCard(new \app\Domain\Deck\Card(10, 'heart')));
    }


    /**
     * @test
     */
    public function カードから点数を計算する(): void
    {
        $rule = new \app\Domain\Player\Hand\FaceCardPointRule();
        $this->assertSame($rule->getCardPoint(new \app\Domain\Deck\Card(11, 'heart')), 10);
    }
}