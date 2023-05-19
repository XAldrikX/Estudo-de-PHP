<?php

class User
{
    public $firstName;
    public $lastName;
    public $email;

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setFirstName($firstName) {
        $this->firstName = filter_var($firstName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    public function setLastName($lastName) {
        $this->lastName = filter_var($lastName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    public function setEmail($email) {
        $this->email = $email;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
}

?>