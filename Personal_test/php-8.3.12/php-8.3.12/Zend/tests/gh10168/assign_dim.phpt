--TEST--
GH-10168: Assign dim
--FILE--
<?php

class Test {
    function __destruct() {
        $GLOBALS['a'] = null;
    }
}

$a = [new Test];
var_dump($a[0] = new Test);

?>
--EXPECT--
object(Test)#2 (0) {
}
