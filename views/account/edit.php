<form method="post" enctype="multipart/form-data" class="form">
    <div class="form__text">
        <label class="form__label">
            <span class="offset"> Логін:</span>
            <input type="text" maxlength="40" name="login" value="<?= $user['login'] ?>" required>
        </label>
    </div>
    <div class="form__text">
        <label class="form__label">
            <span class="offset"> Пошта: </span>
            <input type="email" maxlength="40" name="email" value="<?= $user['email'] ?>" required>
        </label>
    </div>
    <p class="text__info">Необов'язково</p>
    <div class="form__text">
        <label class="form__label">
            <span class="offset"> Старий пароль:</span>
            <input type="password" name="oldPassword">
        </label>
    </div>
    <div class="form__text">
        <label class="form__label">
            <span class="offset"> Новий пароль:</span>
            <input type="password" name="newPassword">
        </label>
    </div>
    <div class="form__file">
        <label class="form__label">
            <span class="offset"> Картинка профілю:</span>
            <input type="file" accept="image/jpeg, image/png" name="image">
        </label>
    </div>
    <button class="btn change__btn" id="editSong" type="submit">Зберегти аккаунт</button>
</form>