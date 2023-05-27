<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.08 - Herança e polimorfismo");

require __DIR__ . "/source/autoload.php";

/*
 * [ classe pai ] Uma classe que define o modelo base da estrutura da herança
 * http://php.net/manual/pt_BR/language.oop5.inheritance.php
 */
fullStackPHPClassSession("classe pai", __LINE__);

$event = new \Source\Inheritance\Event\Event(
    "FSPHP Workshop",
    new DateTime("2023-05-26 16:00"),
    2500,
    4
);

var_dump($event);

$event->register("Nicolas Bortoli", "nicolasbortoli2010@hotmail.com");
$event->register("Renato Bortoli", "renatobortoli2010@hotmail.com");
$event->register("Heliane Bortoli", "helianebortoli2010@hotmail.com");
$event->register("Gabrielly Bortoli", "gabriellybortoli2010@hotmail.com");
$event->register("Noely Bortoli", "noelybortoli2010@hotmail.com");

/*
 * [ classe filha ] Uma classe que herda a classe pai e especializa seuas rotinas
 */
fullStackPHPClassSession("classe filha", __LINE__);

$address = new \Source\Inheritance\Address("Rua das Palmeiras", 1000);

$event = new \Source\Inheritance\Event\EventLive(
    "FSPHP Workshop",
    new DateTime("2023-05-26 16:00"),
    2500,
    4,
    $address
);

var_dump($event);

$event->register("Nicolas Bortoli", "nicolasbortoli2010@hotmail.com");
$event->register("Renato Bortoli", "renatobortoli2010@hotmail.com");
$event->register("Heliane Bortoli", "helianebortoli2010@hotmail.com");
$event->register("Gabrielly Bortoli", "gabriellybortoli2010@hotmail.com");
$event->register("Noely Bortoli", "noelybortoli2010@hotmail.com");

/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);

$event = new \Source\Inheritance\Event\EventOnline(
    "FSPHP Workshop",
    new DateTime("2023-05-26 16:00"),
    2500,
    "https://upinside.com.br/aovivo"
);

var_dump($event);

$event->register("Nicolas Bortoli", "nicolasbortoli2010@hotmail.com");
$event->register("Renato Bortoli", "renatobortoli2010@hotmail.com");
$event->register("Heliane Bortoli", "helianebortoli2010@hotmail.com");
$event->register("Gabrielly Bortoli", "gabriellybortoli2010@hotmail.com");
$event->register("Noely Bortoli", "noelybortoli2010@hotmail.com");

