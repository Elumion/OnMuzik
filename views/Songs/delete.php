<div class="delete__inner">
    <p class="delete__text">
        Підтвердіть видалення пісні: <?= $model['title'] ?>
    </p>
    <div class="delete__btns">
        <a class="btn change__btn delete__btn" href="/songs/delete?id=<?= $model['id'] ?>&confirm=yes">Підтвердити</a>
        <a class="btn change__btn delete__btn" href="<?= $_SERVER['HTTP_REFERER'] ?>">Назад</a>
    </div>
</div>