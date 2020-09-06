<?php
namespace app\Application;

use app\Domain\Dealer\Dealer;
use app\Domain\Dealer\StartingAceRule;
use app\Domain\Deck\Deck;
use app\Domain\Player\DrawPointRule;
use app\Domain\Player\DrawRules;
use app\Domain\Player\DrawServices;
use app\Domain\Player\Player;
use app\Domain\Result\CalcResultService;
use app\Domain\Result\Result;

class BlackJack
{
    private $deck;
    private $dealer;
    private $mainPlayer;
    private $otherPlayers = [];
    private $drawRules;

    /**
     * BlackJack constructor.
     */
    public function __construct()
    {
        $this->deck = new Deck();
        $this->dealer = new Dealer();
        $this->mainPlayer = new Player();
        $this->otherPlayers[] = new Player();
        $this->drawRules = new DrawRules();
        $this->drawRules->addRule(new DrawPointRule());
    }


    public function run(): Result
    {
        $this->distribute();
        $this->drawCard();

        $calcResultService = new CalcResultService($this->mainPlayer, $this->otherPlayers);
        $calcResultService->calcResult();
        return $calcResultService->getResult();
    }

    private function distribute(): void
    {
        $this->dealer->distributeOnRule(new StartingAceRule(), $this->deck, $this->mainPlayer);
        foreach ($this->otherPlayers as $player) {
            $this->dealer->distribute($this->deck, $player);
        }
    }

    private function drawCard(): void
    {
        $drawService = new DrawServices(
            $this->mainPlayer,
            $this->deck,
            $this->drawRules
        );
        $drawService->drawCard();


        foreach ($this->otherPlayers as $otherPlayer) {
            $drawService = new DrawServices(
                $otherPlayer,
                $this->deck,
                $this->drawRules
            );
            $drawService->drawCard();
        }
    }
}