<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$nickname = trim($_POST['nickname'] ?? '');
$email = trim($_POST['email'] ?? '');
$user_message = trim($_POST['user_message'] ?? '');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Некорректный email");
} else if (mb_strlen($email) < 5 || mb_strlen($email) > 50) {
    die("Недопустимая длина логина");
} else if (empty($nickname)) {
    die("Имя не может быть пустым");
}

$mysql = null;
$stmt = null;

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

    $stmt = $mysql->prepare("SELECT * FROM `users` WHERE `login` = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        die("Пользователь не найден");
    }

    if (password_verify($password, $user['password'])) {
        setcookie('user', $user['name'], time() + 3600, "/");

        header("Location: /index.php");
        exit();
    } else {
        die("Неверный пароль");
    }

} catch (Exception $e) {
    die("Ошибка: " . $e->getMessage());
} finally {
    if ($stmt)
        $stmt->close();
    if ($mysql)
        $mysql->close();
}
