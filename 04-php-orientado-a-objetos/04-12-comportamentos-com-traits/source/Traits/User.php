<?php 

namespace Source\Traits;

class User
{
    private $fistName;
    private $lastName;
    private $email;

    public function __construct($fistName, $lastName, $email)
    {
        $this->fistName = $fistName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    /**
     * Get the value of fistName
     */ 
    public function getFirstName()
    {
        return $this->fistName;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }
}

?>