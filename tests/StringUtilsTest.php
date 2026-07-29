<?php

namespace LetsLearnAutomatedTesting\Tests;

use PHPUnit\Framework\TestCase;

use function LetsLearnAutomatedTesting\StringUtils\capitalize;
use function LetsLearnAutomatedTesting\StringUtils\reverse;

/* Фикстуры — заранее подготовленные наборы данных, которые 
используются в тестировании для создания стабильной и предсказуемой 
среды. */

class StringUtilsTest extends TestCase
{
    // Построение пути к фикстуре
    public function getFixtureFullPath(string $fixtureName): string
    {
        $parts = [__DIR__, 'fixtures', $fixtureName];
        return realpath(implode('/', $parts));
    }

    public function testCapitalize(): void
    {
        $this->assertEquals('Hello', capitalize('hello'));
        $this->assertEquals('', capitalize(''));
    }

    public function testReverse(): void
    {
        $this->assertEquals('olleh', reverse('hello'));
        $this->assertEquals('', reverse(''));

        $this->assertEquals('тевирП', reverse('Привет'));

        $pathToInputData = $this->getFixtureFullPath('longString.txt');
        $pathToOutputData = $this->getFixtureFullPath('reversedLongString.txt');
        
        // Чтение данных из файлов (т.е. использование фикстур)
        $longString = file_get_contents($pathToInputData);
        $reversedLongString = file_get_contents($pathToOutputData);

        $this->assertEquals($reversedLongString, reverse($longString));
    }
}
