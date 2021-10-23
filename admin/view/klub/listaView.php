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
                        <th scope="col">Logo</th>
                        <th scope="col"></th>
                        
                    </tr>
                </thead>
                <tbody>

                    <?php
                
                        foreach($rezultat as $klub)
                        {
                            echo "<tr>";
                            echo "<th scope='row'>{$klub["id"]}</th>";
                            echo "<td>{$klub["naziv"]}</td>";
                            echo "<td>{$klub["logo"]}</td>";
                            echo "<td><a href='uredi_klub.php?id={$klub["id"]}'>Uredi</a> | <a href='izbrisi_klub.php?id={$klub["id"]}'>Izbriši</a></td>";
                        
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
