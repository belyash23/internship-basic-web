<form action="" method="post">
    <h2 class="text-center form-title">Обратная связь</h2>
    <div class="form-group">
        <label for="email">Заголовок</label>
        <input type="text" name="title" id="title" class="form-control">
        <div class="text-danger"><?= $data['errors']['title'] ?></div>
    </div>
    <div class="form-group">
        <label for="text">Текст отзыва</label>
        <textarea name="text" id="text" class="form-control"></textarea>
        <div class="text-danger"><?= $data['errors']['text'] ?></div>
    </div>
    <div class="form-group">
        <label>Рейтинг</label><br>
        <label class="radio-inline"><input type="radio" name="rating" value="1"> 1</label>
        <label class="radio-inline"><input type="radio" name="rating" value="2"> 2</label>
        <label class="radio-inline"><input type="radio" name="rating" value="3"> 3</label>
        <label class="radio-inline"><input type="radio" name="rating" value="4"> 4</label>
        <label class="radio-inline"><input type="radio" name="rating" value="5"> 5</label>
        <div class="text-danger"><?= $data['errors']['rating'] ?></div>
    </div>
    <div class="form-group">
        <label>флажки</label><br>
        <label class="checkbox-inline"><input type="checkbox" name="flag" value="1"> 1</label>
        <label class="checkbox-inline"><input type="checkbox" name="flag" value="2"> 2</label>
        <label class="checkbox-inline"><input type="checkbox" name="flag" value="3"> 3</label>
        <div class="text-danger"><?= $data['errors']['flag'] ?></div>
    </div>
    <div class="form-group">
        <label for="list">выпадающий список</label>
        <select name="list" id="list" class="form-control">
            <option value="option1">вариант 1</option>
            <option value="option2">вариант 2</option>
            <option value="option3">вариант 3</option>
        </select>
        <div class="text-danger"><?= $data['errors']['list'] ?></div>
    </div>
    <div class="form-group">
        <input type="reset" class="btn">
    </div>

    <input type="submit" class="btn btn-primary" value="Отправить">

    <?php
    if ($data['success']) {
        echo '<div class="text-success form-message">Сообщение успешно отправлено</div>';
    }
    ?>
</form>