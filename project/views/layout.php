<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Каталог сайтов IT-тематики">
        <link rel="icon" href="/favicon.ico">
        <link href="/project/assets/style.css?v=<?php echo filemtime($_SERVER['DOCUMENT_ROOT'] . '/project/assets/style.css') ?>" rel="stylesheet">
    </head>
    <body>
        <header class="section section_top">
		    <div class="section__container">
			    <div class="header">
                    <div class="logo header__logo">
                        <a href="/" class="logo__link">
                            <img src="/project/assets/logo.png" alt="Logo" class="logo__img">
                        </a>
                    </div>
                    <div class="header__buttons">
                        <a href="/add_site/" class="button header__button">Добавить сайт</a>
                    </div>
                </div>
            </div>
        </header>
        <main class="main">
            <?php echo $content; ?>
        </main>
        <footer class="section">
            <div class="section__container">
                <div class="footer">
                    (c) Oleg Dorofeev 2025
                </div>
            </div>
        </footer>
    </body>
</html>