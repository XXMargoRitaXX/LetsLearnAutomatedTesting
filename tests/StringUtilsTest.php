<?php

namespace LetsLearnAutomatedTesting\Tests;

require_once(__DIR__ . '/../src/StringUtils.php');

use function LetsLearnAutomatedTesting\StringUtils\capitalize;

if (capitalize('hello') !== 'Hello') {
    throw new \Exception('Функция работает неверно!');
}

if (capitalize('') !== '') {
    throw new \Exception('Функция работает неверно!');
}

echo 'Все тесты пройдены!';
