<?php 

namespace Source\Related;

class User
{
    private $job;
    private $firstName;
    private $lastName;

    public function __construct($job, $firstName, $lastName)
    {
        $this->job = $job;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * Get the value of job
     */ 
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set the value of job
     *
     * @return  self
     */ 
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }
}

?>