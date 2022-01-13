<ul>
    <? if(!empty($modelBands)): ?>
        <?foreach ($modelBands as $band) :?>

            <li>
                <?=$band['name']?>
            </li>

        <? endforeach;?>
    <?endif;?>

    <? if(!empty($modelSongs)): ?>
        <?foreach ($modelSongs as $song) :?>

            <li>
                <?=$song['title']?>
            </li>

        <? endforeach;?>
    <?endif;?>
</ul>