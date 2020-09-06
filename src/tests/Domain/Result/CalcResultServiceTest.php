<?php
use PHPUnit\Framework\TestCase;

class CalcResultServiceTest extends TestCase
{
    /**
     * @test
     * @dataProvider mainPlayerが勝ちパターン
     */
    public function calcResult_mainPlayer勝ち(
        \app\Domain\Player\Player $mainPlayer,
        array $otherPlayers
    ): void
    {
        $calcResultService = new \app\Domain\Result\CalcResultService($mainPlayer, $otherPlayers);
        $calcResultService->calcResult();
        $result = $calcResultService->getResult();
        $this->assertTrue($result->isWin());
    }

    /**
     * @test
     * @dataProvider mainPlayerが負けパターン
     */
    public function calcResult_mainPlayer負け(
        \app\Domain\Player\Player $mainPlayer,
        array $otherPlayers
    ): void
    {
        $calcResultService = new \app\Domain\Result\CalcResultService($mainPlayer, $otherPlayers);
        $calcResultService->calcResult();
        $result = $calcResultService->getResult();
        $this->assertTrue($result->isLose());
    }


    /**
     * @test
     * @dataProvider 引き分けパターン
     */
    public function calcResult_引き分け(
        \app\Domain\Player\Player $mainPlayer,
        array $otherPlayers
    ): void
    {
        $calcResultService = new \app\Domain\Result\CalcResultService($mainPlayer, $otherPlayers);
        $calcResultService->calcResult();
        $result = $calcResultService->getResult();
        $this->assertFalse($result->isLose());
        $this->assertFalse($result->isWin());
    }

    public function mainPlayerが勝ちパターン(): array
    {
        return [
            [$this->createPlayer([1, 12]), [$this->createPlayer([1, 9])]],
            [$this->createPlayer([3, 4]), [$this->createPlayer([2, 3])]],
            [$this->createPlayer([3, 4, 7]), [$this->createPlayer([2, 3, 6])]],
        ];
    }

    public function mainPlayerが負けパターン(): array
    {
        return [
            [$this->createPlayer([13, 12, 9]), [$this->createPlayer([1, 9])]],
            [$this->createPlayer([3, 4]), [$this->createPlayer([12, 13])]],
            [$this->createPlayer([3, 4, 7]), [$this->createPlayer([5, 5, 1])]],
        ];
    }

    public function 引き分けパターン(): array
    {
        return [
            [$this->createPlayer([13, 12, 9]), [$this->createPlayer([12, 13, 3])]],
            [$this->createPlayer([3, 4]), [$this->createPlayer([3, 4])]],
            [$this->createPlayer([1, 13]), [$this->createPlayer([12, 12, 1])]],
        ];
    }

    private function createPlayer(array $cardNumbers): \app\Domain\Player\Player
    {
        $marks = ["spade", "heart", "diamond", "club"];

        $player = new \app\Domain\Player\Player();
        foreach ($cardNumbers as $number) {
            $key = array_rand($marks);
            $player->addCard(new \app\Domain\Deck\Card($number, $marks[$key]));
        }
        return $player;
    }
}