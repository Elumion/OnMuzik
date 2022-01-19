<?php
$userModel = new \models\Users();
$currentUser = $userModel->GetCurrentUser();
?>

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
    <?if($currentUser['role_id'] == 1):?>
        <div class="form__text">
            <label class="form__label">
                <span class="offset"> Задати роль:</span>
                <input type="number" min="1" max="3"value="<?= $user['role_id'] ?>" name="role_id">
            </label>
        </div>
    <?endif;?>
    <button class="btn change__btn" id="editSong" type="submit">Зберегти аккаунт</button>
</form>