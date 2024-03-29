<?php

require_once("Database.php");
class DrzavaModel extends Database
{
    
    public function dodajDrzavu(string $naziv,string $logo)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "INSERT INTO drzave ( naziv, logo )
        VALUES ( '$naziv','$logo' )";

        $drzava = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($drzava))
        {
            $response = true;
        }
        return $response;
    }

    public function dohvatiSveDrzave()
    {
        $response = array();
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM drzave ";
        $drzava = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($drzava))
        {
            $response = $drzava;
        }
        return $response;
    }
    public function dohvatiDrzavuPomocuId($id)
    {
        $response = array();
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM drzave WHERE id=$id ";

        $drzava = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($drzava[0]))
        {
            $response = $drzava[0];
        }
        return $response;
    }
    public function urediDrzavu(int $id,string $naziv,string $logo)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "UPDATE drzave SET naziv='$naziv', logo='$logo' WHERE id=$id";

        $drzava = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($drzava))
        {
            $response = true;
        }
        return $response;
    }
    public function izbrisiDrzavu(int $id)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "DELETE FROM drzave WHERE id=$id";

        $drzava = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($drzava))
        {
            $response = true;
        }
        return $response;
    }
}