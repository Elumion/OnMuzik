<form method="post" enctype="multipart/form-data" class="form">
    <label >
        <input type="text" name="login" value="<?=$user['login']?>" required>
        login
    </label>
    <label >
        <input type="email" name="email" value="<?=$user['email']?>" required>
        email
    </label>
    <label>
        <input type="password" name="oldPassword">
        old password
    </label>
    <label>
        <input type="password" name="newPassword">
        new password
    </label>
    <label>
        <input type="file" accept="image/jpeg, image/png" name="image">
        image
    </label>
    <button type="submit">Зберегти аккаунт</button>
</form>