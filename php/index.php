<?php

function q_00()
{
    echo strrev("stressed"), "\n";
}

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

function q_03()
{
    $sentence = 'Now I need a drink, alcoholic of course, after the heavy lectures involving quantum mechanics.';
    $words = explode(' ', str_replace('.', '', str_replace(',', '', $sentence)));
    foreach ($words as $w) {
        echo mb_strlen($w), "\n";
    }
}

q_00();
q_01();
q_02();
q_03();