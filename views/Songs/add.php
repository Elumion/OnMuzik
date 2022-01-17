<form class="form" method="post" enctype="multipart/form-data" class="form">
    <div class="form__text">
        <label class="form__label">
            <span class="offset"> Назва пісні:</span>
            <input type="text" maxlength="40" name="title" value="<?= $_POST['title'] ?>" required>
        </label>
    </div>
    <div class="form__text">
        <label class="form__label">
            <span class="offset"> Ім'я групи: </span>
            <input type="text" maxlength="40" name="band_name" value="<?= $_POST['band_name'] ?>" required>
        </label>
    </div>
    <div class="form__file">
        <label class="form__label">
            <span class="offset"> Заставка:</span>
            <input type="file" accept="image/jpeg, image/png" name="image">
        </label>
    </div>
    <div class="form__file">
        <label class="form__label">
            <span class="offset"> Файл пісні:</span>
            <input type="file" accept=".mp3,audio/*" required name="media">
        </label>
    </div>
    <button class="btn change__btn" type="submit">Додати пісню</button>
</form>