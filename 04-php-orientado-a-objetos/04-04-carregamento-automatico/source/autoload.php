<?php

spl_autoload_register(function($class) {
    $nameSpace = "Source\\";
    $baseDir = __DIR__ . "/";

    $length = strlen($nameSpace);

    var_dump($class);

    // Função que retorna 0 caso o $nameSpace for igual a $class no comprimento do $nameSpace, 
    // onde definimos na variável $length.
    if(strncmp($nameSpace, $class, $length) !== 0) {
        return;
    }

    // Retorna os nameSpaces sem o \Source, para termos o nome da classe limpa.
    $relativeCLass = substr($class, $length);

    // Trocando as barras invertidas para barra normal, 
    // para termos o caminho absoluto do arquivo onde as classes se encontram.
    $file = $baseDir . str_replace("\\", "/", $relativeCLass) . ".php";

    // Agora toda vez que tivermos o operador new ele irá retornar o caminho da classe.
    if (file_exists($file)) {
        require $file;
    }
});

?>