<?php

namespace LetsLearnAutomatedTesting\Rectangles;

function calculateRectangleArea(int $length, int $width): ?int
{
    if ($length <= 0 || $width <= 0) {
        return null;
    }
    return $length * $width;
}
