<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>

<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$MainTitle ?></title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="/" class="">Home</a>
                <a href="/songs" class="">Songs</a>
                <a href="/bands" class="">Bands</a>
                <? if ($userModel->IsUserAuthenticated()): ?>
                    <a href="/users/logout" class="logo link">Logout</a>
                    <a href="/account?id=<?=$user['id']?>"><?=$user['login'] ?></a>
                <? else: ?>
                    <a href="/users/register" class="logo link">Register</a>
                    <a href="/users/login" class="logo link">Login</a>
                <? endif; ?>

                <input type="text" id="search_input">
                <a href="#" id="search_btn">Пошук</a>

            </nav>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <h1 class="title"><?=$PageTitle ?></h1>
            <? if (!empty($MessageText)): ?>
            <div class="<?=$MessageClass ?>">
                <?=$MessageText ?>
            </div>
            <? endif; ?>
            <? ?>
            <?=$PageContent ?>
        </div>
    </main>
    <script>
        const searchInput = document.querySelector("#search_input");
        const searchBtn = document.querySelector("#search_btn");

        const changeLink = () =>{
            let link = searchInput.value.trim().replace(" ","+");
            searchBtn.setAttribute("href",`/songs/search?search=` +link);
        }
        searchInput.addEventListener("focusout", changeLink);
    </script>
</body>
</html>