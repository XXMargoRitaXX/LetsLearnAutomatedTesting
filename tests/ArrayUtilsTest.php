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

use function LetsLearnAutomatedTesting\ArrayUtils\without;

/* Утверждение (англ. assertion) – проверка, которая 
проводится для подтверждения корректности работы программы. 
Обычно такая проверка заключается в сравнении ожидаемых и 
фактических значений. */

class ArrayUtilsTest extends TestCase
{
    public function testWithout(): void
    {
        $this->assertEquals([3], without([2, 1, 2, 3], [1, 2]));
        $this->assertEquals([], without([], [3]));
        $this->assertEquals([2, 1, 2, 3], without([2, 1, 2, 3]));
    }
}
