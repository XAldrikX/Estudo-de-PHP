<?php 

namespace Source\App;

class User
{
    private $firtsName;
    private $lastName;

    public function __construct($firtsName, $lastName)
    {
        $this->firtsName = $firtsName;
        $this->lastName = $lastName;
    }

    /**
     * Get the value of firtsName
     */ 
    public function getFirtsName()
    {
        return $this->firtsName;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }
}

?>