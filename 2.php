<?php
use FFI\Exception;
class FileReadException extends Exception {}
function fileRead($filename) {
    if (!file_exists($filename)) {
        throw new FileReadException("Файлик ''$filename'' НЕ Найден...");
    } elseif (!is_readable($filename)) {
        throw new FileReadException("Тебе НЕ Разрешено это Читать!");
    }
    $content = file_get_contents($filename);
    if ($content === false) {
        throw new FileReadException("Ошибка при Чтении ''$filename''");
    }
    return $content;
}
try {
    $filename = "txt.txt";
    if (file_exists($filename)) {
        $content = fileRead($filename);
        if (mb_strlen(trim($content)) > 0) {
            print("Контент Файла ''$filename'': $content");
        } else {
            print("Файл ''$filename'' Пустой...");
        }
    } else {
        print("Файл ''$filename'' НЕ Найден");
    }
} catch (FileReadException $e) {
    print("Ошибка: {$e -> getMessage()}");
}
?>
