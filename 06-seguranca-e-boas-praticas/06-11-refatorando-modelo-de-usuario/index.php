<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.11 - Refatorando modelo de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ find ]
 */
fullStackPHPClassSession("find", __LINE__);

$model = new Source\Models\User();

$user = $model->find("id = :id", "id=1");

var_dump($user);

/*
 * [ find by id ]
 */
fullStackPHPClassSession("find by id", __LINE__);

$user = $model->findById(2);

var_dump($user);


/*
 * [ find by email ]
 */
fullStackPHPClassSession("find by email", __LINE__);

$user = $model->findByEmail("sidney38@email.com.br");

var_dump($user);

/*
 * [ all ]
 */
fullStackPHPClassSession("all", __LINE__);

$list = $model->all(2, 5);

var_dump($list);


/*
 * [ save ]
 */
fullStackPHPClassSession("save create", __LINE__);

$user = $model->bootstrap(
    "Nicolas",
    "Bortoli",
    "nicolas@hotmail.com",
    "12345"
);

if ($user->save()) {
    echo message()->success("Cadastro realizado com sucesso!");
} else {
    echo message()->error("Erro ao cadastrar usuário!");
}

/*
 * [ save update ]
 */
fullStackPHPClassSession("save update", __LINE__);
