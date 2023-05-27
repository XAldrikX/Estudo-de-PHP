<?php 

namespace Source\Contracts;

use Source\Contracts\User;
use Source\Contracts\UserAdmin;

class Login
{
    private $logged;

    public function loginUser(User $user) : User
    {
        $this->logged = $user;
        return $this->logged;
    }

    public function loginAdmin(UserAdmin $user) : UserAdmin
    {
        $this->logged = $user;
        return $this->logged;
    }

    // Dessa maneira qualquer classe que implemente os métodos da UserInterface irá poder fazer
    // Login na nossa aplicação.
    public function login(UserInterface $user) : UserInterface
    {
        $this->logged = $user;
        return $this->logged;
    }
}

?>