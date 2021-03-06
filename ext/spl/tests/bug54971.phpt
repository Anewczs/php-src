--TEST--
Bug #54971 (Wrong result when using iterator_to_array with use_keys on true)
--SKIPIF--
<?php
if (!extension_loaded('dom')) die("skip this test needs --enable-dom");
?>
--FILE--
<?php

$source = <<<XML
<root>
<node>val1</node>
<node>val2</node>
</root>
XML;


$doc = new DOMDocument();
$doc->loadXML($source);

$xpath = new DOMXPath($doc);
$items = $xpath->query('//node');

print_r(iterator_to_array($items, false));
print_r(iterator_to_array($items, true));
?>
--EXPECT--
Array
(
    [0] => DOMElement Object
        (
        )

    [1] => DOMElement Object
        (
        )

)
Array
(
    [0] => DOMElement Object
        (
        )

    [1] => DOMElement Object
        (
        )

)
