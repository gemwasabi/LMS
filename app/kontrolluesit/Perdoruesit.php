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

    function index()
    {
        $data['perdoruesit'] = $this->perdoruesit_model->merr_perdoruesit();
        return $this->shfaq_kornizat('perdoruesit/index', $data);
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
                $_SESSION['id'] = $rezultati['id'];
                $_SESSION['emri'] = $rezultati['emri'];
                $_SESSION['mbiemri'] = $rezultati['mbiemri'];
                $_SESSION['emaili'] = $rezultati['emaili'];
                $_SESSION['foto'] = $rezultati['foto'];
                $_SESSION['grupi'] = $rezultati['grupi'];

                $this->flash->krijo('success', 'Ju jeni kyçur me sukses!');

                if ($rezultati['grupi'] == 0) {
                    header('Location: ' . ROOT . '/perdoruesit');
                } else if ($rezultati['grupi'] == 2) {
                    header('Location: ' . ROOT . '/ballina');
                }
            } else {
                $data['error'] = 'Llogaria e shkruar nuk ekziston!';
            }
        }

        return $this->shfaq('perdoruesit/kycu', $data);
    }

    function ckycu()
    {
        if (!isset($_SESSION['emaili'])) {
            return header('Location: ' . ROOT . '/perdoruesit/kycu');
        }
        $data['email'] = $_SESSION['emaili'];
        session_destroy();
        return $this->shfaq('perdoruesit/lockscreen', $data);
    }

    function sfondi($id)
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . '/perdoruesit/kycu');
            exit;
        }

        $data['perdoruesi'] = $this->perdoruesit_model->merr_perdoruesin($id);
        return $this->shfaq_kornizat('perdoruesit/sfondi', $data);
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
                'emri' => $this->kerkesa->merrPost('emri'),
                'mbiemri' => $this->kerkesa->merrPost('mbiemri'),
                'emaili' => $this->kerkesa->merrPost('email'),
                'grupi' => $this->kerkesa->merrPost('grupi'),
            ];

            if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
                $foto_emri = $_FILES['foto']['name'];
                $foto_emri_tmp = $_FILES['foto']['tmp_name'];
                $foto_path = ROOT . '/asetet/foto/usr/' . $foto_emri;
                move_uploaded_file($foto_emri_tmp, $foto_path);
                $data['foto'] = $foto_emri;
            }

            if ($this->kerkesa->merrPost('fjalekalimi')) {
                $fk = $this->kerkesa->merrPost('fjalekalimi');
                $kfk = $this->kerkesa->merrPost('kfjalekalimi');

                //nese jon te njejta, lejo
                if ($fk == $kfk) {
                    $data['fjalekalimi'] = $fk;
                } else {
                    $this->flash->krijo('danger', 'Fushat fjalëkalimi dhe konfirmo fjalëkalimin duhet të kenë vlera të njejta!');
                    header('Location: ' . ROOT . '/perdoruesit/sfondi/' . $id);
                    exit;
                }
            }

            $this->perdoruesit_model->perditeso($id, $data);

            if ($id == $_SESSION['id']) {
                $_SESSION['emri'] = $data['emri'];
                $_SESSION['mbiemri'] = $data['mbiemri'];
                $_SESSION['emaili'] = $data['emaili'];
            }

            //edito
            $this->flash->krijo('success', 'Profili është përditësuar me sukses!');
            header('Location: ' . ROOT . '/perdoruesit/sfondi/' . $id);
            exit;
        }
        header('Location: ' . ROOT . '/ballina');
    }

    function shlyej($id)
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . '/perdoruesit/kycu');
            exit;
        }

        $this->perdoruesit_model->shlyej($id);
        $this->flash->krijo('success', 'Profili është shlyer me sukses!');
        header('Location: ' . ROOT . '/perdoruesit');
        exit;
    }

    function krijo()
    {
        if (!isset($_SESSION['emri'])) {
            header('location: ' . ROOT . '/perdoruesit/kycu');
            exit;
        }

        $data['titulli'] = 'Krijo Përdorues';

        $metoda = $this->kerkesa->merrMetoden();
        if ($metoda == 'POST') {
            $data = [
                'emri' => $this->kerkesa->merrPost('emri'),
                'mbiemri' => $this->kerkesa->merrPost('mbiemri'),
                'emaili' => $this->kerkesa->merrPost('email'),
                'fjalekalimi' => $this->kerkesa->merrPost('fjalekalimi'),
                'grupi' => $this->kerkesa->merrPost('grupi'),
            ];

            if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
                $foto_emri = $_FILES['foto']['name'];
                $foto_emri_tmp = $_FILES['foto']['tmp_name'];
                $foto_path = ROOT . '/asetet/foto/usr/' . $foto_emri;

                move_uploaded_file($foto_emri_tmp, $foto_path);

                $data['foto'] = $foto_emri;
            } else {
                $data['foto'] = 'user.jpg';
            }

            $this->perdoruesit_model->fut($data);

            $this->flash->krijo('success', 'Profili është krijuar me sukses!');
            header('Location: ' . ROOT . '/perdoruesit');
            exit;
        }

        return $this->shfaq_kornizat('perdoruesit/krijo', $data);
    }
}