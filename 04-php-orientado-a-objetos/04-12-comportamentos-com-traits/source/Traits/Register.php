<?php 

namespace Source\Traits;

class Register
{

    // Nesse momento nós trouxemos para dentro da classe Register todos os comportamentos
    // e propriedades das traits.
    use UserTrait;
    use AddressTrait;

    public function __construct(User $user, Address $address)
    {
        $this->setUser($user);

        $this->setAddress($address);

        $this->save();
    }

    private function save()
    {
        $this->user->id = 233;

        $this->address->user_id = $this->user->id;
    }
}

?>