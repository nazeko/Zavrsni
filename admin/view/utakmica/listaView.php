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
                        <th scope="col">Datum</th>
                        <th scope="col">Domaćin</th>
                        <th scope="col">Gost</th>
                        <th scope="col">Sudac</th>
                        <th scope="col">Stadion</th>
                        <th scope="col">Gledatelji</th>
                        <th scope="col"></th>
                        
                    </tr>
                </thead>
                <tbody>

                    <?php
                        foreach($rezultat as $utakmica)
                        {
                            echo "<tr>";
                            echo "<th scope='row'>{$utakmica["id"]}</th>";
                            $timestamp = strtotime($utakmica["datum"]);
                            echo "<td>".date("d.m.Y",$timestamp)."</td>";
                            echo "<td>{$utakmica["domacin"]["naziv"]}</td>";
                            echo "<td>{$utakmica["gost"]["naziv"]}</td>";
                            echo "<td>{$utakmica["sudac"]}</td>";
                            echo "<td>{$utakmica["stadion"]}</td>";
                            echo "<td>{$utakmica["gledatelji"]}</td>";
                            echo "<td><a href='uredi_utakmicu.php?id={$utakmica["id"]}'>Uredi</a> | <a href='izbrisi_utakmicu.php?id={$utakmica["id"]}'>Izbriši</a></td>";
                        
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
