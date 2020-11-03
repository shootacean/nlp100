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

q_00();
q_01();