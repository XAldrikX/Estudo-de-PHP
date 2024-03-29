<?php 

namespace Source\Bank;

use Source\App\User;
use Source\App\Trigger;

// Declaração de uma classe abstrata que podemos criar o conceito da superclass.
abstract class Account
{
    protected $branch;
    protected $account;
    protected $client;
    protected $balance;

    protected function __construct($branch, $account, User $client, $balance)
    {
        $this->branch = $branch;
        $this->account = $account;
        $this->client = $client;
        $this->balance = $balance;
    }

    public function extract()
    {
        $extract = ($this->balance >= 1 ? Trigger::ACCEPT : Trigger::ERROR);

        Trigger::show("EXTRATO: Saldo atual: {$this->toBrl($this->balance)}", $extract);
    }

    protected function toBrl($value)
    {
        return "R$ " . number_format($value, "2", ",", ".");
    }

    abstract public function deposit($value);
    abstract public function withdraw($value);

}

?>