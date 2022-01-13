<form method="post" enctype="multipart/form-data" class="form">
    <label >
        <input type="text" name="name" value="<?=$modelBand['name']?>" required>
        Name
    </label>
    <label >
        <input type="file" accept="image/jpeg, image/png" name="image">
        image
    </label>
    <textarea name="description"  cols="30" rows="10"><?=$modelBand['description']?></textarea>
    <button type="submit">Зберегти групу</button>
</form>