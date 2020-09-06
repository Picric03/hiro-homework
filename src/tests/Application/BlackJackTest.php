<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class BlackJackTest extends TestCase
{
    /**
     * @test
     */
    public function run_Resultを返す(): void
    {
        $blackJack = new \app\Application\BlackJack();

        $this->assertTrue($blackJack->run() instanceof \app\Domain\Result\Result);
    }
}