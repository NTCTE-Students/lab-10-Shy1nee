<?php
class Registration extends Exception {}
class RequiredAreaException extends Registration {}
function requiring($password, $email) {
    if (empty($password) || empty($email)) {
        throw new RequiredAreaException("Обязательно Надо Заполнить");
    }
    return "Обязательные Поля Заполнены<br>";
}
class ShortPassWordException extends Registration {}
function validPassword($password) {
    if (mb_strlen($password) < 8) {
        throw new ShortPassWordException("Пароль Должен Быть Минимум 8 Символов");
    }
    return "Пароль Соответствует Правилам<br>";
}
class InCorrectEmailException extends Registration {}
function corremail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new InCorrectEmailException("Неправильный Формат E-Mail");
    }
    return "Правильный Формат E-Mail<br>";
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    try {
        print(requiring($password, $email));
        print(validPassword($password));
        print(corremail($email));
    } catch (RequiredAreaException | ShortPassWordException | InCorrectEmailException $e) {
        $error = $e -> getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <form method="post">
        <label for="email">Введи E-Mail:</label>
        <input type="text" id="email" name="email" required>
        <br>
        <label for="password">Введи Пароль</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Регистрируюсь в Это</button>
    </form>
    <!-- Решил Позаимствовать Следующую Вещичку у Другого Человечка ✍️(◔◡◔) -->
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php elseif (isset($message)): ?>
        <p style="color: green;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
</body>
</html>
