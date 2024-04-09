<?php

require '../php/Contact.php';
require '../php/PhoneDirectory.php';
include('../views/layouts/main.php');

$contactsBook = new PhoneDirectory();
if (isset($_GET['delete'])) {
    $contactsBook->deleteContact($_GET['delete']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
$contacts = $contactsBook->getContacts();
?>

<div class="container-main">
    <div class="container-add">
        <a class="btn btn-primary"
           href="../views/addPhone.php"
           role="button"
           style="width: 100%; margin-bottom: 2vh;">
            Добавить контакт
        </a>
        <table style="width: 40em; text-align: center;">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Номер телефона</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($contacts as $key => $contact): ?>
                <tr>
                    <td><?= $contact['name'] ?></td>
                    <td><?= $contact['phoneNumber'] ?></td>
                    <td><a href="?delete=<?= $key ?>">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
