<?php

class Perdoruesit extends Kontrolluesi
{
    private $kerkesa;
    private $perdoruesit_model;

    function __construct()
    {
        $this->kerkesa = new Kerkesa;
        $this->perdoruesit_model = new Perdoruesit_model;
    }

    function kycu()
    {
        $data['titulli'] = 'Kycu';

        $metoda = $this->kerkesa->merrMetoden();
        if ($metoda == 'POST') {

            $data = [
                'emaili' => $this->kerkesa->merrPost('email'),
                'fjalekalimi' => $this->kerkesa->merrPost('fjalekalimi')
            ];

            $rezultati = $this->perdoruesit_model->pari($data);

            if ($rezultati) {
                $_SESSION['emri'] = $rezultati['emri'];
                $_SESSION['mbiemri'] = $rezultati['mbiemri'];
                $_SESSION['emaili'] = $rezultati['emaili'];

                header('Location: dsadsa');
            } else {
                $data['error'] = 'Llogaria e shkruar nuk ekziston!';
            }
        }

        return $this->shfaq('perdoruesit/kycu', $data);
    }
}