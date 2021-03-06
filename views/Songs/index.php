<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>


<a class="change__btn btn" href="/songs/add">Добавити пісню на сайт</a>

<ul class="songs__list">
    <?php foreach ($lastSongs as $key => $value) : ?>
        <li class="songs__list-item">
            <div class="item__img-inner">
                <?if ($value['image']=='default_song.png'):?>
                    <img class="item__img" src="../../assets/images/<?= $value['image'] ?>" alt="<?= $value['title'] ?>" width="120">
                <?else:?>
                    <img class="item__img" src="../../assets/images/song_images/<?= $value['image'] ?>" alt="<?= $value['title'] ?>" width="120">
                <?endif;?>
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
<div class="arrows">
    <? if ($currentPage > 1) : ?>
        <a class="btn arrows__btn" href="/songs/index?page=<?= ($currentPage - 1) ?>" class="arrow">
            <i class="fas fa-arrow-left"></i>
        </a>
    <? endif; ?>
    <? if ($isMore) : ?>
        <a class="btn arrows__btn" href="/songs/index?page=<?= ($currentPage + 1) ?>" class="arrow">
            <i class="fas fa-arrow-right"></i>
        </a>
    <? endif; ?>
</div>