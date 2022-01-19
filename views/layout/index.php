<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>


<!doctype html>
<html lang="ua">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $MainTitle ?></title>
    <link rel="shortcut icon" href="../../assets/images/default_song.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/songs_list.css">
    <? if (!empty($style)) : ?>
        <link rel="stylesheet" href="../../css/<?= $style ?>.css">
    <? endif; ?>
    <script src="../../js/playerjs1.js" type="text/javascript"></script>

</head>

<body>
    <header class="header">
        <div class="container header__flex">
            <a class="logo_link logo" href="/songs?page=1"><span class="on">On</span><span class="muzik">Muzik</span></a>
            <ul class="header__list">
                <nav class="nav">
                    <? if ($user['role_id'] == 1) : ?>
                        <a class="nav__link header__link" href="/account/admin">Користувачі</a>
                    <? endif; ?>
                    <a class="nav__link header__link" href="/songs?page=1">Пісні</a>
                    <a class="nav__link header__link" href="/bands?page=1">Групи</a>
                    <div class="search">
                        <input class="search__input" type="text" id="search_input" placeholder="Введіть назву пісні або групи">
                        <a class="search__btn" href="#" id="search_btn">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </nav>
                <div class="account">
                    <? if ($userModel->IsUserAuthenticated()) : ?>
                        <a class="account__link" href="/account?id=<?= $user['id'] ?>" title="<?= $user['login'] ?>">
                            <span class="account__name"> <?= $user['login'] ?> </span>
                            <? if ($user['image'] == 'user_img.png') : ?>
                                <img class="account__img" src="../../assets/images/<?= $user['image'] ?>" width="30" alt="<?= $user['login'] ?>">
                            <? else : ?>
                                <img class="account__img" src="../../assets/images/user_images/<?= $user['image'] ?>" width="30" alt="<?= $user['login'] ?>">
                            <? endif; ?>
                        </a>
                        <a href="/users/logout" class="users__btn btn">Logout</a>
                    <? else : ?>
                        <a href="/users/register" class="users__btn btn">Register</a>
                        <a href="/users/login" class="users__btn btn">Login</a>
                    <? endif; ?>
                </div>

            </ul>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <h1 class="title"><?= $PageTitle ?></h1>
            <? if (!empty($MessageText)) : ?>
                <div class="message__render">
                    <p class="<?= $MessageClass ?>">
                        <?= $MessageText ?>
                    </p>
                </div>
            <? endif; ?>
            <? ?>
            <?= $PageContent ?>
        </div>
    </main>
    <div id="player__out">
        <div id="player"></div>
    </div>
    <footer class="footer">
        <div class="container">
            <p class="footer__copy">&copy; Elumion 2022</p>
            <h2 class="title footer__title">Контакти</h2>
            <a class="footer__link link" href="mailto:dovgalyukvlad87@gmail.com">dovgalyukvlad87@gmail.com</a>
        </div>
    </footer>
    <script>
        const searchInput = document.querySelector("#search_input");
        const searchBtn = document.querySelector("#search_btn");

        const changeLink = () => {
            let link = searchInput.value.trim().replace(" ", "+");
            searchBtn.setAttribute("href", `/songs/search?search=` + link);
        }
        searchInput.addEventListener("focusout", changeLink);
    </script>
    <script src="https://kit.fontawesome.com/d8168f499a.js" crossorigin="anonymous"></script>
    <script src="../../js/script.js"></script>
</body>

</html>