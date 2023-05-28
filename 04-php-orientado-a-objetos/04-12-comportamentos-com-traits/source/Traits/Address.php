<?php 

namespace Source\Traits;

class Address
{
    private $street;
    private $number;
    private $complement;

    public function __construct($street, $number, $complement)
    {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
    }

    /**
     * Get the value of fistName
     */ 
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Get the value of lastName
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get the value of email
     */ 
    public function getComplement()
    {
        return $this->complement;
    }
}

?>