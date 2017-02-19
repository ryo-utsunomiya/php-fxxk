php-fxxk
========

An easy-customizable Brainfuck interpreter for PHP.

Install
-------

```
composer require ryo-utsunomiya/php-fxxk
```

Usage
-----

```
<?php

require_once __DIR__ . '/vendor/autoload.php';

use BrainFuck\Language;
use BrainFuck\Mapping;

// Basic Brainfuck
$Language = new Language();
$output = $Language->run('++++++++++[>+++++++>++++++++++>+++>+<<<<-]>++.>+.+++++++..+++.>++.<<+++++++++++++++.>.+++.------.--------.>+.>.');
print_char_array($output);

// Customized mapping
$mapping = new Mapping([
    'NXT',
    'PRV',
    'INC',
    'DEC',
    'PUT',
    'GET',
    'OPN',
    'CLS'
]);

// Generate hello world program
$hw = $mapping->helloWorld();

// Use customized mapping
$Language = Language::withMapping($mapping);
$output = $Language->run($hw);
print_char_array($output);

function print_char_array(array $charArray)
{
    foreach ($charArray as $char) {
        echo chr($char);
    }
}
```

Special Thanks
--------------

Inspired by: https://github.com/masarakki/r-fxxk

Forked from: https://github.com/ircmaxell/PHP-BrainFuck
