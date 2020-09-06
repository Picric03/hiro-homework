<?php


namespace app\Domain\Player;


use app\Domain\Deck\Deck;

class DrawServices
{
    private $player;
    private $deck;
    private $drawRules;
    private $isDrawLimit = true;

    /**
     * DrawServices constructor.
     * @param $player
     * @param $deck
     * @param $drawRules
     */
    public function __construct(Player $player, Deck $deck, DrawRules $drawRules)
    {
        $this->player = $player;
        $this->deck = $deck;
        $this->drawRules = $drawRules;
    }


    public function drawCard(): void
    {
        while ($this->isDrawLimit) {
            $hand = $this->player->getHand();

            foreach ($this->drawRules->getDrawRules() as $rule) {
                if (!$rule->canDraw($hand)) {
                    $this->isDrawLimit = false;
                    return;
                }
            }
            $this->player->addCard($this->deck->distribute());
        }

    }
}