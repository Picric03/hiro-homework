<?php
use PHPUnit\Framework\TestCase;

class CalcHandPointServiceTest extends TestCase
{
    /**
     * @test
     * @dataProvider 手札のモックと期待する点数
     */
    public function 手札から点数を計算する(array $cards, int $truePoint): void
    {
        $hand = new \app\Domain\Player\Hand\Hand();
        foreach ($cards as $card) {
            $hand->addCard($card);
        }
        $calcService = new \app\Domain\Player\Hand\CalcHandPointService($hand);
        $calcService->calcHandPoint();
        $this->assertSame($calcService->getHandPoint(), $truePoint);

    }

    public function 手札のモックと期待する点数(): array
    {
        return [
            [
                [
                    new \app\Domain\Deck\Card(11, 'heart'),
                    new \app\Domain\Deck\Card(2, 'diamond'),
                ],
                12,
            ],
            [
                [
                    new \app\Domain\Deck\Card(11, 'heart'),
                    new \app\Domain\Deck\Card(1, 'diamond'),
                ],
                21,
            ],
            [
                [
                    new \app\Domain\Deck\Card(11, 'heart'),
                    new \app\Domain\Deck\Card(7, 'diamond'),
                    new \app\Domain\Deck\Card(1, 'diamond'),
                ],
                18,
            ],
            [
                [
                    new \app\Domain\Deck\Card(1, 'heart'),
                    new \app\Domain\Deck\Card(1, 'diamond'),
                ],
                12,
            ],
            [
                [
                    new \app\Domain\Deck\Card(5, 'heart'),
                    new \app\Domain\Deck\Card(2, 'diamond'),
                ],
                7,
            ],


        ];
    }
}