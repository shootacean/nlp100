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

    /**
     * Output the array to standard output
     *
     * @param array<mixed> $a
     * @return void
     */
    public static function outputArray(array $a)
    {
        foreach ($a as $k => $v) {
            echo "key: $k, value: $v", PHP_EOL;
        }
        echo PHP_EOL;
    }

    /**
     * Returns the summed set of arrays
     *
     * @param array<mixed> $a
     * @param array<mixed> $b
     * @return array<mixed>
     */
    public static function arrayUnion(array $a, array $b)
    {
        return array_unique(array_merge($a, $b));
    }

    /**
     * Returns a product set of arrays
     *
     * @param array<mixed> $a
     * @param array<mixed> $b
     * @return array<mixed>
     */
    public static function arrayIntersect(array $a, array $b)
    {
        return array_unique(array_intersect($a, $b));
    }

    /**
     * Returns the difference set of arrays
     *
     * @param array<mixed> $a
     * @param array<mixed> $b
     * @return array<mixed>
     */
    public static function arrayDiff(array $a, array $b)
    {
        return array_unique(array_diff($a, $b));
    }
}
