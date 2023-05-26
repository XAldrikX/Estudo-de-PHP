<?php 

namespace Source\Related;

class Company
{
    private $company;

    /**
     * @var Address
     */
    private $address;

    private $team;
    private $products;

    public function bootCompany($company, $address)
    {
        $this->company = $company;
        $this->address = $address;
    }

    public function boot($company, Address $address)
    {
        $this->company = $company;
        $this->address = $address;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function addTeamMember($job, $firstName, $lastName)
    {
        $this->team[] = new User($job, $firstName, $lastName);
    } 

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }


    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }


    public function getTeam()
    {
        return $this->team;
    }

    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }


    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }
}

?>