<?php 

namespace Source\Traits;

trait AddressTrait
{
    private $address;

    /**
     * Get the value of user
     */ 
    public function getAddress() : Address
    {
        return $this->address;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }
}

?>