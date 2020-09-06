<?php


namespace app\Domain\Deck;


class Card
{
    private $number;
    private $mark;

    public function __construct(int $number, string $mark)
    {
        if (!(1 <= $number && $number <= 13)) {
            throw new \RuntimeException('カードの数字が不正です。');
        }
        if (!($mark === 'spade' || $mark === 'heart' || $mark === 'diamond' || $mark === 'club')) {
            throw new \RuntimeException('カードのマークが不正です。');
        }

        $this->number = $number;
        $this->mark = $mark;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getMark(): string
    {
        return $this->mark;
    }


}