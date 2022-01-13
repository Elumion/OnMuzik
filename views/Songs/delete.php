<p>
    Підтвердіть видалення пісні <?=$model['title']?>
</p>
<div>
    <a href="/songs/delete?id=<?=$model['id'] ?>&confirm=yes">Підтвердити</a> <br>
    <a href="<?=$_SERVER['HTTP_REFERER'] ?>">Назад</a>
</div>