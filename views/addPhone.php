<?php

require '../php/Contact.php';
require '../php/PhoneDirectory.php';
require '../php/Form.php';
include('../views/layouts/main.php');

$contactsBook = new PhoneDirectory();
Form::processFormSubmission($contactsBook);
?>

<div class="container-main">
    <div class="container-add">
        <h2>Добавление контакта</h2>

        <form method="POST" class="row g-3">
            <label for="name">Имя</label>
            <input class="form-control"
                   type="text" id="name"
                   name="name"
                   value="<?= !empty($_POST['name']) ? $_POST['name'] : '' ?>"
                   required>

            <label for="phone">Номер телефона</label>
            <input class="form-control"
                   type="number" id="phone"
                   name="phone"
                   value="<?= !empty($_POST['phone']) ? $_POST['phone'] : '' ?>"
                   required>

            <div id="error-message" style="color: #ff0000; font-size: 0.875rem;">
                <?php echo $_SESSION['errorMessage'] ?>
            </div>

            <button style="width: 10em" class="btn btn-primary" type="submit">Добавить</button>
        </form>
    </div>
</div>
<script src="../web/js/script.js"></script>