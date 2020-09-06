<?php


namespace app\Domain\Player;


class DrawRules
{
    private $drawRules = [];

    public function addRule(DrawRule $rule)
    {
        $this->drawRules[] = $rule;
        return $this;
    }

    public function getDrawRules(): array
    {
        return $this->drawRules;
    }


}