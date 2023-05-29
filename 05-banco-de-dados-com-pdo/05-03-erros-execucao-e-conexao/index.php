<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
require __DIR__ . "/../source/autoload.php";

fullStackPHPClassName("05.03 - Errors, conexão e execução");

/*
 * [ controle de erros ] http://php.net/manual/pt_BR/language.exceptions.php
 */
fullStackPHPClassSession("controle de erros", __LINE__);

try {
    throw new Exception("Exception");

    throw new PDOException("PDOException");
} catch (PDOException $exception) {

    var_dump($exception);

} catch (Exception $exception) {

    echo "<p class'trigger error'>{$exception->getMessage()}</p>";

}


/*
 * [ php data object ] Uma classe PDO para manipulação de banco de dados.
 * http://php.net/manual/pt_BR/class.pdo.php
 */
fullStackPHPClassSession("php data object", __LINE__);

try {
    $pdo = new PDO (
        "mysql:host=localhost;dbname=fsphp",
        "root",
        "",
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ]
    );

    $statement = $pdo->query("SELECT * FROM users LIMIT 3");
    // Podemos alterar o comportamento do comando Fetch para retornar os dados no formato
    // de array associativo.
    while ($user = $statement->fetch(PDO::FETCH_ASSOC)) {
        var_dump($user);
    }

} catch (PDOException $exception) {
    var_dump($exception);
}


/*
 * [ conexão com singleton ] Conextar e obter um objeto PDO garantindo instância única.
 * http://br.phptherightway.com/pages/Design-Patterns.html
 */
fullStackPHPClassSession("conexão com singleton", __LINE__);

use Source\Database\Connect;

$PDO_connection_1 = Connect::getInstance();
$PDO_connection_2 = Connect::getInstance();

var_dump(
    $PDO_connection_1,
    $PDO_connection_2,
    Connect::getInstance()
);
