<?php

class Postimet extends Kontrolluesi
{
    private $kerkesa;
    private $postimet_model;
    private $klasat_model;
    private $flash;

    function __construct()
    {
        $this->kerkesa = new Kerkesa;
        $this->postimet_model = new Postimet_model;
        $this->klasat_model = new Klasat_model;
        $this->flash = new Flash;
    }

    function index()
    {
        $data['titulli'] = 'Postimet';
        $data['postimet'] = $this->postimet_model->merr_postimet($_SESSION['id']);
        $this->shfaq_kornizat('postimet/index', $data);
    }

    public function merr_postimin_json()
    {
        $id = $this->kerkesa->merrGet('id');
        $postimet = $this->postimet_model->merr_postimin($id);
        echo json_encode($postimet);
    }

    public function krijo($id = null)
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . '/perdoruesit/kycu');
            exit;
        }
        $metoda = $this->kerkesa->merrMetoden();
        if ($metoda == 'POST') {
            $data = [
                'klasa_id' => $this->kerkesa->merrPost('klasa'),
                'titulli' => $this->kerkesa->merrPost('titulli'),
                'permbajtja' => $this->kerkesa->merrPost('pershkrimi'),
                'perdoruesi_id' => $_SESSION['id']
            ];

            $this->postimet_model->fut($data);
            $this->flash->krijo('success', 'Postimi është krijuar me sukses!');
            header('Location: ' . ROOT . '/postimet');
            exit;
        }
        $data['titulli'] = 'Krijo Postim';
        if ($id) {
            $data['klasa'] = $this->klasat_model->merr_klasen($id);
        }
        $data['klasat'] = $this->klasat_model->merr_klasat_ligjeruese($_SESSION['id']);
        $this->shfaq_kornizat('postimet/krijo', $data);
    }

    function shlyej($id)
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . '/perdoruesit/kycu');
            exit;
        }

        $this->postimet_model->shlyej($id);
        $this->flash->krijo('success', 'Postimi është shlyer me sukses!');
        header('Location: ' . ROOT . '/postimet');
        exit;
    }

    function perditeso($id)
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . '/perdoruesit/kycu');
            exit;
        }
        $metoda = $this->kerkesa->merrMetoden();
        if ($metoda == 'POST') {
            $data = [
                'klasa_id' => $this->kerkesa->merrPost('klasa'),
                'titulli' => $this->kerkesa->merrPost('titulli'),
                'permbajtja' => $this->kerkesa->merrPost('pershkrimi'),
                'perdoruesi_id' => $_SESSION['id']
            ];

            $this->postimet_model->perditeso($id, $data);
            $this->flash->krijo('success', 'Postimi është krijuar me sukses!');
            header('Location: ' . ROOT . '/postimet');
            exit;
        }
        $data['titulli'] = 'Edito Postim';
        $data['klasat'] = $this->klasat_model->merr_klasat_ligjeruese($_SESSION['id']);
        $data['postimi'] = $this->postimet_model->merr_postimin($id);
        $this->shfaq_kornizat('postimet/perditeso', $data);
    }
}