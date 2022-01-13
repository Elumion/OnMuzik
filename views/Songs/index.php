<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>

<p>SONGS </p>
<a href="/songs/add">add song</a>

<ul>
    <?php foreach($lastSongs as $key => $value) : ?>
    <li><?= $value["title"]?> = | <?= $value['media'] ?>
        <a href="/bands/view?id=<?=$bands[$key]['id']?>"><?=$bands[$key]['name']?> група</a>
        <hr>
        <? if($value['user_id'] === $_SESSION['user']['id'] || $user['role_id'] == 1): ?>
        <div>
        <a href="/songs/edit?id=<?=$value['id']?>">Змінити пісню</a>
        </div>
        <div>
        <a href="/songs/delete?id=<?=$value['id']?>">видалити пісню</a>
        </div>
        <? endif; ?>
        <div>
        <audio src="../../assets/music/<?=$value['media']?>" controls ></audio>
            <img src="../../assets/images/song_images/<?=$value['image']?>" alt="" width="300">
        </div>
    </li>
    <? endforeach; ?>
</ul>