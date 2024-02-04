<?php

trait Modeli
{
    use Databaza;

    protected $limit = 10;
    protected $offset = 0;

    function ku($data, $data_not = [])
    {
        $celesat = array_keys($data);
        $celesat_not = array_keys($data_not);
        $query = "select * from $this->tabela where ";
        foreach ($celesat as $c) {
            $query .= $c . ' = :' . $c . ' && ';
        }
        foreach ($celesat_not as $c) {
            $query .= $c . ' != :' . $c . ' && ';
        }

        $query = trim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";
        $rezultati = $this->query($query, array_merge($data, $data_not));
        return $rezultati;
    }

    function pari($data, $data_not = [])
    {
        $celesat = array_keys($data);
        $celesat_not = array_keys($data_not);
        $query = "select * from $this->tabela where ";
        foreach ($celesat as $c) {
            $query .= $c . ' = :' . $c . ' && ';
        }
        foreach ($celesat_not as $c) {
            $query .= $c . ' != :' . $c . ' && ';
        }

        $query = trim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";
        $rezultati = $this->query($query, array_merge($data, $data_not));
        if ($rezultati) {
            return $rezultati[0];
        }

        return false;
    }

    function fut($data)
    {
        $celesat = array_keys($data);
        $query = "insert into $this->tabela (" . implode(",", $celesat) . ") values (:" . implode(",:", $celesat) . ")";
        $this->query($query, $data);
        return false;
    }

    function perditeso($id, $data, $kolona_id = 'id')
    {
        $celesat = array_keys($data);
        $query = "update $this->tabela set ";
        foreach ($celesat as $c) {
            $query .= $c . ' = :' . $c . ', ';
        }

        $query = trim($query, ", ");

        $query .= " where $kolona_id = :$kolona_id";

        $data[$kolona_id] = $id;
        $rezultati = $this->query($query, $data);
        return $rezultati;
    }

    function shlyej($id, $kolona_id = 'id')
    {
        $data[$kolona_id] = $id;
        $query = "delete from $this->tabela where $kolona_id = :$kolona_id";

        $this->query($query, $data);
        return false;
    }
}