<?php
use FFI\Exception;
class DatabaseConnectionException extends Exception {}
function DataBaseConnect($host, $dbName, $user, $password) {
    throw new DatabaseConnectionException("НЕ Получилось Подключится к Базе Данных ''$dbName''");
}
try {
    DataBaseConnect("localhost", "st", "student", "student");
} catch (DatabaseConnectionException $e) {
    print($e -> getMessage());
}
?>
