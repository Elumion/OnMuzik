<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$MainTitle ?></title>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="/" class="logo link">Home</a>
                <a href="/news" class="logo link">News</a>

            </nav>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <h1 class="title"><?=$PageTitle ?></h1>
        <?=$PageContent ?>
        </div>
    </main>
</body>
</html>