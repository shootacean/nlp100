<?php

require 'Util.php';

class Solver
{
    /**
     * @var Util
     */
    private $util;

    public function __construct(Util $util)
    {
        $this->util = $util;
    }

    /**
     * @return void
     */
    public function solveQ0()
    {
        echo strrev("stressed"), "\n";
    }

    /**
     * @return void
     */
    public function solveQ1()
    {
        $word = 'パタトクカシーー';
        $i = 0;
        $tmp = [
            mb_substr($word, $i, 1),
            mb_substr($word, $i + 2, 1),
            mb_substr($word, $i + 4, 1),
            mb_substr($word, $i + 6, 1),
        ];
        echo join('', $tmp), "\n";
    }

    /**
     * @return void
     */
    public function solveQ2()
    {
        $word1 = 'パトカー';
        $word2 = 'タクシー';
        $tmp = [];
        for ($i = 0; $i <= mb_strlen($word1); $i++) {
            $tmp[] = mb_substr($word1, $i, 1);
            $tmp[] = mb_substr($word2, $i, 1);
        }
        echo join('', $tmp), "\n";
    }

    /**
     * @return void
     */
    public function solveQ3()
    {
        $sentence = 'Now I need a drink, alcoholic of course, after the heavy lectures involving quantum mechanics.';
        $words = $this->util->getWordList($sentence);
        foreach ($words as $w) {
            echo mb_strlen($w), "\n";
        }
    }

    /**
     * @return void
     */
    public function solveQ4()
    {
        $sentence = 'Hi He Lied Because Boron Could Not Oxidize Fluorine. New Nations Might Also Sign Peace Security Clause. Arthur King Can.';
        $words = $this->util->getWordList($sentence);
        $map = [];
        foreach ($words as $i => $w) {
            $n = 2;
            if (in_array($i + 1, [1, 5, 6, 7, 8, 9, 15, 16, 19], true)) {
                $n = 1;
            }
            $symbol = substr($w, 0, $n);
            $map[$symbol] = $i + 1;
        }
        // answer
        foreach ($map as $symbol => $i) {
            echo "$symbol: $i\n";
        }
    }

    /**
     * @return void
     */
    public function solveQ5()
    {
        $sentence = 'I am an NLPer';
        $nGrams = $this->util->splitNGram($sentence, 3);
        $wordNGrams = $this->util->splitNGramByWord($sentence, 3);
        foreach ($nGrams as $g) {
            echo $g, "\n";
        }
        foreach ($wordNGrams as $g) {
            echo $g, "\n";
        }
    }

    /**
     * @return void
     */
    public function solveQ6()
    {
        $sentenceX = 'paraparaparadise';
        $sentenceY = 'paragraph';
        $x = $this->util->splitNGram($sentenceX, 2);
        $y = $this->util->splitNGram($sentenceY, 2);
        echo "x: ", PHP_EOL;
        $this->util->outputArray($x);
        echo "y: ", PHP_EOL;
        $this->util->outputArray($y);
        echo "union: ", PHP_EOL;
        $this->util->outputArray($this->util::arrayUnion($x, $y));
        echo "intersect: ", PHP_EOL;
        $this->util->outputArray($this->util::arrayIntersect($x, $y));
        echo "diff: ", PHP_EOL;
        $this->util->outputArray($this->util::arrayDiff($x, $y));
        // has se
        echo "x has 'se': ", in_array('se', $x, true) ? 'true' : 'false', PHP_EOL;
        echo "y has 'se': ", in_array('se', $y, true) ? 'true' : 'false', PHP_EOL;
    }

    /**
     * @return void
     */
    public function solveQ7()
    {
        $solve = function ($x, $y, $z) {
            return "{$x}時の{$y}は{$z}";
        };
        echo $solve(12, '気温', 22.4), PHP_EOL;
    }
}

$solver = new Solver(new Util());
$solver->solveQ7();
