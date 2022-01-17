<form method="post" action="" class="form">
    <div class="form__text">
        <label class="form__label">
            <span class="offset"> Пошта:</span>
            <input type="email" maxlength="40" name="email" value="<?= $_POST['email'] ?>" required>
        </label>
    </div>
    <div class="form__text">
        <label class="form__label">
            <span class="offset"> Пароль: </span>
            <input type="password" maxlength="255" name="password" required>
        </label>
    </div>
    <button class="btn change__btn" type="submit">Увійти</button>
</form>