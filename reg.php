<?php
session_start();
require_once("dbconnect.php");
$_SESSION["error_messages"] = '';
$_SESSION["success_messages"] = '';
?>
<?php
if (isset($_POST["login"])) {
    $login = trim($_POST["login"]);

    if (empty($login)) {
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш логин</p>";
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "/form_reg.php");
        exit();
    }
} else {
    $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с логином</p>";
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $address_site . "/form_reg.php");
    exit();
}

if (isset($_POST["email"])) {
    $email = trim($_POST["email"]);
    if (empty($email)) {
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш email</p>";
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "/form_reg.php");
        exit();
    }
} else {
    //Ошибка
    $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода Email</p>";
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $address_site . "/form_reg.php");
    exit();
}

if (isset($_POST["password"])) {
    $password = trim($_POST["password"]);
    if (empty($password)) {
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш пароль</p>";
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "/form_reg.php");
        exit();
    }
} else {
    //Ошибка
    $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода пароля</p>";
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $address_site . "/form_reg.php");
    exit();
}
$result_query_insert = $mysqli->query("INSERT INTO guests (id, login, password, email) VALUES (NULL, '$login', '$password', '$email')");
if (!$result_query_insert) {
    $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД</p>";
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $address_site . "/form_reg.php");
    exit();
} else {
    $_SESSION["success_messages"] = "<p class='success_message'>Регистрация прошла успешно!!! <br />Теперь Вы можете авторизоваться используя Ваш логин и пароль.</p>";
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $address_site . "/form_auth.php");
}
$result_query_insert->close();
$mysqli->close();
?>