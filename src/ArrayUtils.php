<?php

namespace LetsLearnAutomatedTesting\ArrayUtils;

function without(array $array, array $values = []): array
{
    return array_values(array_diff($array, $values));
}
