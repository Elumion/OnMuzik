<form method="post" enctype="multipart/form-data" class="form">
    <label >
        <input type="text" name="title" value="<?=$_POST['title']?>" required>
        title
    </label>
    <label >
        <input type="text" name="band_name" value="<?=$_POST['band_name']?>" required>
        band name
    </label>
    <label >
        <input type="file" accept="image/jpeg, image/png" name="image">
        image
    </label>
    <label >
        <input type="file" accept=".mp3,audio/*" required name="media">
        media
    </label>
    <button type="submit">Додати пісню</button>
</form>