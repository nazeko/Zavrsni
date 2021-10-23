<?php

require_once(__DIR__ . "/../inc/header.php");
require_once(__DIR__ . "/../inc/nav.php");
######## sadrzaj create-a ide ovdje ------####### 
?>
<div class="my-5"></div>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-6">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Klub</th>
                        <th scope="col">Ime</th>
                        <th scope="col">Prezime</th>
                        <th scope="col">Pozicija</th>
                        <th scope="col">Datum rođenja</th>
                        <th scope="col">Visina</th>
                        <th scope="col">Težina</th>
                        <th scope="col">Noga</th>
                        <th scope="col"></th>
                        
                    </tr>
                </thead>
                <tbody>

                    <?php
                
                        foreach($rezultat as $igrac)
                        {
                            echo "<tr>";
                            echo "<th scope='row'>{$igrac["id"]}</th>";
                            echo "<td>{$igrac["klub"]["naziv"]}</td>";
                            echo "<td>{$igrac["ime"]}</td>";
                            echo "<td>{$igrac["prezime"]}</td>";
                            echo "<td>{$igrac["pozicija"]}</td>";
                            $timestamp = strtotime($igrac["dob"]);
                            echo "<td>".date("d.m.Y",$timestamp)."</td>";
                            echo "<td>{$igrac["visina"]} cm</td>";
                            echo "<td>{$igrac["tezina"]} kg</td>";
                            echo "<td>{$igrac["noga"]}</td>";
                            
                            echo "<td><a href='uredi_igrac.php?id={$igrac["id"]}'>Uredi</a> | <a href='izbrisi_igrac.php?id={$igrac["id"]}'>Izbriši</a></td>";
                        
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>


<?php
####### kraj sadrzaja create-a
require_once(__DIR__ . "/../inc/footer.php");
