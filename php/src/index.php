<?php

/**
 * @return void
 */
function q_00()
{
    echo strrev("stressed"), "\n";
}

/**
 * @return void
 */
function q_01()
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
function q_02()
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
function q_03()
{
    $sentence = 'Now I need a drink, alcoholic of course, after the heavy lectures involving quantum mechanics.';
    $words = get_word_list($sentence);
    foreach ($words as $w) {
        echo mb_strlen($w), "\n";
    }
}

/**
 * @return void
 */
function q_04()
{
    $sentence = 'Hi He Lied Because Boron Could Not Oxidize Fluorine. New Nations Might Also Sign Peace Security Clause. Arthur King Can.';
    $words = get_word_list($sentence);
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
 * Returns an English word-separated array
 *
 * @param string $s
 * @return string[]
 */
function get_word_list(string $s)
{
    return explode(' ', str_replace('.', '', str_replace(',', '', $s)));
}

q_04();
