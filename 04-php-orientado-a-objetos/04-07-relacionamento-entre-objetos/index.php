<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.07 - Relacionamento entre objetos");

require __DIR__ . "/source/autoload.php";

/*
 * [ associacão ] É a associação mais comum entre objetos onde o objeto terá um atributo
 * apontando e dando acesso ao outro objeto
 */
fullStackPHPClassSession("associacão", __LINE__);

$company = new \Source\Related\Company();
$company->bootCompany(
    "UpInside",
    "Rua das Palmeiras"
);

var_dump($company);

$address = new \Source\Related\Address("Rua das Palmeiras", 3399, "Bloco A, Sala 201");

$company->boot(
    "Upinside",
    $address
);

var_dump($company);

echo "<p>A {$company->getCompany()} tem sede na rua {$company->getAddress()->getStreet()}</p>";

/*
 * [ agregação ] Em agregação tornamos um objeto externo parte do objeto base, contudo não
 * o referenciamos em uma propriedade como na associação.
 */
fullStackPHPClassSession("agregação", __LINE__);

$fsphp = new \Source\Related\Product("Full Stack PHP", 1997);
$laradev = new \Source\Related\Product("Laradev", 997);

$company->addProduct($fsphp);
$company->addProduct($laradev);

var_dump($company);

/**
 * @var \Source\Related\Product $product
 */
foreach($company->getProducts() as $product) {
    echo "<p>{$product->getName()} por R$ {$product->getPrice()}</p>";
}



/*
 * [ composição ] Em composição temos um objeto base que é responsável por instanciar o
 * objeto parte, que só existe enquanto o base existir.
 */
fullStackPHPClassSession("composição", __LINE__);

$company->addTeamMember("CEO", "Nicolas", "Bortoli");
$company->addTeamMember("Manager", "Gaby", "Sudario");

var_dump($company);

/**
 * @var \Source\Related\User $member
 */
foreach($company->getTeam() as $member) {
    echo "<p>{$member->getJob()}: {$member->getFirstName()} {$member->getLastName()}</p>";
}







