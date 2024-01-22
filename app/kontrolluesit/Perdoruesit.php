<?php

class Perdoruesit extends Kontrolluesi
{
    private $kerkesa;
    private $perdoruesit_model;
    private $flash;

    function __construct()
    {
        $this->kerkesa = new Kerkesa;
        $this->perdoruesit_model = new Perdoruesit_model;
        $this->flash = new Flash;
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

                $this->flash->krijo('success', 'Ju jeni kycur me sukses!');
                header('Location: ../ballina');
            } else {
                $data['error'] = 'Llogaria e shkruar nuk ekziston!';
            }
        }

        return $this->shfaq('perdoruesit/kycu', $data);
    }
}