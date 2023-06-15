<?php 

/**
 * ####################
 * ###   VALIDATE   ###
 * ####################
 */


// Validação simples e eficaz de emails. O ideal é não ser muito restritivo na utilização
// de diferentes caracteres em um email.
function is_email(string $email) : bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Essa é uma validação simples de senha, serve mais como um exemplo de estrutura de helpers reponsaveis por 
// validar uma senha, mas claro que em uma aplicação real a verificação seria mais completa.
function is_passwd(string $password) : bool
{
    return (mb_strlen($password) >= CONF_PASSWD_MIN_LEN && mb_strlen($password) <= CONF_PASSWD_MAX_LEN ? true : false);
}

// Essas funções elas vão servir apenas para facilitar na hora de fazer essas verificações, ao invés de termos
// que digitar essas funções nativas do PHP e mandar os argumentos que vem do Config, podemos apenas
// invocar essas funções com os argumentos que precisamos verificar.
function passwd(string $password) : string
{
    return password_hash($password, CONF_PASSWD_ALGO, CONF_PASSWD_OPTIONS);
}

function passwd_verify(string $password, string $hash) : bool
{
    return password_verify($password, $hash);
}

function passwd_rehash(string $hash) : bool
{
    return password_needs_rehash($hash, CONF_PASSWD_ALGO, CONF_PASSWD_OPTIONS);
}


/**
 * ##################
 * ###   STRING   ###
 * ##################
 */


// Essa função será responsável por criar URL ou URI's em nossa aplicação,
// removendo e substituindo caracteres que não são permitidos nesses casos.
function str_slug(string $string) : string
{
    $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_STRIPPED);

    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyrr                                 ';

    $slug = str_replace(["-----", "----", "---", "--"], "-",
        str_replace(" ", "-", 
            trim(strtr(utf8_decode($string), utf8_decode($formats), $replace))
        )
    );

    return $slug;
}

// Essa função irá retornar um string em Pascal Case ou também conhecido como Studly Case, 
// usado na criação de nomes de classes, onde temos por exemplo 'UserModel'.
function str_studly_case(string $string) : string
{
    $string = str_slug($string);

    $studlyCase = str_replace(" ", "",
        mb_convert_case(str_replace("-", " ", $string), MB_CASE_TITLE)
    );

    return $studlyCase;
}

// Essa funcção irá retornar uma string em CamelCase, onde poderá ser usado como
// nomes de métodos por exemplo.
function str_camel_case(string $string) : string
{
    return lcfirst(str_studly_case($string));
}

function str_title(string $string) : string
{
    return mb_convert_case(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE);
}

// Limita por palavras.
function str_limit_words(string $string, int $limit, $pointer = "...") : string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));

    $arrWords = explode(" ", $string);

    $numWords = count($arrWords);

    if ($numWords < $limit) {
        return $string;
    }

    $words = implode(" ", array_slice($arrWords, 0, $limit));

    return "{$words}{$pointer}";
}

// Limita por caracteres.
function str_limit_chars(string $string, int $limit, $pointer = "...") : string
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));

    if (mb_strlen($string) <= $limit) {
        return $string;
    }

    $chars = mb_substr($string, 0, mb_strrpos(mb_substr($string, 0, $limit), " "));

    return "{$chars}{$pointer}";
}


/**
 * ##################
 * ###   STRING   ###
 * ##################
 */


// Monta uma url retirando a '/' caso ela seja passada duplicada sem querer.
function url(string $path) : string
{
    return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
}

// Cria a rotina de redirect da aplicação.
function redirect(string $url) : void
{
    header("HTTP/1.1 302 Redirect");

    // Caso seja passada uma url válida com https entende-se que haverá um redirecionamente 
    // externo, pois um redirecionamento interno apenas o caminho é necessário, ex: /carrinho 
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");

        exit;
    }

    // Faz o redirecionamento interno caso o externo não tenha passado na validação acima.
    $location = url($url);

    header("Location: {$location}");

    exit;
}


/**
 * ################
 * ###   CORE   ###
 * ################
 */


function db() : PDO
{
    return Source\Core\Connect::getInstance();
}

function message() : Source\Core\Message
{ 
    return new Source\Core\Message();
}

function session() : Source\Core\Session
{
    return new  Source\Core\Session();
}


/**
 * #################
 * ###   MODEL   ###
 * #################
 */


function user() : Source\Models\User
{
    return new  Source\Models\User();
}

?>