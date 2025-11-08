<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Cache-Control" content="max-age=31536000, public" />
    <meta name="description" content="KsevaMine — приватный политический Minecraft-сервер с модами." />
    <title>KsevaMine: Вход в аккаунт</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link href="/css/page-style/base.css" rel="stylesheet" />
    <link href="/css/page-style/header-os.css" rel="stylesheet" />
    <link href="/css/page-style/css-for-login-page.css" rel="stylesheet" />
    <link href="/css/page-style/footer-os.css" rel="stylesheet" />
</head>
<body>
    <?php
    $userLoggedIn = isset($_COOKIE['user']) && $_COOKIE['user'] != '';
    if (!$userLoggedIn): ?>
        <header>
            <div class="header-container">
                <img src="/images/logo/main-logo.png" alt="Logo" />
                <nav>
                    <ul>
                        <li><a class="nav-btn" href="/index.php">Главная</a></li>
                        <li><a class="nav-btn" href="/pages/dynmap.html">Карта</a></li>
                        <li><a class="nav-btn" href="/pages/forum.html">Форум</a></li>
                        <li><a class="nav-btn" href="/pages/updates.html">Обновления</a></li>
                    </ul>
                </nav>
                <a class="login-btn hidden" href="/pages/login in/login-in.php">Войти</a>
            </div>
        </header>
        <main>
            <div class="background-image-box-auth">
                <div class="container" id="formContainer">
                    <div class="container-login">
                        <form action="/pages/login in/validation-form/auth.php" method="post">
                            <h1 class="login-text">Login in</h1>
                            <fieldset class="input-with-icon">
                                <legend>Email *</legend>
                                <input type="email" name="login" id="login" />
                                <img class="icon-in-inputbox" src="/images/login-icons/user-icon.png" alt="#" />
                            </fieldset>
                            <fieldset class="input-with-icon">
                                <legend>Password *</legend>
                                <input type="password" name="password" id="password" />
                                <img class="icon-in-inputbox" src="/images/login-icons/password-icon.png" alt="#" />
                            </fieldset>
                            <a class="insert-link" href="#" id="forgotPassword">Forgot your password?</a>
                            <div class="fixx">
                                <button class="submit-btn" type="submit">Login</button>
                            </div>
                            <a class="insert-link" href="#" id="showRegister">Sign up</a>
                        </form>
                    </div>

                    <div class="container-register">
                        <form action="/pages/login in/validation-form/register.php" method="post">
                            <h1 class="login-text">Sign up</h1>
                            <fieldset class="input-with-icon">
                                <legend>Your Nickname *</legend>
                                <input type="text" name="name" id="name" />
                            </fieldset>
                            <fieldset class="input-with-icon">
                                <legend>Email *</legend>
                                <input type="email" name="login" id="login" />
                                <img class="icon-in-inputbox" src="/images/login-icons/user-icon.png" alt="#" />
                            </fieldset>
                            <fieldset class="input-with-icon">
                                <legend>Password *</legend>
                                <input type="password" name="password" id="regPassword" />
                                <img class="icon-in-inputbox" src="/images/login-icons/password-icon.png" alt="#" />
                            </fieldset>
                            <fieldset class="input-with-icon">
                                <legend>Confirm Password *</legend>
                                <input type="password" name="confirm_password" id="confirmPassword" />
                                <img class="icon-in-inputbox" src="/images/login-icons/password-icon.png" alt="#" />
                            </fieldset>
                            <div class="fixx">
                                <button class="submit-btn" type="submit">Register</button>
                            </div>
                            <a class="insert-link" href="#" id="showLogin">You have account? Login</a>
                        </form>
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
        <script>
            document.getElementById('showRegister').addEventListener('click', function (e) {
                e.preventDefault();
                document.getElementById('formContainer').classList.add('show-register');
            });
            document.getElementById('showLogin').addEventListener('click', function (e) {
                e.preventDefault();
                document.getElementById('formContainer').classList.remove('show-register');
            });
            document.querySelectorAll('input, button, .insert-link').forEach(element => {
                element.style.webkitTapHighlightColor = 'transparent';
            });
        </script>
    <?php else: ?>
        <p>Привет <?= htmlspecialchars($_COOKIE['user']) ?>. Чтобы выйти нажми <a href="/pages/login in/validation-form/exit.php">здесь</a></p>
    <?php endif; ?>
</body>
</html>