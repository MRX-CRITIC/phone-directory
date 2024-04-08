<?php

class Form
{
    public static function processFormSubmission($contactsBook)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['phone'])) {
            $regexp = '/^[7-8]\d{10}$/';

            if (preg_match($regexp, $_POST['phone'])) {
                $phoneNumber = preg_replace('/(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})/', '+7 ($2) $3-$4-$5', $_POST['phone']);
                $contactsBook->addContact($_POST['name'], $phoneNumber);
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                $_SESSION['errorMessage'] = "Ошибка! Формат номера неверный. Пример: 79999999999, 89999999999";
            }
        }
    }
}