<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use app\Application\BlackJackSimulator;
use app\Domain\Result\Result;


class BlackJackSimulatorTest extends TestCase
{
    /**
     * @test
     */
    public function Resultを返す(): void
    {
        $blackJack = new BlackJackSimulator();

        $this->assertTrue($blackJack->simulate() instanceof Result);
    }
}
