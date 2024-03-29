<?php

namespace source\Qualifield;

class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $error;

    public function setUser($firstName, $lastName, $email) {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);

        if(!$this->setEmail($email)) {
            $this->error = "O e-mail {$this->getEmail()} não é válido!";
            return false;
        }

        return true;
    }

    public function getError() {
        return $this->error;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    private function setFirstName($firstName) {
        $this->firstName = filter_var($firstName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    private function setLastName($lastName) {
        $this->lastName = filter_var($lastName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    private function setEmail($email) {
        $this->email = $email;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
}

?>