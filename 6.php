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
    print(Funds(10)."<br>");
    print(Product(10)."<br>");
} catch (InsufficientFundsException $e) {
    print("Причина Ошибки: " . $e -> getMessage());
} catch (ProductIsMissingException $e) {
    print("Причина Ошибки: " . $e -> getMessage());
} catch (ShopExcetion $e) {
    print("Непредвиденная Ошибка");
}
?>
