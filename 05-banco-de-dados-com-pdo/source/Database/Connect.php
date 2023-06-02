<?php 

namespace Source\Database;

use \PDO;
use \PDOException;

class Connect
{

    // Conjunto de constantes que irão servir para a conexão com o DB.
    private const HOST = "localhost";
    private const USER = "root";
    private const DBNAME = "fsphp_model";
    private const PASSWD = "";
    private const OPTIONS = [
        // Assegura que ao iniciar a conexão com o DB o charset será utf8.
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        // Assegura que ao ocorrer um erro na aplicação será executada uma Exception do tipo PDO
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // Indica que o retorno das querys irão vir em um formato de objeto.
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        // Assegura que a conexão com o banco irá respeitar o case das tabelas do DB.
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];


    // Vamos garantir que haverá apenas uma instancia de nossa classe de conexão
    // na aplicação.
    private static $instance;

    // Nessa função asseguramos que caso não haja uma instancia da classe Connect, 
    // uma conexão será executada, caso contrário, iremos retornar a instancia já existente.
    public static function getInstance() : PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    "mysql:host=" . self::HOST . ";dbname" . self::DBNAME,
                    self::USER,
                    self::PASSWD,
                    self::OPTIONS
                );
            } catch (PDOException $exception) {
                die("<h1>Whoops, Erro ao conectar...</h1>");
            }
        }

        return self::$instance;
    }

    final private function __construct()
    {

    }

    final private function __clone()
    {

    }
}

?>