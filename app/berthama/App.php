<?php
class App
{
    private $kontrolluesi = 'Ballina';
    private $metoda = 'index';
    private $param = '';

    private function ndaj_url()
    {
        $URL = $_GET['url'] ?? 'ballina';
        $URL = explode('/', $URL);
        return $URL;
    }

    public function ngarko_kontrolluesin()
    {
        $URL = $this->ndaj_url();
        $emri_skedarit = "../app/kontrolluesit/" . ucfirst($URL[0]) . ".php";
        if (file_exists($emri_skedarit)) {
            require $emri_skedarit;
            $this->kontrolluesi = ucfirst($URL[0]);
            if (isset($URL[1])) {
                $this->metoda = $URL[1];
            }
            if (isset($URL[2])) {
                $this->param = $URL[2];
            }
        } else {
            require "../app/kontrolluesit/_404.php";
            $this->kontrolluesi = '_404';
        }
        $kontrolluesi = new $this->kontrolluesi;
        call_user_func_array([$kontrolluesi, $this->metoda], [$this->param]);
    }
}