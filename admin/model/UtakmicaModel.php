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

        $upit = "UPDATE utakmice SET  domacin_id=$domacin_id, gost_id=$gost_id, datum='$datum', sudac='$sudac', stadion='$stadion', gledatelji=$gledatelji WHERE id=$id";

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

        $upit2 = "DELETE FROM sazetak WHERE utakmica_id=$id";

        $sazetak = $this->izvrsi_upit($veza,$upit2, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($utakmica) and !empty($sazetak))
        {
            $response = true;
        }
        return $response;
    }

    public function dodajSazetak(
        int $utakmica_id, 
        int $igrac_id, 
        string $minuta, 
        string $rezultat, 
        string $dogadaj, 
        string $tekst 
    )
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "INSERT INTO sazetak ( utakmica_id, igrac_id, minuta, rezultat, dogadaj, tekst)
        VALUES ( $utakmica_id, $igrac_id, '$minuta', '$rezultat', '$dogadaj', '$tekst' )";

        $utakmica = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($utakmica))
        {
            $response = true;
        }
        return $response;
    }

    public function urediSazetak(
        int $id, 
        int $igrac_id, 
        string $minuta, 
        string $rezultat, 
        string $dogadaj, 
        string $tekst
    )
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "UPDATE sazetak SET igrac_id=$igrac_id, minuta='$minuta', rezultat='$rezultat', dogadaj='$dogadaj', tekst='$tekst' WHERE id=$id";

        $utakmica = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($utakmica))
        {
            $response = true;
        }
        return $response;
    }

    public function dohvatiSazetakPomocuUtakmicaId($id)
    {
        $response = array();
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM sazetak WHERE utakmica_id=$id ";

        $sazetak = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($sazetak))
        {
            $response = $sazetak;
        }
        return $response;
    }

    public function dohvatiSazetakPomocuId($id)
    {
        $response = array();
        $veza = $this->spajanje_na_bazu();

        $upit = "SELECT * FROM sazetak WHERE id=$id ";

        $sazetak = $this->izvrsi_upit($veza,$upit);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($sazetak[0]))
        {
            $response = $sazetak[0];
        }
        return $response;
    }

    public function izbrisiSazetak(int $id)
    {
        $response = false;
        $veza = $this->spajanje_na_bazu();

        $upit = "DELETE FROM sazetak WHERE id=$id";

        $utakmica = $this->izvrsi_upit($veza,$upit, true);

        $this->zatvori_vezu_na_bazu($veza);

        if(!empty($utakmica))
        {
            $response = true;
        }
        return $response;
    }
}