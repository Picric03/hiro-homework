<?php
use PHPUnit\Framework\TestCase;

class HandTest extends TestCase
{
    /**
     * @test
     */
    public function 手持ちのカードを公開する(): void
    {
        $hand = new \app\Domain\Player\Hand\Hand();
        $hand->addCard(new \app\Domain\Deck\Card(1, 'spade'));
        $this->assertTrue(\in_array( new \app\Domain\Deck\Card(1, 'spade'), $hand->getCards()));
    }

}