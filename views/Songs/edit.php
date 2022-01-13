<form method="post" enctype="multipart/form-data" class="form">
    <label >
        <input type="text" name="title" value="<?=$modelSong['title']?>" required>
        title
    </label>
    <label >
        <input type="text" name="band_name" value="<?=$modelBand['name']?>" required>
        band name
    </label>
    <label >
        <input type="file" accept="image/jpeg, image/png" name="image">
        image
    </label>
    <label >
        <input type="file" accept=".mp3,audio/*" name="media">
        media
    </label>
    <button type="submit">Зберегти пісню</button>
</form>