<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.11 - Contratos com interfaces");

require __DIR__ . "/source/autoload.php";

/*
 * [ implementacão ] Um contrato de quais métodos a classe deve implementar
 * http://php.net/manual/pt_BR/language.oop5.interfaces.php
 */
fullStackPHPClassSession("implementacão", __LINE__);

$user = new \Source\Contracts\User(
    "Nicolas",
    "Bortoli",
    "nicolas.bortoli2010@hotmail.com"
); 

$userAdmin = new \Source\Contracts\UserAdmin(
    "Nicolas",
    "Bortoli",
    "nicolas.bortoli2010@hotmail.com"
);

var_dump($user, $userAdmin);

/*
 * [ associação ] Um exemplo associando ao login
 */
fullStackPHPClassSession("associação", __LINE__);

$login = new \Source\Contracts\Login();

$loginUser = $login->loginUser($user);
$loginAdmin = $login->loginAdmin($userAdmin);

var_dump($loginUser, $loginAdmin);


/*
 * [ dependência ] Dependency Injection ou DI, é um contrato de relação entre objetos, onde
 * um método assina seus atributos com uma interface.
 */
fullStackPHPClassSession("dependência", __LINE__);

var_dump(
    $login->login($user),
    $login->login($user)->getFirstName(),
    $login->login($userAdmin),
    $login->login($userAdmin)->getFirstName(),
);




