<?php


class Request
{
    private $url_elements;
    private $query_string;
    private $verb;
    private $body_parameters;
    //in $format we store the format of the content received, but we do not use this variable
    private $format;
    //in $accept we store the format of the content that the server will send
    private $accept;
    private $usuario;
    private $contrasena;
    private $llave;

    public function __construct($verb, $url_elements, $query_string, $body, $content_type, $accept, $usuario, $contrasena, $llave)
    {
        $this->verb = $verb;
        $this->url_elements = $url_elements;
        $this->query_string = $query_string;
        $this->parseBody($body, $content_type);
        $this ->usuario = $usuario;
        $this -> contrasena = $contrasena;
        $this-> llave = $llave;

        switch ($accept) {
            case 'application/json':
            case '*/*':
            case null:
                $this->accept = 'json';
                break;
            case 'application/xml':
            case 'text/xml':
                $this->accept = 'xml';
                break;
            default:
                $this->accept = 'unsupported';
                break;
        }


        return true;
    }

    private function parseBody($body, $content_type)
    {
        $parameters = array();

        switch ($content_type) {
            case "application/json":
                $this->format = "json";
                $parameters = json_decode($body);
                /*$body_params = json_decode($body);
                if ($body_params) {
                    foreach ($body_params as $param_name => $param_value) {
                        $parameters[$param_name] = $param_value;
                    }
                }*/

                break;
            case "application/x-www-form-urlencoded":
                $this->format = "html";
                parse_str($body, $parameters);
                /*parse_str($body, $postvars);
                foreach ($postvars as $field => $value) {
                    $parameters[$field] = $value;

                }*/

                break;
            default:
                // we could parse other supported formats here
                break;
        }
        $this->body_parameters = $parameters;

    }

    /**
     * @return mixed
     */
    public function getUrlElements()
    {
        return $this->url_elements;
    }

    /**
     * @param mixed $url_elements
     */
    public function setUrlElements($url_elements)
    {
        $this->url_elements = $url_elements;
    }

    /**
     * @return mixed
     */
    public function getQueryString()
    {
        return $this->query_string;
    }

    /**
     * @param mixed $query_string
     */
    public function setQueryString($query_string)
    {
        $this->query_string = $query_string;
    }

    /**
     * @return mixed
     */
    public function getVerb()
    {
        return $this->verb;
    }

    /**
     * @param mixed $verb
     */
    public function setVerb($verb)
    {
        $this->verb = $verb;
    }

    /**
     * @return mixed
     */
    public function getBodyParameters()
    {
        return $this->body_parameters;
    }

    /**
     * @param mixed $body_parameters
     */
    public function setBodyParameters($body_parameters)
    {
        $this->body_parameters = $body_parameters;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param mixed $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return mixed
     */
    public function getAccept()
    {
        return $this->accept;
    }

    /**
     * @param mixed $accept
     */
    public function setAccept($accept)
    {
        $this->accept = $accept;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    /**
     * @return mixed
     */
    public function getLlave()
    {
        return $this->llave;
    }

    /**
     * @param mixed $llave
     */
    public function setLlave($llave)
    {
        $this->llave = $llave;
    }


}