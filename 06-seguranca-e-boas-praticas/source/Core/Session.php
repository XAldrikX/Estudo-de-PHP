<?php 

namespace Source\Core;

use Source\Core\Message;

class Session
{
    public function __construct()
    {
        // Essa função recupera o id da sessão atual, nesse caso o if serve para checar se já existe
        // session id na nossa aplicação.
        if (!session_id()) {
            // Aqui setamos onde as sessions serão salvas.
            session_save_path(CONF_SES_PATH);

            // Finalmente podemos startar nossa session.
            session_start();
        }
    }

    public function __get($name)
    {
        if (!empty($_SESSION[$name])) {
            return $_SESSION[$name];
        }

        return null;
    }

    public function __isset($name) : bool
    {
        $this->has($name);
    }

    public function all() : ?object
    {
        return (object)$_SESSION;
    }

    public function set(string $key, $value) : Session
    {
        // Aqui estamos garantindo que o valor que vamos mandar caso seja um array,
        // será convertido em um objeto para garantirmos uma aplicação voltada a 
        // orientação a objetos, caso seja um int ou outro tipo poderá se manter assim mesmo.
        $_SESSION[$key] = (is_array($value) ? (object) $value : $value);

        // Retorna a propria classe. 
        return $this;
    }

    // Function responsavel por remover um indice da sessão.
    public function unset(string $key) : Session
    {
        unset($_SESSION[$key]);

        return $this;
    }

    // Function responsavel por verificar um indice da sessão.
    public function has(string $key) : bool
    {
        return isset($_SESSION[$key]);
    }

    // Por segurança quando estamos trabalhando com a navegação de um usuário,
    // é importante que as vezes tenhamos que regenerar o id da sessão,
    // ou seja, mate aquele arquivo de sessão que criamos para o usuário e crie
    // um novo sem alterar os dados da sessão.
    public function regenarate() : Session
    {
        // Essa função nativa do PHP é reponsável por fazer justamente o que
        // havia sido dito logo acima.
        session_regenerate_id(true);

        return $this;
    }

    // Agora precizamos de uma forma de realizar um log off de usuário.
    public function destroy() : Session
    {
        session_destroy();

        return $this;
    }

    // Função responsavel por monitorar, elimina e exibe essa mensagem.
    public function flash() : ? Message
    {
        if ($this->has("flash")) {
            $flash = $this->flash;

            $this->unset("flash");

            return $flash;
        }

        return null;
    }
}

?>