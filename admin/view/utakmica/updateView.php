<?php
require_once(__DIR__ . "/../inc/header.php");
require_once(__DIR__ . "/../inc/nav.php");
######## sadrzaj create-a ide ovdje ------####### 
?>
<div class="my-5"></div>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-6">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Uredi utakmicu</h1>
                </div>
            </div>
            <div class="my-5">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Dodaj Sažetak
                </a>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <h2>Sažetak</h2>
                    <?php
                        if (!empty($greskaPoruka) and !empty($_GET["form"] and $_GET["form"]=="sazetak")) 
                        {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo  $greskaPoruka;
                            echo '</div>';
                        }
                    ?>
                    <form action="/admin/uredi_utakmicu.php?form=sazetak&id=<?php echo $utakmica["id"] ?>" method="POST" name="sazetak">
                        <input type="hidden" name="utakmica_id" value="<?php echo $_GET["id"] ?>">

                        <div class="mb-3">
                            <label for="igrac_id">Igrač</label>
                            <select class="form-select form-select-lg mb-3" name="igrac_id">
                                <option value=""> - </option>
                                <?php
                                foreach ($igraci as $igrac) 
                                {
                                    
                                    echo "<option value='{$igrac["id"]}'>{$igrac["ime"]} {$igrac["prezime"]}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="minuta" class="form-label">Minuta:</label>
                            <input name="minuta" type="text" class="form-control" id="minuta" value="<?php 
                            if(!empty($sazetak["minuta"]))
                            {
                                echo $sazetak["minuta"];
                            }
                            ?>">
                        </div>
                        <div class="mb-3">
                            <label for="rezultat" class="form-label">Rezultat:</label>
                            <input name="rezultat" type="text" class="form-control" id="rezultat" value="<?php 
                            if(!empty($sazetak["rezultat"]))
                            {
                                echo $sazetak["rezultat"];
                            }
                            ?>">
                        </div>
                        <div class="mb-3">
                            <label for="dogadaj" class="form-label">Događaj:</label>
                            <input name="dogadaj" type="text" class="form-control" id="dogadaj" value="<?php 
                            if(!empty($sazetak["dogadaj"]))
                            {
                                echo $sazetak["dogadaj"];
                            }
                            ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="tekst" class="form-label">Tekst:</label>
                            <textarea name="tekst" id="" cols="40" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php
                if (!empty($greskaPoruka) and !empty($_GET["form"] and $_GET["form"]=="utakmica"))
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo  $greskaPoruka;
                    echo '</div>';
                }
            ?>
            <h2>
                Utakmica
            </h2>
            <form action="/admin/uredi_utakmicu.php?form=utakmica&id=<?php echo $utakmica["id"] ?>" method="POST">
                <div class="mb-3">
                    <label for="datum">Datum:</label>
                    <input style="width:100%; margin-bottom:30px" type="date" id="start" name="datum" value="
                    <?php
                        $timestamp = strtotime($utakmica["datum"]);
                        echo date("Y-m-d", $timestamp);
                    ?>">
                </div>

                <div class="mb-3">
                    <label for="domacin_id">Domaćin</label>
                    <select class="form-select form-select-lg mb-3" name="domacin_id">
                        <?php
                        foreach ($klubovi as $klub) {
                            $selected = "";
                            if ($klub["id"] == $utakmica["domacin_id"]) {
                                $selected = " selected";
                            }
                            echo "<option value='{$klub["id"]}'$selected>{$klub["naziv"]}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="gost_id">Gost:</label>
                    <select class="form-select form-select-lg mb-3" name="gost_id">
                        <?php
                        foreach ($klubovi as $klub) {
                            $selected = "";
                            if ($klub["id"] == $utakmica["gost_id"]) {
                                $selected = " selected";
                            }
                            echo "<option value='{$klub["id"]}'$selected>{$klub["naziv"]}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="sudac" class="form-label">Sudac:</label>
                    <input name="sudac" type="text" class="form-control" id="sudac" value="<?php echo $utakmica["sudac"] ?>">
                </div>

                <div class="mb-3">
                    <label for="stadion" class="form-label">Stadion:</label>
                    <input name="stadion" type="text" class="form-control" id="stadion" value="<?php echo $utakmica["stadion"] ?>">
                </div>

                <div class="mb-3">
                    <label for="gledatelji" class="form-label">Gledatelji:</label>
                    <input name="gledatelji" type="text" class="form-control" id="gledatelji" value="<?php echo $utakmica["gledatelji"] ?> ">
                </div>
                <button type="dodaj" class="btn btn-primary">Uredi</button>
            </form>
        </div>

        <div class="col">
            <h2>Statistika<h2>
        </div>
    </div>
    <div class="my-5"></div>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Igrač</th>
                        <th scope="col">Minuta</th>
                        <th scope="col">Rezultat</th>
                        <th scope="col">Događaj</th>
                        <th scope="col">Tekst</th>
                        <th scope="col"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($sazetak as $s)
                        {
                            echo "<tr>";
                            echo "<th scope='row'>{$s["id"]}</th>";
                            echo "<td>{$s["igrac"]["ime"]} {$s["igrac"]["prezime"]}</td>";
                            echo "<td>{$s["minuta"]}</td>";
                            echo "<td>{$s["rezultat"]}</td>";
                            echo "<td>{$s["dogadaj"]}</td>";
                            echo "<td>{$s["tekst"]}</td>";
                            echo "<td><a href='uredi_sazetak.php?id={$s["id"]}&utakmica_id={$utakmica["id"]}'>Uredi</a> | <a href='izbrisi_sazetak.php?id={$s["id"]}&utakmica_id={$utakmica["id"]}'>Izbriši</a></td>";
                        
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
?>