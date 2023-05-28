<?php 

namespace Source\Traits;

trait UserTrait
{
    private $user;

    /**
     * Get the value of user
     */ 
    public function getUser() : User
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }
}

?>