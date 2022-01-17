<form method="post" enctype="multipart/form-data" class="form">
    <div class="form__text">
        <label class="form__label">
            <span class="offset"> Назва групи:</span>
            <input type="text" maxlength="40" name="name" value="<?= $modelBand['name'] ?>" required>
        </label>
    </div>
    <div class="form__file">
        <label class="form__label">
            <span class="offset"> Картинка Групи:</span>
            <input type="file" accept="image/jpeg, image/png" name="image">
        </label>
    </div>
    <div class="form__textarea">
        <label class="form__label">
            <span class="offset"> Опис групи:</span>
            <textarea data-editor="InlineEditor" class="form__textarea-text editor" wrap="hard" name="description" cols="30" rows="10"><?= $modelBand['description'] ?></textarea>
        </label>
    </div>
    <button class="btn change__btn" id="editSong" type="submit">Зберегти групу</button>
</form>