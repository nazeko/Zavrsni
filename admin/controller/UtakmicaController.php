<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config/config.php");
// kontroler koristi model
require_once(__DIR__."/../model/UtakmicaModel.php");

require_once(__DIR__."/../model/KlubModel.php");
require_once(__DIR__."/../model/IgracModel.php");

class UtakmicaController
{
    /**
     * Metoda koja služi za prikaz forme za dodavanje utakmice i dodavanje utakmice 
     *
     * @return void
     */
    public function create()
    {
        // meta title (tab od browsera)   
        $title = "Dodaj utakmicu";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "kreiraj";
        
        $KlubModel = new KlubModel;
        
        $klubovi = $KlubModel->dohvatiSveKlubove();
        
        //provjeravamo da li je korisnik kliknio submit
        if(!empty($_POST))
        {
            // provjeravamo da li je korisnik unio sva potrebna polja
            if(
                !empty($_POST["domacin_id"]) and 
                !empty($_POST["gost_id"]) and 
                !empty($_POST["datum"]) and  
                !empty($_POST["sudac"]) and  
                !empty($_POST["stadion"]) and  
                !empty($_POST["gledatelji"]))
            {
                // inicijalizaciju klase
                $utakmicaModel = new UtakmicaModel;
                
                // u ovoj klasi nadi mi funkciju utakmica
                $rezultat = $utakmicaModel->dodajUtakmicu(
                    $_POST["domacin_id"],
                    $_POST["gost_id"], 
                    $_POST["datum"], 
                    $_POST["sudac"], 
                    $_POST["stadion"], 
                    $_POST["gledatelji"]);

                if($rezultat)
                {
                    header("Location: /admin/pregled_utakmica.php");
                }
            }
            else
            {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka= "Molimo unesite sva potrebna polja!";
            }
        }
        ob_start();
        require_once( 'view/utakmica/createView.php' );
        $output = ob_get_clean();
        return $output;
    }
    public function read()
    {
        // meta title (tab od browsera)   
        $title = "Pregledaj utakmice";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "pregled";

        $utakmicaModel = new UtakmicaModel;
        // spema se rezultat metode u varijablu rezultat
        $KlubModel = new KlubModel; 

        $rezultat = $utakmicaModel->dohvatiSveUtakmice();
        
        foreach($rezultat as $key => $igrac)
        {
            
            if(!empty($igrac["domacin_id"]))
            {
                $rezultat[$key]["domacin"] = $KlubModel->dohvatiKlubPomocuId($igrac["domacin_id"]);;
            }
            if(!empty($igrac["gost_id"]))
            {
                $rezultat[$key]["gost"] = $KlubModel->dohvatiKlubPomocuId($igrac["gost_id"]);;
            }
        }
        ob_start();
        require_once( 'view/utakmica/listaView.php' );
        $output = ob_get_clean();
        return $output;
    }

