<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.12 - Cookies e sessões");

/*
 * [ cookies ] http://php.net/manual/pt_BR/features.cookies.php
 */
fullStackPHPClassSession("cookies", __LINE__);

setcookie("fsphp", "Esse é meu cookie", time() + 60);

// setcookie("fsphp", null, time() - 60);

$cookie = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_STRIPPED);

var_dump([
    $_COOKIE,
    $cookie
]);

$time = time() + 60 * 60 * 24 * 7; // Cookie setado para expirar em uma semana.
$user = [
    "user" => "root",
    "password" => "12345",
    "expire" => $time
];

setcookie(
    "fslogin",
    http_build_query($user),
    $time,
    "/",
    "localhost",
    false
);

$login = filter_input(INPUT_COOKIE, "fslogin", FILTER_SANITIZE_STRIPPED);

if($login) {
    var_dump($login);
    parse_str($login, $user);
    var_dump($user);
}


/*
 * [ sessões ] http://php.net/manual/pt_BR/ref.session.php
 */
fullStackPHPClassSession("sessões", __LINE__);

session_save_path(__DIR__ . "/session");

session_name("FSPHP_SESSION_ID");

session_start([
   "cookie_lifetime" => (60 * 60 * 24)
]);

var_dump($_SESSION,
[
    "id" => session_id(),
    "name" => session_name(),
    "status" => session_status(),
    "save_path" => session_save_path(),
    "cookie" => session_get_cookie_params()
]);


