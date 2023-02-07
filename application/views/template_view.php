<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="navigation">
        <div class="wrapper">
            <div class="header">
                <ul>
                    <li class=""><a href="index.php?url=main">Главная страница</a></li>

                    <li class=""><a href="index.php?url=about">О нас</a></li>

                    <li class=""><a href="index.php?url=contacts">Контакты</a></li>
                    
                    <li class=""><a href="index.php?url=phpinfo">phpinfo()</a></li>
                </ul>
                <h1>MVC ФРЕЙМВОРК</h1>
                <p class="task">Задание 24.5. Итоговый проект</p>
            </div>

            <div class="content">
                <?php include $content_view; ?>
            </div>
        </div>
    </div>
</body>
</html>