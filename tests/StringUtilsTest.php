<?php

namespace LetsLearnAutomatedTesting\Tests;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use PHPUnit\Framework\TestCase;

use function LetsLearnAutomatedTesting\StringUtils\capitalize;

class StringUtilsTest extends TestCase
{
    public function testCapitalize(): void
    {
        $this->assertEquals('Hello', capitalize('hello'));
        $this->assertEquals('', capitalize(''));
    }
}
