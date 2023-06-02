<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.05 - Explorando estilos de busca");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/*
 * [ fetch ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch", __LINE__);

$connect = Connect::getInstance();

$read = $connect->query("SELECT * FROM fsphp.users LIMIT 3");

if (!$read->rowCount()) {
    echo "<p class='trigger warnning'>Não obteve resultados!</p>";
} else {
    while ($user = $read->fetch()) {
        var_dump($user);
    }
}

/*
 * [ fetch all ] http://php.net/manual/pt_BR/pdostatement.fetchall.php
 */
fullStackPHPClassSession("fetch all", __LINE__);

$read = $connect->query("SELECT * FROM fsphp.users LIMIT 3, 2");

foreach ($read->fetchAll() as $user ) {
    var_dump($user);
}

/*
 * [ fetch save ] Realziar um fetch diretamente em um PDOStatement resulta em um clear no buffer da consulta. Você
 * pode armazenar esse resultado em uma variável para manipilar e exibir posteriormente.
 */
fullStackPHPClassSession("fetch save", __LINE__);

$read = $connect->query("SELECT * FROM fsphp.users LIMIT 5, 1");

$result = $read->fetchAll();

var_dump(
    // Aqui o buffer está agindo e não nos deixa mais acessar esses resultados.
    $read->fetchAll(),
    // Já aqui não, como salvamos os resultados em uma variavel, e essa não está sobre
    // as regras do buffer, podemos usa-las quantas vezes quisermos.
    $result,
    $result
);


/*
 * [ fetch modes ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch styles", __LINE__);

$read = $connect->query("SELECT * FROM fsphp.users LIMIT 1");
