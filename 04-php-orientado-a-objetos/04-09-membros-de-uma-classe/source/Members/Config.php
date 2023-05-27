<?php 

namespace Source\Members;

class Config
{
    const COMPANY = "UpInside";
    const DOMAIN = "upinside.com.br";
    const SECTOR = "Educação";

    public static $company;
    public static $domain;
    public static $sector;

    // Declaração de uma função estática.
    public static function setConfig($company, $domain, $sector)
    {
        // Dentro de uma método estático não podemos utilizar o operador $this, isso por que
        // o $this se refere ao objeto, já o self se refere a classe.
        self::$company = $company;
        self::$domain = $domain;
        self::$sector = $sector;
    }
}

?>