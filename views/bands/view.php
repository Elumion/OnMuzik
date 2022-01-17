<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>


<div class="band__view-img">
    <img class="band__view-img-file" src="../../assets/images/song_images/<?= $model['image'] ?>" width="300" alt="<?= $model['name'] ?>">
</div>
<p class="band__view-description">
    <?= $model['description'] ?>
</p>
<? if ($user['role_id'] == 3 || $user['role_id'] == 1) : ?>
    <div class="band__change">
        <a class="change btn link" href="/bands/edit?id=<?= $model['id'] ?>"> Змінити групу</a>
        <a class="delete btn link" href="/bands/delete?id=<?= $model['id'] ?>">Видалити групу</a>
    </div>
<? endif; ?>
<h2 class="title">Список пісень групи</h2>
<ul class="songs__list">
    <?php foreach ($songs as $key => $value) : ?>
        <li class="songs__list-item">
            <div class="item__img-inner">
                <img class="item__img" src="../../assets/images/song_images/<?= $value['image'] ?>" alt="<?= $value['title'] ?>" width="120">
            </div>
            <div class="song__content">
                <a class="link band__link" title="<?= $model['name'] ?>" href="/bands/view?id=<?= $model['id'] ?>">
                    <?= $model['name'] ?>
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