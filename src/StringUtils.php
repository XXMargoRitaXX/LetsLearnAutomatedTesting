<?php

namespace LetsLearnAutomatedTesting\StringUtils;

function capitalize(string $string): string
{
    if ($string === '') {
        return '';
    }
    $firstSymbol = mb_strtoupper($string[0]);
    $restSubstring = mb_substr($string, 1);
    return "{$firstSymbol}{$restSubstring}";
}
