<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.04 - Consultas com query e exec");

require __DIR__ . "/../source/autoload.php";

/*
 * [ insert ] Cadastrar dados.
 * https://mariadb.com/kb/en/library/insert/
 *
 * [ PDO exec ] http://php.net/manual/pt_BR/pdo.exec.php
 * [ PDO query ]http://php.net/manual/pt_BR/pdo.query.php
 */
fullStackPHPClassSession("insert", __LINE__);

use Source\Database\Connect;

$insert = "
    INSERT INTO fsphp.users (first_name, last_name, email, document)
    VALUES ('Nicolas', 'Bortoli', 'nicolas@hotmail.com', '03090988070');
";

try {

    $exec = Connect::getInstance()->exec($insert);

    var_dump(Connect::getInstance()->lastInsertId());

} catch (PDOException $exception) {
    var_dump($exception);
}


/*
 * [ select ] Ler/Consultar dados.
 * https://mariadb.com/kb/en/library/select/
 */
fullStackPHPClassSession("select", __LINE__);

$select = "
    SELECT * FROM fsphp.users LIMIT 2; 
";

try {

    $query = Connect::getInstance()->query($select);

    var_dump([
        $query,
        $query->rowCount(),
        $query->fetchAll()
    ]);

} catch (PDOException $exception) {
    var_dump($exception);
}

/*
 * [ update ] Atualizar dados.
 * https://mariadb.com/kb/en/library/update/
 */
fullStackPHPClassSession("update", __LINE__);

$update = "
    UPDATE fsphp.users SET first_name = 'Kaue', last_name = 'Cardoso' WHERE id = '53';
";

try {

    $exec = Connect::getInstance()->exec($update);

    var_dump([
        $exec,
    ]);

} catch (PDOException $exception) {
    var_dump($exception);
}

/*
 * [ delete ] Deletar dados.
 * https://mariadb.com/kb/en/library/delete/
 */
fullStackPHPClassSession("delete", __LINE__);

$delete = "
    DELETE FROM fsphp.users WHERE id > 50;
";

try {

    $exec = Connect::getInstance()->exec($delete);

    var_dump($exec);

} catch (PDOException $exception) {
    var_dump($exception);
}