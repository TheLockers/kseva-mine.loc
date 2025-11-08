<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="max-age=31536000, public">
    <meta name="description" content="KsevaMine — приватный политический Minecraft-сервер с модами.">
    <title>KsevaMine: Главная</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link href="/css/page-style/base.css" rel="stylesheet">
    <link href="/css/page-style/header-os.css" rel="stylesheet">
    <link href="/css/page-style/css-for-main-page.css" rel="stylesheet">
    <link href="/css/page-style/footer-os.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-container">
            <img src="/images/logo/main-logo.png" alt="Logo">
            <nav>
                <ul>
                    <li><a class="nav-btn" href="/index.php">Главная</a></li>
                    <li><a class="nav-btn" href="/pages/dynmap.html">Карта</a></li>
                    <li><a class="nav-btn" href="/pages/forum.html">Форум</a></li>
                    <li><a class="nav-btn" href="/pages/updates.html">Обновления</a></li>
                </ul>
            </nav>
            <a class="login-btn" href="/pages/login in/login-in.php">Войти</a>
        </div>
    </header>
    <main>
        <div class="bg-image-box-main-1">
            <div class="main-tablo-weclome">
                <div class="welcome-message"> 
                    <?php 
                    $userLoggedIn = isset($_COOKIE['user']) && $_COOKIE['user'] != '';
                    if($userLoggedIn): ?>
                        <h1 class="welcome-title">Приветствую, <?=htmlspecialchars($_COOKIE['user'])?>!</h1>
                        <p class="welcome-text">Добро пожаловать на главную страницу KsevaMine</p>
                        <a href="/validation-form/exit.php" class="logout-btn">Выйти</a>
                    <?php else: ?>
                        <h1 class="welcome-title">Добро пожаловать на KsevaMine!</h1>
                    <div class="welcome-description">
                        <p>KsevaMine - это приватный политический сервер.</p> 
                        <p>На этом сервере очень общительное и активное коммьюнити, 
                        а также быстрая и доброжелательная модерация.</p>
                    </div>
                        <p class="welcome-cta">Скорее присоединяйся к нам!</p>
                    <?php endif; ?>
                </div>
            </div>    
        </div>
        <div class="bg-image-box-main-2">
            <div class="grid-info-tables">
                <div class="info-tables">
                    <img src="/images/info-back/mine.png" alt="">
                    <div class="txt-info-tables">
                        <div class="info-text">Новые моды, разработанные проектом, которые изменяют геймплей до неузноваемости</div>
                        <div class="info-text-mid">Моды постоянно дорабатываются, в этом нам помогает сообщество! Твое мнение очень важно для нас!</div>
                    </div>
                </div>
                <div class="info-tables">
                    <img src="/images/info-back/co-op.jpeg" alt="">
                    <div class="txt-info-tables">
                        <div class="info-text">На нашем проекте приветствуется творчество каждого, именно вы создаете историю наших миров!</div>
                    </div>
                </div>
                <div class="info-tables">                    
                    <img src="/images/info-back/structure.jpeg" alt="">
                    <div class="txt-info-tables">
                        <div class="info-text">Каждое здание имеет свое предназначение, выбрав стиль, вы можете создавать свою культуру, которая будет распространняться именно у вас!</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-section footer-social">
                <div class="footer-content-title">
                    <h2 class="social-title">Можете найти нас здесь</h2>
                    <div class="social-icons">
                        <a href="#" class="social-icon youtube" title="KsevaMine на YouTube"></a>
                        <a href="#" class="social-icon discord" title="KsevaMine в Discord"></a>
                        <a href="#" class="social-icon vk" title="KsevaMine на VK"></a>
                    </div>
                </div>
            </div>
            <div class="footer-section footer-links">
                <div class="footer-content">
                    <nav class="footer-nav">
                        <a href="/pages/rules.html" class="footer-nav-link">Правила сервера</a>
                        <a href="/pages/feedback-form.html" class="footer-nav-link">Связаться с нами</a>
                    </nav>
                </div>
            </div>
            <div class="footer-section footer-copyright">
                <div class="footer-content">
                    <p class="copyright-text">© 2025 KsevaMine. Все права защищены!</p>
                    <p class="copyright-text">Оригинальные права принадлежат Mojang AB</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>