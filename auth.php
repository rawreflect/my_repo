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
if (isset($_POST["password"])) {
    $password = trim($_POST["password"]);
    if (empty($password)) {
        $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш пароль</p>";
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "/form_reg.php");
        exit();
    }
} else {
    $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода пароля</p>";
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $address_site . "/form_reg.php");
    exit();
}
$result_query_select = $mysqli->query("SELECT * FROM `guests` WHERE login = '" . $login . "' AND password = '" . $password . "'");
if (!$result_query_select) {
    $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на выборке пользователя из БД</p>";
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $address_site . "/form_auth.php");
    exit();
} else {
    if ($result_query_select->num_rows == 1) {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "/main.php");
    } else {
        $_SESSION["error_messages"] .= "<p class='mesage_error' >Неправильный логин и/или пароль</p>";
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $address_site . "/form_auth.php");
        exit();
    }
}
?>