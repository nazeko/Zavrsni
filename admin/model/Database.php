<?php
require_once("../config/config.php");

class Database
{
    protected $config;

    public function __construct()
    {
        global $config;
        $this->config = $config;
    } 

    public function spajanje_na_bazu()
    {
        
        $veza=mysqli_connect(
            $this->config["dbhost"],
            $this->config["dbuser"],
            $this->config["dbpass"]
        );

        if($veza)
        {
            mysqli_select_db($veza,$this->config["dbname"]);
            mysqli_set_charset($veza,"utf8");
        }
        else
        {
            echo "Greška prilikom spajanja na bazu:" .mysqli_connect_error();
            die();
        }

        return $veza;
    }
    
    public function izvrsi_upit($veza,$upit,$insert_or_update = false)
    {
        $rezultat=mysqli_query($veza,$upit);
        
        if($insert_or_update)
        {
            return $rezultat;
        }
        else
        {
            $rows = array();
            if(!empty($rezultat))
            {
                while ($row = mysqli_fetch_assoc($rezultat))
                {
                    $rows[] = $row;
                }
            }
            return $rows;
        }

    }


    public function zatvori_vezu_na_bazu($veza)
    {
        mysqli_close($veza);
    }



}