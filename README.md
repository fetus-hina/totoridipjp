Totoridipjp
===========

http://totori.dip.jp/

See also the [original project](https://github.com/toshia/totoridipjp-ruby).


Installation
------------

```sh
$ composer.phar require jp3cki/totoridipjp:^0.1.0
```


Usage
-----

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$totori = new \jp3cki\totoridipjp\Totori();
$url = $totori->getIwashi();
echo $url . "\n";  // "http://～.jpg"
```


License
-------

### Source codes

Dual licensed under the [NYSL-0.9982][^NYSL] and [Unlicense][^Unlicense] license.

For details, visit websites and/or read the [LICENSE](LICENSE.md) file.

### Documents

CC0 ([English][^CC0EN], [Japanese][^CC0JA])


[^NYSL]: http://www.kmonos.net/nysl/
[^Unlicense]: http://unlicense.org/
[^CC0EN]: https://creativecommons.org/publicdomain/zero/1.0/deed.en
[^CC0JA]: https://creativecommons.org/publicdomain/zero/1.0/deed.ja
