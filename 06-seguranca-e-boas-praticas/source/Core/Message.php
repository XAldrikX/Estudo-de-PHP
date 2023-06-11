<?php 

namespace Source\Core;

class Message
{
    private $text;
    private $type;

    public function __toString() : string
    {
        return $this->render();
    }

    /**
     * @return string
     */ 
    public function getText() : string
    {
        return $this->text;
    }

    /**
     * @return string
     */ 
    public function getType() : string
    {
        return $this->type;
    }

    public function info(string $message) : Message
    {
        $this->type = CONF_MESSAGE_INFO;

        $this->text = $this->filter($message);

        return $this;
    }

    public function success(string $message) : Message
    {
        $this->type = CONF_MESSAGE_SUCCESS;

        $this->text = $this->filter($message);

        return $this;
    }

    public function warning(string $message) : Message
    {
        $this->type = CONF_MESSAGE_WARNING;

        $this->text = $this->filter($message);

        return $this;
    }

    public function error(string $message) : Message
    {
        $this->type = CONF_MESSAGE_ERROR;

        $this->text = $this->filter($message);

        return $this;
    }

    public function render() : string
    {
        return "<div class='" . CONF_MESSAGE_CLASS . " {$this->getType()}'>{$this->getText()}</div>";
    }

    // Essa função é responsável por renderizar uma mensagem no padrão json, para que
    // API's possam receber esses dados no padrão correto json.
    public function json() : string
    {
        return json_encode(["error" => $this->getText()], JSON_UNESCAPED_UNICODE);
    }

    // Essa função será responsavel por criar uma nova sessão que irá armazenar a 
    // mensagem que está sendo renderizada no momento, por isso ela seta o $this como $value
    // da nossa classe Session. Assim podemos acessar todos os métodos da classe Message através 
    // da sessão também quando puxarmos esse método para a aplicação.
    public function flash() : void
    {
        (new Session())->set("flash", $this);
    }

    private function filter(string $message) : string
    {
        return filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}

?>