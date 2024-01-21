<?php

class Kerkesa
{
    private $get;
    private $post;
    private $metoda;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->metoda = $_SERVER['REQUEST_METHOD'];
    }

    public function merrMetoden()
    {
        return $this->metoda;
    }

    public function merrGet($key = null)
    {
        if ($key !== null && isset($this->get[$key])) {
            return $this->get[$key];
        }

        return $this->get;
    }

    public function merrPost($key = null)
    {
        if ($key !== null) {
            if (isset($this->post[$key])) {
                return $this->post[$key];
            } else {
                return null;
            }
        } else {
            return $this->post;
        }
    }
}