    public function update()
    {
        // meta title (tab od browsera)   
        $title = "Uredi utakmicu";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "kreiraj";

        $greskaPoruka="";
        // dohvati podatke od utakmice iz baze pomoću id-a iz $_GET paramtra 
        // tako da se u formi mogu prikazati trenutni podaci
        
        $IgracModel = new IgracModel;
        $igraci = $IgracModel->dohvatiSveIgrace();

        $KlubModel = new KlubModel;
        $klubovi = $KlubModel->dohvatiSveKlubove();

        $utakmicaModel = new UtakmicaModel;
        $utakmica=$utakmicaModel->dohvatiUtakmicuPomocuId($_GET["id"]);

        $sazetak=$utakmicaModel->dohvatiSazetakPomocuUtakmicaId($_GET["id"]);
        foreach($sazetak as $k => $s)
        {
            $sazetak[$k]["igrac"] = array();

            if(!empty($s["igrac_id"]))
            {
                $sazetak[$k]["igrac"] = $IgracModel->dohvatiigracaPomocuId($s["igrac_id"]);
            }
        }

        //provjeravamo da li je korisnik kliknio submit
        if(!empty($_POST) and $_GET["form"] == "utakmica")
        {
            // provjeravamo da li je korisnik unio sva potrebna polja
            if(
                !empty($_POST["domacin_id"]) and 
                !empty($_POST["gost_id"]) and 
                !empty($_POST["datum"]) and  
                !empty($_POST["sudac"]) and  
                !empty($_POST["stadion"]) and  
                !empty($_POST["gledatelji"])
            )
            {
                // inicijalizaciju klase
                $utakmicaModel = new UtakmicaModel;
                
                // u ovoj klasi nadi mi funkciju utakmica
                $rezultat = $utakmicaModel->urediUtakmicu(
                    $_GET["id"],
                    $_POST["domacin_id"],
                    $_POST["gost_id"], 
                    $_POST["datum"], 
                    $_POST["sudac"], 
                    $_POST["stadion"], 
                    $_POST["gledatelji"]);
                if($rezultat)
                {
                    header("Location: /admin/pregled_utakmica.php");
                }
            }
            else
            {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka= "Molimo unesite sva potrebna polja!";
            }
        }

        if (!empty($_POST) and !empty($_GET["form"]) && $_GET["form"] == "sazetak") 
        {
            // provjeravamo da li je korisnik unio sva potrebna polja
            if (
                !empty($_POST["utakmica_id"]) and
                !empty($_POST["igrac_id"]) and
                !empty($_POST["minuta"]) and
                !empty($_POST["rezultat"]) and
                !empty($_POST["dogadaj"]) and
                !empty($_POST["tekst"])
            )
            {
                // inicijalizaciju klase
                $utakmicaModel = new UtakmicaModel;

                $rezultat = $utakmicaModel->dodajSazetak(
                    $_POST["utakmica_id"], 
                    $_POST["igrac_id"], 
                    $_POST["minuta"], 
                    $_POST["rezultat"], 
                    $_POST["dogadaj"], 
                    $_POST["tekst"]
                );
                if ($rezultat) 
                {
                    header("Location: /admin/uredi_utakmicu.php?id=".$_GET["id"]);
                }
            
            } else {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka = "Molimo unesite sva potrebna polja!";
            }
        }

        ob_start();
        require_once( 'view/utakmica/updateView.php' );
        $output = ob_get_clean();
        return $output;
    }

    public function delete()
    {
        $utakmicaModel = new UtakmicaModel;
        $rezultat=$utakmicaModel->izbrisiUtakmicu($_GET["id"]);

        if($rezultat)
        {
            header("Location: /admin/pregled_utakmica.php");
        }
    }

    public function updateSazetak()
    {
        // meta title (tab od browsera)   
        $title = "Uredi Sažetak";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "pregled";

        $greskaPoruka="";
        // dohvati podatke od države iz baze pomoću id-a iz $_GET paramtra 
        // tako da se u formi mogu prikazati trenutni podaci
        $IgracModel = new IgracModel;
        $igraci = $IgracModel->dohvatiSveIgrace();
        
        $UtakmicaModel = new UtakmicaModel;
        $sazetak=$UtakmicaModel->dohvatiSazetakPomocuId($_GET["id"]);
        // print_r($_POST);
        // die();
        //provjeravamo da li je korisnik kliknio submit
        if(!empty($_POST))
        {
            // provjeravamo da li je korisnik unio sva potrebna polja
            if (
                !empty($_POST["igrac_id"]) and
                !empty($_POST["minuta"]) and
                !empty($_POST["rezultat"]) and
                !empty($_POST["dogadaj"]) and
                !empty($_POST["tekst"])
            )
            {
                // inicijalizaciju klase

                $rezultat = $UtakmicaModel->urediSazetak(
                    $_GET["id"],
                    $_POST["igrac_id"], 
                    $_POST["minuta"], 
                    $_POST["rezultat"], 
                    $_POST["dogadaj"], 
                    $_POST["tekst"]
                );
                if ($rezultat) 
                {
                    header("Location: /admin/uredi_utakmicu.php?id=".$_GET["utakmica_id"]);
                }
            
            } else {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka = "Molimo unesite sva potrebna polja!";
            }
        }
        ob_start();
        require_once( 'view/utakmica/updateSazetakView.php' );
        $output = ob_get_clean();
        return $output;
    }
    public function deleteSazetak()
    {
        $utakmicaModel = new UtakmicaModel;
        $rezultat=$utakmicaModel->izbrisiSazetak($_GET["id"]);

        if($rezultat)
        {
            header("Location: /admin/uredi_utakmicu.php?id=".$_GET["utakmica_id"]);
        }
    }
}


