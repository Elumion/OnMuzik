<p>
    Підтвердіть видалення групи <?=$band['name']?>
</p>
<div>
    <a href="/bands/delete?id=<?=$band['id']?>&confirm=yes">Підтвердити</a> <br>
    <a href="<?=$_SERVER['HTTP_REFERER'] ?>">Назад</a>
</div>