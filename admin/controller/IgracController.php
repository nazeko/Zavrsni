<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config/config.php");
// kontroler koristi model
require_once(__DIR__."/../model/IgracModel.php");
require_once(__DIR__."/../model/KlubModel.php");

class IgracController
{
    /**
     * Metoda koja služi za prikaz forme za dodavanje klubove i dodavanje klubove 
     *
     * @return void
     */
    public function create()
    {
        global $config;
        // meta title (tab od browsera)   
        $title = "Dodaj igrača";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "kreiraj";

        //provjeravamo da li je korisnik kliknio submit
        $greskaPoruka="";

        $KlubModel = new KlubModel;

        $klubovi = $KlubModel->dohvatiSveKlubove();
        
        // print_r($klubovi);


        if(!empty($_POST))
        {
            // provjeravamo da li je korisnik unio sva potrebna polja
            if(
                !empty($_POST["klub_id"]) and 
                !empty($_POST["ime"]) and 
                !empty($_POST["prezime"]) and 
                !empty($_POST["pozicija"]) and 
                !empty($_POST["dob"]) and 
                !empty($_POST["visina"]) and 
                !empty($_POST["tezina"]) and 
                !empty($_POST["noga"])
                )
            {
                $timestamp = strtotime($_POST["dob"]);
                $datum_za_bazu = date("Y-m-d H:i:s", $timestamp);
                // inicijalizaciju klase
                $IgracModel = new IgracModel;
                
                // u ovoj klasi nadi mi funkciju Igrac
                $rezultat = $IgracModel->dodajIgraca(
                    $_POST["klub_id"],
                    $_POST["ime"],
                    $_POST["prezime"],
                    $_POST["pozicija"],
                    $datum_za_bazu,
                    $_POST["visina"],
                    $_POST["tezina"],
                    $_POST["noga"]
                );
                if($rezultat)
                {
                    header("Location: /admin/pregled_igrac.php");
                }
            }
            else
            {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka= "Molimo unesite sva potrebna polja!";
            }
        }
        ob_start();
        require_once( 'view/igrac/createView.php' );
        $output = ob_get_clean();
        return $output;
    }
    public function read()
    {
       
        // meta title (tab od browsera)   
        $title = "Pregledaj igrače";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "pregled";

        $KlubModel = new KlubModel;
        $IgracModel = new IgracModel;

        // spema se rezultat metode u varijablu rezultat
        $rezultat = $IgracModel->dohvatiSveIgrace();
        

        foreach($rezultat as $key => $igrac)
        {
            
            if(!empty($igrac["klub_id"]))
            {
                $rezultat[$key]["klub"] = $KlubModel->dohvatiKlubPomocuId($igrac["klub_id"]);
            }
        }
        // print_r($rezultat);
        // die();
        ob_start();
        require_once( 'view/igrac/listaView.php' );
        $output = ob_get_clean();
        return $output;
    }

    public function update()
    {
        global $config;

        $KlubModel = new KlubModel;

        $klubovi = $KlubModel->dohvatiSveKlubove();

        // meta title (tab od browsera)   
        $title = "Uredi igrača";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "kreiraj";

        $greskaPoruka="";
        // dohvati podatke od Igracove iz baze pomoću id-a iz $_GET paramtra 
        // tako da se u formi mogu prikazati trenutni podaci
        
        $IgracModel = new IgracModel;
        $rezultat=$IgracModel->dohvatiIgracaPomocuId($_GET["id"]);
        
        //provjeravamo da li je korisnik kliknio submit
        if(!empty($_POST))
        {
            $timestamp = strtotime($_POST["dob"]);
            $datum_za_bazu = date("Y-m-d H:i:s", $timestamp);
            // provjeravamo da li je korisnik unio sva potrebna polja
            if(
                !empty($_POST["klub_id"]) and 
                !empty($_POST["ime"]) and 
                !empty($_POST["prezime"]) and 
                !empty($_POST["pozicija"]) and 
                !empty($_POST["dob"]) and 
                !empty($_POST["visina"]) and 
                !empty($_POST["tezina"]) and 
                !empty($_POST["noga"])
                )
            {
                // inicijalizaciju klase
                $IgracModel = new IgracModel;
                
                // u ovoj klasi nadi mi funkciju Igrac
                $rezultat = $IgracModel->urediIgraca(
                    $_GET["id"],
                    $_POST["klub_id"],
                    $_POST["ime"],
                    $_POST["prezime"],
                    $_POST["pozicija"],
                    $datum_za_bazu,
                    $_POST["visina"],
                    $_POST["tezina"],
                    $_POST["noga"]
                );

                if($rezultat)
                {
                    header("Location: /admin/pregled_igrac.php");
                }
            }
            else
            {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka= "Molimo unesite sva potrebna polja!";
            }
        }
        ob_start();
        require_once( 'view/igrac/updateView.php' );
        $output = ob_get_clean();
        return $output;
    }

    public function delete()
    {
        $IgracModel = new IgracModel;
        $rezultat=$IgracModel->izbrisiIgraca($_GET["id"]);

        if($rezultat)
        {
            header("Location: /admin/pregled_igrac.php");
        }
    }
}


