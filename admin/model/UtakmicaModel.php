<?php

require_once("Database.php");
class UtakmicaModel extends Database
{
    public function dodajUtakmicu(string $datum,int $domacin_id, int $gost_id, string $sudac, string $stadion, int $gledatelji )
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "INSERT INTO utakmice ( datum, domacin_id, gost_id, sudac, stadion, gledatelji)
        VALUES ( '$datum',$domacin_id, $gost_id, '$sudac', '$stadion', $gledatelji )";

        $utakmica = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($utakmica))
        {
            $response = true;
        }
        return $response;
    }

    public function dohvatiSveUtakmice()
    {
        $response = array();
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM utakmice ";
        $utakmica = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($utakmica))
        {
            $response = $utakmica;
        }
        return $response;
    }
    public function dohvatiUtakmicuPomocuId($id)
    {
        $response = array();
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM utakmice WHERE id=$id ";

        $utakmica = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($utakmica[0]))
        {
            $response = $utakmica[0];
        }
        return $response;
    }
    public function urediUtakmicu(int $id,string $datum,int $domacin_id, int $gost_id, string $sudac, string $stadion, int $gledatelji)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "UPDATE utakmice SET  datum='$datum', domacin_id=$domacin_id, gost_id=$gost_id, sudac='$sudac', stadion='$stadion', gledatelji=$gledatelji WHERE id=$id";

        $utakmica = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($utakmica))
        {
            $response = true;
        }
        return $response;
    }
    public function izbrisiUtakmicu(int $id)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "DELETE FROM utakmice WHERE id=$id";

        $utakmica = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($utakmica))
        {
            $response = true;
        }
        return $response;
    }
}