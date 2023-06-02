<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.07 - PDOStatement e bind modes");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/**
 * [ prepare ] http://php.net/manual/pt_BR/pdo.prepare.php
 */
fullStackPHPClassSession("prepared statement", __LINE__);

// Quando usamos o prepare estamos instanciando um objeto do tipo PDOStatement,
// nessa hora estamos preparando a query, mas ainda não a executamos.
$stmt = Connect::getInstance()->prepare("SELECT * FROM fsphp.users WHERE id = 50");

// Para executar a query utilizamos o método execute da classe PDO.
$stmt->execute();


/*
 * [ bind value ] http://php.net/manual/pt_BR/pdostatement.bindvalue.php
 *
 */
fullStackPHPClassSession("stmt bind value", __LINE__);

// Exemplo usando binds.
$stmt = Connect::getInstance()->prepare("
    INSERT INTO fsphp.users (first_name, last_name)
    VALUE(?, ?);
");

// Aqui temos os binds, cada um corresponde a um "?" que colocamos no codigo acima,
// o problema de fazer dessa forma é, que se por qualquer motivo a ordem dos parametros seja mudada,
// os registros vão ir de forma errada para o banco de dados.
$stmt->bindValue(1, 'Nicolas', PDO::PARAM_STR);
$stmt->bindValue(2, 'Bortoli', PDO::PARAM_STR);

$stmt->execute();

var_dump($stmt->rowCount(), Connect::getInstance()->lastInsertId());

$stmt = Connect::getInstance()->prepare("
    INSERT INTO fsphp.users (first_name, last_name)
    VALUE(:first_name, :last_name);
");

$stmt->bindValue(':first_name', 'Nicolas', PDO::PARAM_STR);
$stmt->bindValue(':last_name', 'Bortoli', PDO::PARAM_STR);

$stmt->execute();

var_dump($stmt->rowCount(), Connect::getInstance()->lastInsertId());


/*
 * [ bind param ] http://php.net/manual/pt_BR/pdostatement.bindparam.php
 */
fullStackPHPClassSession("stmt bind param", __LINE__);

$stmt = Connect::getInstance()->prepare("
    INSERT INTO fsphp.users (first_name, last_name)
    VALUE(:first_name, :last_name);
");

$first_name = "Nicolas";
$last_name = "Bortoli";

$stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
$stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);

$stmt->execute();

var_dump($stmt->rowCount(), Connect::getInstance()->lastInsertId());


/*
 * [ execute ] http://php.net/manual/pt_BR/pdostatement.execute.php
 */
fullStackPHPClassSession("stmt execute array", __LINE__);

$stmt = Connect::getInstance()->prepare("
    INSERT INTO fsphp.users (first_name, last_name)
    VALUE(:first_name, :last_name);
");

$user = [
    "first_name" => "Nicolas",
    "last_name" => "Bortoli"
];

$stmt->execute($user);

/*
 * [ bind column ] http://php.net/manual/en/pdostatement.bindcolumn.php
 */
fullStackPHPClassSession("bind column", __LINE__);

$stmt = Connect::getInstance()->prepare("SELECT * FROM fsphp.users LIMIT 3");

$stmt->execute();

// Da mesma forma que vimos em exemplos anteriores podemos utilizar um bind no
// indice do retorno, mas o preferivel usar o nome do indice que recebemos.
$stmt->bindColumn(2, $name);
// Exemplo com o nome do indice que indica o email.
$stmt->bindColumn("email", $email);

while ($user = $stmt->fetch()) {
    var_dump($user);

    echo "O email de {$name} é {$email}";
}