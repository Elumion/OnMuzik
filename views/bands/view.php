<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>

<div>
    <?=$model['id']?> <?=$model['name']?> <?=$model['description']?>
    <img src="../../assets/images/song_images/<?=$model['image']?>" width="300" alt="">

    <?if($user['role_id']==3 || $user['role_id']==1):?>
    <div>
        <a href="/bands/edit?id=<?=$model['id']?>"> Edit band</a>
    </div>
    <div>
        <a href="/bands/delete?id=<?=$model['id']?>">видалити групу</a>
    </div>
    <?endif;?>
    <ul>
        <?foreach ($songs as $song):?>
            <li><audio src="../../assets/music/<?=$song['media']?>" controls ></audio></li>
        <?endforeach;?>
    </ul>
</div>
