<?php

require_once("Database.php");
class LigaModel extends Database
{
    
    public function dodajLigu(string $naziv,string $logo)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "INSERT INTO lige ( naziv, logo )
        VALUES ( '$naziv','$logo' )";

        $drzava = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($drzava))
        {
            $response = true;
        }
        return $response;
    }

    public function dohvatiSveLige()
    {
        $response = array();
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM lige ";
        $drzava = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($drzava))
        {
            $response = $drzava;
        }
        return $response;
    }
    public function dohvatiLiguPomocuId($id)
    {
        $response = array();
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM lige WHERE id=$id ";

        $drzava = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($drzava[0]))
        {
            $response = $drzava[0];
        }
        return $response;
    }
    public function urediLigu(int $id,string $naziv,string $logo)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "UPDATE lige SET naziv='$naziv', logo='$logo' WHERE id=$id";

        $drzava = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($drzava))
        {
            $response = true;
        }
        return $response;
    }
    public function izbrisiLigu(int $id)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "DELETE FROM lige WHERE id=$id";

        $drzava = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($drzava))
        {
            $response = true;
        }
        return $response;
    }
}