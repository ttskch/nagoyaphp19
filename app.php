<?php

// 円盤が3枚のハノイの塔を用意
$hanoi = new Hanoi(3);

// それを解く
$hanoi->solve();

class Hanoi
{
    private $state;
    private $movesCount = 0;

    public function __construct(int $number)
    {
        $this->state = [
            range($number, 1),  // 例えば $number が 3 なら [3,2,1] という配列になる
            [],
            [],
        ];

        // 最初の状態を表示
        echo (string)$this;
    }

    /**
     * ハノイの塔を解く
     */
    public function solve() : void
    {
        $this->move(0, 2);

        echo sprintf("\n%s 回の移動で解けました\n", $this->movesCount);
    }

    /**
     * ある杭から別の杭へ円盤の塊をそのままの並び順で移動させる
     *
     * @param int $from 何番目の杭から円盤を移動させるか (0,1,2)
     * @param int $to 何番目の杭へ円盤を移動させるか (0,1,2)
     * @param int|null $number 何枚の円盤を移動させるか
     */
    public function move(int $from, int $to, int $number = null) : void
    {
        // $number が省略された場合は $from の杭にあるすべての円盤を移動させる
        $number = $number ?? count($this->state[$from]);

        // 移動させたい枚数が1枚だけのときはただ移動させるだけ（$this->moveOne() を使う）
        // （ここに実装を書く）

        // 移動させたい枚数が2枚以上のときは move メソッドを再帰的に使う
        // （ここに実装を書く）
    }

    /**
     * ある杭から別の杭へ円盤を1枚移動させる
     *
     * @param int $from 何番目の杭から円盤を移動させるか (0,1,2）
     * @param int $to 何番目の杭へ円盤を移動させるか (0,1,2)
     */
    private function moveOne(int $from, int $to) : void
    {
        // 円盤を1枚だけ移動させる処理
        // （ここに実装を書く）

        // 円盤を移動させた回数をカウント
        $this->movesCount++;

        // 現在の状態を表示
        echo (string)$this;
    }

    public function __toString() : string
    {
        $format = <<<EOS
| %s
| %s
| %s
---

EOS;
        return sprintf($format, implode(',', $this->state[0]), implode(',', $this->state[1]), implode(',', $this->state[2]));
    }
}
