<?php

namespace LetsLearnAutomatedTesting\Tests;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

use function LetsLearnAutomatedTesting\Rectangle\calculateRectangleArea;

class RectangleTest extends TestCase
{
    #[DataProvider('rectangleProvider')]
    public function testCalculateRectangleArea(
        ?int $expected,
        array $rectangle,
    ): void
    {
        [$length, $width] = $rectangle;

        $this->assertEquals(
            $expected,
            calculateRectangleArea($length, $width)
        );
    }

    public static function rectangleProvider(): array
    {
        return [
            'correct dimensions' => [25, [5, 5]],
            'invalid lenght' => [null, [0, 5]],
            'invalid width' => [null, [5, -5]],
            'invalid dimensions' => [null, [-5, 0]],
        ];
    }
}
