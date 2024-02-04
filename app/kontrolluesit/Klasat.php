<?php

class Klasat extends Kontrolluesi
{
    private $kerkesa;
    private $klasat_model;
    private $perdoruesit_model;
    private $flash;

    function __construct()
    {
        $this->kerkesa = new Kerkesa;
        $this->klasat_model = new Klasat_model;
        $this->perdoruesit_model = new Perdoruesit_model;
        $this->flash = new Flash;
    }

    function index()
    {
        $data['klasat'] = $this->klasat_model->merr_klasat();
        $this->shfaq_kornizat('klasat/index', $data);
    }

    function krijo()
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . '/perdoruesit/kycu');
            exit;
        }

        $data['titulli'] = 'Krijo Klasë';
        $data['profesorat'] = $this->perdoruesit_model->merr_profesoret();
        $metoda = $this->kerkesa->merrMetoden();
        if ($metoda == 'POST') {
            $data = [
                'emri' => $this->kerkesa->merrPost('emri'),
                'pershkrimi' => $this->kerkesa->merrPost('pershkrimi'),
                'fjalekalimi' => $this->kerkesa->merrPost('fjalekalimi'),
                'perdoruesi_id' => $this->kerkesa->merrPost('profesori'),
            ];

            $this->klasat_model->fut($data);

            $this->flash->krijo('success', 'Klasa është krijuar me sukses!');
            header('Location: ' . ROOT . '/klasat');
            exit;
        }

        return $this->shfaq_kornizat('klasat/krijo', $data);
    }

    function perditeso($id)
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . '/perdoruesit/kycu');
            exit;
        }

        $data['titulli'] = 'Përditëso Klasën';
        $metoda = $this->kerkesa->merrMetoden();
        if ($metoda == 'POST') {
            $data = [
                'emri' => $this->kerkesa->merrPost('emri'),
                'pershkrimi' => $this->kerkesa->merrPost('pershkrimi'),
                'perdoruesi_id' => $this->kerkesa->merrPost('profesori'),
            ];

            if ($this->kerkesa->merrPost('fjalekalimi')) {
                $fk = $this->kerkesa->merrPost('fjalekalimi');
                $kfk = $this->kerkesa->merrPost('kfjalekalimi');

                //nese jon te njejta, lejo
                if ($fk == $kfk) {
                    $data['fjalekalimi'] = $fk;
                } else {
                    $this->flash->krijo('danger', 'Fushat fjalëkalimi dhe konfirmo fjalëkalimin duhet të kenë vlera të njejta!');
                    header('Location: ' . ROOT . '/klasat/perditeso/' . $id);
                    exit;
                }
            }

            $this->klasat_model->perditeso($id, $data);
            //edito
            $this->flash->krijo('success', 'Klasa është përditësuar me sukses!');
            header('Location: ' . ROOT . '/klasat/perditeso/' . $id);
            exit;
        }
        $data['profesorat'] = $this->perdoruesit_model->merr_profesoret();
        $data['klasa'] = $this->klasat_model->merr_klasen($id);
        return $this->shfaq_kornizat('klasat/sfondi', $data);
    }

    function shlyej($id)
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . 'perdoruesit/kycu');
            exit;
        }

        $this->klasat_model->shlyej($id);
        $this->flash->krijo('success', 'Klasa është shlyer me sukses!');
        header('Location: ' . ROOT . '/klasat');
        exit;
    }

    function klasat_personale($id)
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . '/perdoruesit/kycu');
            exit;
        }

        $data['klasat'] = $this->klasat_model->merr_klasat_personale($id);
        return $this->shfaq_kornizat('klasat/klasat_personale', $data);
    }

    function klasat_ligjeruese($id)
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . '/perdoruesit/kycu');
            exit;
        }

        $data['klasat'] = $this->klasat_model->merr_klasat_ligjeruese($id);
        return $this->shfaq_kornizat('klasat/klasat_ligjeruese', $data);
    }

    function bashkohu()
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . '/perdoruesit/kycu');
            exit;
        }

        $metoda = $this->kerkesa->merrMetoden();
        if ($metoda == 'POST') {
            $klasa_id = $this->kerkesa->merrPost('klasa');
            $fjalekalimi = $this->kerkesa->merrPost('fjalekalimi');
            $klasa = $this->klasat_model->merr_klasen($klasa_id);
            if ($klasa['fjalekalimi'] == $fjalekalimi) {
                $data = [
                    'klasa_id' => $klasa_id,
                    'perdoruesi_id' => $_SESSION['id']
                ];

                $this->klasat_model->bashkohu($data);
                $this->flash->krijo('success', 'Ju jeni bashkangjitur me sukses në klasën ' . $klasa['emri'] . ' - ' . $klasa['profesori']);
                header('Location: ' . ROOT . '/klasat/klasat_personale/' . $_SESSION['id']);
                exit;
            } else {
                $data['klasa_zgjedhur'] = $klasa_id;
                $this->flash->krijo('danger', 'Fjalëkalimi i klasës nuk është i saktë!');
            }
        }
        $data['klasat'] = $this->klasat_model->merr_klasat_lira($_SESSION['id']);
        return $this->shfaq_kornizat('klasat/bashkohu', $data);
    }

    function largohu($id)
    {
        if (!isset($_SESSION['emri'])) {
            header('location: .' . ROOT . '/perdoruesit/kycu');
            exit;
        }

        $this->klasat_model->largohu($id, $_SESSION['id']);
        $this->flash->krijo('success', 'Ju jeni larguar nga klasa me sukses!');
        header('Location: ' . ROOT . '/klasat/klasat_personale/' . $_SESSION['id']);
        exit;
    }
}