<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config/config.php");
// kontroler koristi model
require_once(__DIR__."/../model/DrzavaModel.php");

class DrzavaController
{
    /**
     * Metoda koja služi za prikaz forme za dodavanje države i dodavanje države 
     *
     * @return void
     */
    public function create()
    {
        // meta title (tab od browsera)   
        $title = "Dodaj državu";
        //varijabla za postavljanje aktivne klase u navigaciji
        $nav = "kreiraj";

        //provjeravamo da li je korisnik kliknio submit
        $greskaPoruka="";
        if(!empty($_POST))
        {
            // provjeravamo da li je korisnik unio sva potrebna polja
            if(!empty($_POST["naziv"]) and !empty($_POST["logo"]))
            {
                $DrzavaModel = new DrzavaModel;
                
                $rezultat = $DrzavaModel->dodajDrzavu($_POST["naziv"],$_POST["logo"]);
                 

            }
            else
            {
                // ovo se izvrši ako je korisnik kliknuo submit ali nije unio sva potrebna polja
                $greskaPoruka= "Molimo unesite sva potrebna polja!";
            }
        }
        ob_start();
        require_once( 'view/drzava/createView.php' );
        $output = ob_get_clean();
        return $output;
    }
    public function read()
    {
        ob_start();
        require_once( 'view/dashView.php' );
        $output = ob_get_clean();
        return $output;
    }

    public function update()
    {
        ob_start();
        require_once( 'view/dashView.php' );
        $output = ob_get_clean();
        return $output;
    }

    public function delete()
    {
        ob_start();
        require_once( 'view/dashView.php' );
        $output = ob_get_clean();
        return $output;
    }
}


