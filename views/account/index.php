<div class="account__index-inner">
    <div class="account__index-img">
        <img class="account__index-img-file" src="../../assets/images/user_images/<?= $user["image"] ?>" width="300" alt="">
    </div>
    <div class="account__content">
        <p class="account__content-name">
            <span class="offset">Логін: </span> <?= $user['login'] ?>
        </p>
        <p class="account__content-email">
            <span class="offset">Пошта: </span><?= $user['email'] ?>
        </p>
    </div>
</div>
<a class="link change btn account__index-btn" href="/account/edit?id=<?= $user['id'] ?>"> Оновити аккаунт</a>
<? if (!empty($songs)) : ?>
    <h2 class="title account__title">Завантажені пісні</h2>
<? endif; ?>

<ul class="songs__list">
    <?php foreach ($songs as $key => $value) : ?>
        <li class="songs__list-item">
            <div class="item__img-inner">
                <img class="item__img" src="../../assets/images/song_images/<?= $value['image'] ?>" alt="<?= $value['title'] ?>" width="120">
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