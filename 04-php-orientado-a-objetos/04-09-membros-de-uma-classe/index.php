<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.09 - Membros de uma classe");

require __DIR__ . "/source/autoload.php";

/*
 * [ constantes ] http://php.net/manual/pt_BR/language.oop5.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);

use Source\Members\Config;

$config = new Config();

// Como esse membro não faz parte do objeto e sim da classe, 
// para trazermos ele para a aplicação devemos concatenar ele em nosso echo por exemplo.
echo "<p>" . $config::COMPANY . "</p>";


// Essa é a forma mais correta de trazer esse membro para a aplicação,
// dessa forma não precisamos instanciar a classe como fizemos com o $config, mas sim
// trazer ela diretamente como um ponto de acesso global.
var_dump(
    Config::COMPANY
);

/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

// Essa é a maneira de instanciar o método do PHP de debugar classes.
$refletion = new ReflectionClass(Config::class);

// Podemos utilizar o mesmo operador com os dois pontos :: que usamos nas consts.
Config::$company = "UpInside";
Config::$domain = "www.upinside.com.br";
Config::$sector = "Educação";

$config::$sector = "Tecnologia";

var_dump($config, $refletion->getProperties(), $refletion->getDefaultProperties());


/*
 * [ métodos ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("métodos", __LINE__);

$config::setConfig("", "", "");
Config::setConfig("UpInside", "upinside.com.br", "Educação");

var_dump($config, $refletion->getMethods(), $refletion->getDefaultProperties());


/*
 * [ exemplo ] Uma classe trigger
 */
fullStackPHPClassSession("exemplo", __LINE__);

use Source\Members\Trigger;

$trigger = new Trigger();
$trigger::show("Um objeto trigger");

var_dump($trigger);

// Esse é um exemplo usando um echo na função show.
Trigger::show("Essa é uma mensagem de sucesso para o usuário!", Trigger::ACCEPT);
Trigger::show("Essa é uma mensagem de alerta para o usuário!", Trigger::WARNING);
Trigger::show("Essa é uma mensagem de erro para o usuário!", Trigger::ERROR);

// Esse é um exemplo usando um retorno na função push.
// Assim podemos por exemplo guardar essa mensagem em uma variável.
echo Trigger::push("Esse é um retorno para o usuário!", Trigger::ACCEPT);