<?php 

namespace Source\Contracts;

interface UserInterface
{
    // Qualquer classe que implemente esse contrato é obrigado a implementar essa assinatura.
    // O corpo da nossa Interface são termos de uso desse contrato.

    public function getFirstName();

    public function getLastName();
 
    public function getEmail();

}


?>