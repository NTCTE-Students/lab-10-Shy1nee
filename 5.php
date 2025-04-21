<?php
class LogException extends Exception {}
$filename = "error.log";
function ErrorLog($filename, $messenge) {
    file_put_contents($filename, date("Y-m-d H:i:s") . " - " . $messenge . PHP_EOL, FILE_APPEND);
}
try {
    throw new LogException("Ошибочка Type-Like Метода Ввода Данных");
} catch (LogException $e) {
    ErrorLog($filename, $e -> getMessage());
    print("Ошибка Записана в $filename");
}
?>
