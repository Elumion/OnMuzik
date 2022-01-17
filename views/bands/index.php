<ul class="bands__list">
    <? foreach ($model as $value) : ?>
        <? if (!empty($value['name'])) : ?>
            <li class="bands__list-item">
                <div class="band__content-inner">
                    <h2 class="title band-title">
                        <a class="link" href="/bands/view?id=<?= $value['id'] ?>">
                            <?= $value['name'] ?>
                        </a>
                    </h2>
                    <div class="band-img">
                        <img class="band-img-file" src="../../assets/images/song_images/<?= $value['image'] ?>" width="70" alt="<?= $value['name'] ?>">
                    </div>
                    <p class="band__description">
                        <?= $value['description'] ?>
                    </p>
                    <a class="btn view__btn" href="/bands/view?id=<?= $value['id'] ?>">Переглянути</a>
                </div>
            </li>
        <? endif; ?>
    <? endforeach; ?>
</ul>
<div class="arrows">
    <? if ($currentPage > 1) : ?>
        <a class="btn arrows__btn" href="/bands/index?page=<?= ($currentPage - 1) ?>" class="arrow">
            <i class="fas fa-arrow-left"></i>
        </a>
    <? endif; ?>
    <? if ($isMore) : ?>
        <a class="btn arrows__btn" href="/bands/index?page=<?= ($currentPage + 1) ?>" class="arrow">
            <i class="fas fa-arrow-right"></i>
        </a>
    <? endif; ?>
    <script src="../../js/band_description.js"></script>