<?php
require_once __DIR__ . '/vendor/autoload.php';


$blackJackSimulator = new \app\Application\BlackJackSimulator();
$win = 0;
$lose = 0;
$even = 0;
for ($i = 0; $i < 10000; $i++) {
    $result = $blackJackSimulator->simulate();
    if ($result->isWin()) {
        $win++;
    } elseif ($result->isLose()) {
        $lose++;
    } else {
        $even++;
    }
}
echo "勝敗は {$win} 勝 {$lose} 敗 {$even} 引き分けです";
