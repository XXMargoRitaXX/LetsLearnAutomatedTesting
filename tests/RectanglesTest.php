<?php

namespace LetsLearnAutomatedTesting\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

use function LetsLearnAutomatedTesting\Rectangles\calculateRectangleArea;

/* Data Provider - специальный метод, который возвращает массив 
наборов данных. Каждый набор передаётся в тестовый метод в виде 
аргументов. */

class RectanglesTest extends TestCase
{
    // Связывание метода-провайдера с методом-тестом при помощи атрибута
    #[DataProvider('rectanglesProvider')]
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

    public static function rectanglesProvider(): array
    {
        return [
            // Именованные наборы данных
            'correct dimensions' => [25, [5, 5]],
            'invalid lenght' => [null, [0, 5]],
            'invalid width' => [null, [5, -5]],
            'invalid dimensions' => [null, [-5, 0]],
        ];
    }
}
