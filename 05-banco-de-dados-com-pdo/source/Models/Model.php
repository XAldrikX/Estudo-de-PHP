<?php 

namespace Source\Models;

use Source\Database\Connect;
use stdClass;

abstract class Model
{
    /** @var object|null */
    protected $data;

    /** @var \PDOException|null */
    protected $fail;

    /** @var string|null */
    protected $message;

    /**
     * $name: Este argumento representa o nome da propriedade que está sendo definida. 
     * Quando você tenta atribuir um valor a uma propriedade que não existe ou é inacessível, 
     * o argumento $name conterá o nome dessa propriedade.
     * 
     * $value: Este argumento representa o valor que você está atribuindo à propriedade 
     * especificada por $name. Ele contém o valor que você deseja atribuir à propriedade.
     */
    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new stdClass();
        }

        $this->data->$name = $value;
    }

    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }

    /**
     * Get the value of data
     */ 
    public function data() : ?object
    {
        return $this->data;
    }

    /**
     * Get the value of fail
     */ 
    public function fail() : ?\PDOException
    {
        return $this->fail;
    }

    /**
     * Get the value of message
     */ 
    public function message() : ?string
    {
        return $this->message;
    }


    protected function create()
    {

    }

    protected function read(string $select, string $params = null) :?\PDOStatement
    {
        try {
            $stmt = Connect::getInstance()->prepare($select);

            if ($params) {
                parse_str($params, $params);
                
                // Caso não se lembre o que está ocorrendo aqui olhar nota 6 - PDOStatement e bind modes.
                foreach ($params as $key => $value) {
                    $type = (is_numeric($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
                    
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }

            $stmt->execute();

            return $stmt;

        } catch (\PDOException $exception) {
            $this->fail = $exception;

            return null;
        }
    }

    protected function update()
    {
        
    }

    protected function delete()
    {
        
    }


    protected function safe() : ?array
    {

    }

    private function filter() 
    {

    }
}

?>