<div class="delete__inner">
    <p class="delete__text">
        Підтвердіть видалення групи: <?= $band['name'] ?>
    </p>
    <div class="delete__btns">
        <a class="btn change__btn delete__btn" href="/bands/delete?id=<?= $band['id'] ?>&confirm=yes">Підтвердити</a>
        <a class="btn change__btn delete__btn" href="<?= $_SERVER['HTTP_REFERER'] ?>">Назад</a>
    </div>
</div>