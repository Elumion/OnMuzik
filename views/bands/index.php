<ul>
<? foreach ($model as $value) :?>
<?if(!empty( $value['name'])) :?>
<li>
    <a href="/bands/view?id=<?=$value['id']?>"><?=$value['name']?></a>
</li>
    <?endif; ?>
    <?endforeach;?>
</ul>
