<?php
use FFI\Exception;
class ValidationException extends Exception {}
function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new ValidationException("$email - Неверный Формат E-Mail!");
    }
    print("$email - E-Mail Корректный");
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? "";
    try {
        validateEmail($email);
    } catch (ValidationException $e) {
        print($e -> getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проверка</title>
</head>
<body>
    <form method="post">
        <label for="email">Введи E-Mail:</label>
        <input type="text" id="email" name="email" required>
        <button type="submit">Проверка</button>
    </form>
</body>
</html>
