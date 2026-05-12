<?php

namespace LetsLearnAutomatedTesting\Tests;

require_once(__DIR__ . '/../src/StringUtils.php');

use function LetsLearnAutomatedTesting\StringUtils\capitalize;

assert(capitalize('hello') === 'Hello');
assert(capitalize('') === '');

echo 'Все тесты пройдены!';
