<?php
namespace app\Domain\Result;

class Result
{
    private $result;

    public function isWin(): bool
    {
        return $this->result === true;
    }

    public function isLose(): bool
    {
        return $this->result === false;
    }

    public function setWin(): void
    {
        $this->result = true;
    }

    public function setLose(): void
    {
        $this->result = false;
    }

}