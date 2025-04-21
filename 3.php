<?php
use FFI\Exception;
class DivisionByZeroException extends Exception {}
function divide($x, $y) {
    if ($y == 0) {
        throw new DivisionByZeroException("Нельзя Делить на НОЛЬ!");
    }
    return $x / $y;
}
try {
    print("Результат: " . divide(300, 25));
} catch (DivisionByZeroException $e) {
    print($e -> getMessage());
}
print("<br>");
try {
    print("Результат: " . divide(3, 0));
} catch (DivisionByZeroException $e) {
    print($e -> getMessage());
}
?>
