<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$name = trim($_POST['name']);
$login = trim($_POST['login']);
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);

if ($name == '' || mb_strlen($name) < 4) {
    die("Неверное имя");
} else if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
    die("Некорректный email");
} else if (mb_strlen($login) < 5 || mb_strlen($login) > 50) {
    die("Недопустимая длина логина");
} else if (mb_strlen($password) < 4) {
    die("Пароль слишком короткий");
} else if ($password !== $confirm_password) {
    die("Пароли не совпадаю");
}

$host = '127.127.126.32';
$db_user = 'root';
$db_pass = ''; 
$db_name = 'users';
$port = 3306;
$socket = 'MySQL-8.4';

try {
    $mysql = new mysqli($host, $db_user, $db_pass, $db_name, $port, $socket);
    
    if ($mysql->connect_error) {
        throw new Exception("Ошибка подключения: " . $mysql->connect_error);
    }

    $check_stmt = $mysql->prepare("SELECT id FROM users WHERE login = ?");
    $check_stmt->bind_param("s", $login);
    $check_stmt->execute();
    $check_stmt->store_result();
    
    if ($check_stmt->num_rows > 0) {
        die("Пользователь с таким email уже существует");
    }
    $check_stmt->close();

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysql->prepare("INSERT INTO `users` (`name`, `login`, `password`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $login, $password_hash);
    $stmt->execute();

    $stmt->close();
    $mysql->close();
    

    echo '<!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Успешная регистрация</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .success-message {
                background: white;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                text-align: center;
                max-width: 400px;
            }
            .success-message h1 {
                color: #4CAF50;
                margin-bottom: 20px;
            }
            .success-message p {
                margin-bottom: 30px;
                font-size: 16px;
            }
            .redirect-info {
                font-size: 14px;
                color: #666;
            }
        </style>
    </head>
    <body>
        <div class="success-message">
            <h1>Регистрация успешна!</h1>
            <p>Добро пожаловать, '.htmlspecialchars($name).'! Ваш аккаунт был успешно создан.</p>
            <p class="redirect-info">Вы будете перенаправлены на главную страницу через 5 секунд...</p>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = "/";
            }, 5000);
        </script>
    </body>
    </html>';
   
    exit();
} catch (Exception $e) {
    die("Ошибка: " . $e->getMessage());
}
?>