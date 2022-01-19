<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>

<h2 class="title search__title">Знайдено пісень: <span class="found"> <?= count($modelSongs) ?></span></h2>

<ul class="songs__list">
    <?php foreach ($modelSongs as $key => $value) : ?>
        <li class="songs__list-item">
            <div class="item__img-inner">
                <? if ($value['image'] == 'default_song.png') : ?>
                    <img class="item__img" src="../../assets/images/<?= $value['image'] ?>" alt="<?= $value['title'] ?>" width="120">
                <? else : ?>
                    <img class="item__img" src="../../assets/images/song_images/<?= $value['image'] ?>" alt="<?= $value['title'] ?>" width="120">
                <? endif; ?>
            </div>
            <div class="song__content">
                <a class="link band__link" title="<?= $bands[$key]['name'] ?>" href="/bands/view?id=<?= $bands[$key]['id'] ?>">
                    <?= $bands[$key]['name'] ?>
                </a>
                <span class="song__name" data-id="<?= 's' . $key ?>"><?= $value["title"] ?></span>
                <div class="audio__inner" data-id="<?= 's' . $key ?>">
                    <audio class="song__audio" src="../../assets/music/<?= $value['media'] ?>" data-id="<?= 's' . $key ?>" controlsList="nodownload noplaybackrate" controls></audio>
                </div>
            </div>
            <? if ($value['user_id'] === $_SESSION['user']['id'] || $user['role_id'] == 1) : ?>
                <div class="song__changes">
                    <a class="change link" href="/songs/edit?id=<?= $value['id'] ?>"><i class="fas fa-paperclip"></i></a>
                    <a class="delete link" href="/songs/delete?id=<?= $value['id'] ?>"><i class="fas fa-times"></i></a>
                </div>
            <? endif; ?>

        </li>
    <? endforeach; ?>
</ul>

<h2 class="title search__title">Знайдено груп: <span class="found"> <?= count($modelBands) ?></span></h2>

<ul class="bands__list">
    <? foreach ($modelBands as $value) : ?>
        <? if (!empty($value['name'])) : ?>
            <li class="bands__list-item">
                <div class="band__content-inner">
                    <h2 class="title band-title">
                        <a class="link" href="/bands/view?id=<?= $value['id'] ?>">
                            <?= $value['name'] ?>
                        </a>
                    </h2>
                    <div class="band-img">
                        <? if ($value['image'] == 'band_img.png') : ?>
                            <img class="band-img-file" src="../../assets/images/<?= $value['image'] ?>" width="70" alt="<?= $value['name'] ?>">
                        <? else : ?>
                            <img class="band-img-file" src="../../assets/images/song_images/<?= $value['image'] ?>" width="70" alt="<?= $value['name'] ?>">
                        <? endif; ?>
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