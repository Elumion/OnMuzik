<form method="post" class="form">
    <div class="form__text">
        <label class="form__label">
            <span class="offset"> Логін:</span>
            <input type="text" maxlength="40" name="login" value="<?= $_POST['login'] ?>" required>
        </label>
    </div>
    <div class="form__text">
        <label class="form__label">
            <span class="offset"> Пароль: </span>
            <input type="password" maxlength="255" name="password" required>
        </label>
    </div>
    <div class="form__text">
        <label class="form__label">
            <span class="offset">Повторіть пароль: </span>
            <input type="password" maxlength="255" name="password2" required>
        </label>
    </div>
    <div class="form__text">
        <label class="form__label">
            <span class="offset"> Пошта: </span>
            <input type="email" maxlength="40" name="email" value="<?= $_POST['email'] ?>" required>
        </label>
    </div>
    <button class="btn change__btn" type="submit">Зареєструватись</button>
</form>