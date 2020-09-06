<?php
namespace app\Application;

use app\Domain\Result\Result;


class BlackJackSimulator
{
    public function simulate(): Result
    {
        $blackJack = new BlackJack();
        return $blackJack->run();
    }
}