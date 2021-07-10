<form action="" method="post">
    <h2 class="text-center form-title">Регистрация</h2>
    <div class="form-group">
        <label for="email">Электронная почта:</label>
        <input type="text" name="email" id="email" class="form-control">
        <div class="text-danger"><?= $data['errors']['email'] ?></div>
    </div>

    <div class="form-group">
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" class="form-control">
        <div class="text-danger"><?= $data['errors']['password'] ?></div>
    </div>

    <input type="submit" class="btn btn-primary" value="Отправить">
    <?php
    if ($data['success']) {
        echo '<div class="text-success form-message">Вы успешно зарегистрировались</div>';
    }
    ?>
</form>