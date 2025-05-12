<?php
use FFI\Exception;
class ShopExcetion extends Exception {}
class InsufficientFundsException extends ShopExcetion {}
function Funds($money) {
    if ($money <= 0) {
        throw new InsufficientFundsException("Вы Слишком Бедны Для Покупки .·´¯`(>▂<)´¯`·.");
    }
    return "Вы Готовы к Покупкам! []~(￣▽￣)~*";
}
class ProductIsMissingException extends ShopExcetion {}
function Product($value) {
    if ($value <= 0) {
        throw new ProductIsMissingException("Товар Потерян, Его НЕ Смогли Найти o(TヘTo)");
    }
    return "Продукт Был Взят Вами, Вы Успели O(∩_∩)O";
}
try {
    print(Funds(0)."<br>");
    print(Product(0)."<br>");
} catch (InsufficientFundsException | ProductIsMissingException $e) {
    print($e -> getMessage());
} catch (ShopExcetion $e) {
    print("Непредвиденная Ошибка");
}
?>
