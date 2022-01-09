<form method="post" action="" class="form">
    <label >
        <input type="text" name="login" value="<?=$_POST['login']?>" required>
        login
    </label>
    <label >
        <input type="password" name="password" value="" required>
        password
    </label>
    <label >
        <input type="password" name="password2" value="" required>
        password confirm
    </label>
    <label >
        <input type="email" name="email" value="<?=$_POST['email']?>" required>
        email
    </label>
    <button type="submit">Зареєструватись</button>
</form>