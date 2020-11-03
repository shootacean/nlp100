<?php

class Util
{
    /**
     * Returns an English word-separated array
     *
     * @param string $s
     * @return string[]
     */
    public static function getWordList(string $s)
    {
        return explode(' ', str_replace('.', '', str_replace(',', '', $s)));
    }

    /**
     * Generate n-grams
     *
     * @param string $s
     * @param int $n
     * @return string[]
     */
    public static function splitNGram(string $s, int $n): array
    {
        $tmp = [];
        for ($i = 0; $i < mb_strlen($s) - ($n - 1); $i++) {
            $tmp[] = mb_substr($s, $i, $n);
        }
        return $tmp;
    }

    /**
     * Generate n-grams by word
     *
     * @param string $s
     * @param int $n
     * @return string[]
     */
    public static function splitNGramByWord(string $s, int $n): array
    {
        $tmp = [];
        $words = self::getWordList($s);
        $limit = count($words) - ($n - 1);
        for ($i = 0; $i < $limit; $i++) {
            $tmp[] = self::implodeRange(' ', $words, $i, $n);
        }
        return $tmp;
    }

    /**
     * Combines elements of an array from a specified range into a string.
     *
     * @param string $glue
     * @param array<mixed> $pieces
     * @param int $from
     * @param int $to
     * @return string
     */
    public static function implodeRange(string $glue, array $pieces, int $from, int $to)
    {
        $a = array_slice($pieces, $from, $to);
        return implode($glue, $a);
    }
}
