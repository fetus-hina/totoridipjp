# Totoridipjp

http://totori.dip.jp/

See also [original project](https://github.com/toshia/totoridipjp-ruby).

## Installation

```sh
$ composer.phar require jp3cki/totoridipjp:^0.1.0
```

## Usage

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$totori = new \jp3cki\totoridipjp\Totori();
$url = $totori->getIwashi();
var_dump($url); // string(62) "http://totoridipjp-cdn.c.sakurastorage.jp/imgs/totori_vita.jpg"
```

## License

[Unlicense](LICENSE) a.k.a. public domain
