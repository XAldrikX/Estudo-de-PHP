<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.11 - Trabalhando com funções");

/*
 * [ functions ] https://php.net/manual/pt_BR/language.functions.php
 */
fullStackPHPClassSession("functions", __LINE__);

require __DIR__."/functions.php";

var_dump(functionName("Pearl Jam", "AC/DC", "Alter Brigde"));
var_dump(functionName("Nirvana", "Rolling Stones", "The Doors"));

var_dump(optionArgs("Nicolas"));

/*
 * [ global access ] global $var
 */
fullStackPHPClassSession("global access", __LINE__);


/*
 * [ static arguments ] static $var
 */
fullStackPHPClassSession("static arguments", __LINE__);

$pay = payTotal(200);
$pay = payTotal(100);
$pay = payTotal(250);

echo $pay;

/*
 * [ dinamic arguments ] get_args | num_args
 */
fullStackPHPClassSession("dinamic arguments", __LINE__);

var_dump(myTeam("Nicolas", "Gabrielly"));
