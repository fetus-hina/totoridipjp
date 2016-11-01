<?php
namespace jp3cki\totoridipjp;

// @codeCoverageIgnoreStart
if (\class_exists('TypeError')) { // PHP 7
    class TypeError extends \TypeError
    {
    }
} else { // PHP 5
    class TypeError extends \Exception
    {
    }
}
// @codeCoverageIgnoreEnd 
