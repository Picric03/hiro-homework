<?php
use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
    /**
     * @test
     */
    public function カードを配る(): void
    {
        $deck = new \app\Domain\Deck\Deck();
        $this->assertTrue($deck->distribute() instanceof \app\Domain\Deck\Card);
    }

    /**
     * @test
     */
    public function 配ったカードは配列から削除される(): void
    {
        $deck = new \app\Domain\Deck\Deck();
        $card = $deck->distribute();

        $this->assertFalse(in_array($card, $deck->getCards()));
    }

    /**
     * @test
     * @dataProvider 取得したいカードの数字
     */
    public function 指定したカードを引くことができる(int $number): void
    {
        $deck = new \app\Domain\Deck\Deck();
        $card = $deck->getCardByNumber($number);
        $this->assertSame($card->getNumber(), $number);
        $this->assertFalse(in_array($card, $deck->getCards()));
    }

    /**
     * @return array
     */
    public function 取得したいカードの数字(): array
    {
        return [
            [2],
            [5],
            [12],
            [1],
        ];
    }
}