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
                    <h1 class="display-4">Novi igrač</h1>
                </div>
            </div>
            <div class="my-5"></div>

            <?php
            if (!empty($greskaPoruka)) {
                echo '<div class="alert alert-danger" role="alert">';
                echo  $greskaPoruka;
                echo '</div>';
            }
            ?>
            <form action="/admin/uredi_igrac.php?id=<?php echo $rezultat["id"] ?>" method="POST">
                <label for="klub_id">Odaberi klub</label>
                <select class="form-select form-select-lg mb-3" name="klub_id">
                    <option value="">Nema kluba</option>
                    <?php
                    foreach ($klubovi as $klub) {
                        $selected = "";
                        if($klub["id"] == $rezultat["klub_id"])
                        {
                            $selected = " selected";
                        }
                        echo "<option value='{$klub["id"]}' $selected>{$klub["naziv"]}</option>";
                    }
                    ?>
                </select>
                <div class="mb-3">
                    <label for="ime" class="form-label">Ime</label>
                    <input name="ime" type="text" class="form-control" id="naziv" value="<?php echo $rezultat["ime"] ?>">
                </div>
                <div class="mb-3">
                    <label for="prezime" class="form-label">Prezime</label>
                    <input name="prezime" type="text" class="form-control" id="prezime" value="<?php echo $rezultat["prezime"] ?>" >
                </div>
                <label for="pozcicija">Odaberi poziciju:</label>
                <select name="pozicija" class="form-select form-select-lg mb-3">
                    <?php

                    foreach ($config["field_positions"] as $grupa => $pozicija) 
                    {

                        echo "<optgroup label='{$grupa}'>";
                        foreach ($pozicija as $poz) 
                        {
                            $selected = "";
                            if ($poz == $rezultat["pozicija"]) 
                            {
                                $selected = " selected";
                            }
                            echo "  <option value='$poz' $selected >$poz</option>";
                        }

                        echo " </optgroup>";
                    }
                    ?>
                </select>
                <label for="start">Datum rođenja:</label>

                <input style="width:100%; margin-bottom:30px" type="date" id="start" name="dob" value="<?php
                    $timestamp = strtotime($rezultat["dob"]);
                    echo date("Y-m-d", $timestamp);
                ?>" max="<?php echo date("Y-m-d", strtotime('-14 year'));?>">
                
                <div class="mb-3">
                    <label for="visina" class="form-label">Visina(cm)</label>
                    <input name="visina" type="number" max="240" min="100" class="form-control" id="visina" value="<?php echo $rezultat["visina"] ?>">
                </div>
                
                <div class="mb-3">
                    <label for="tezina" class="form-label">Težina(cm)</label>
                    <input name="tezina" type="number" max="150" min="30" class="form-control" id="tezina" value="<?php echo $rezultat["tezina"] ?>">
                </div>
                
                <label for="noga">Odaberi nogu</label>
                <select class="form-select form-select-lg mb-3" name="noga">
                    <option value="lijeva" <?php 
                    if ($rezultat["noga"] == "lijeva") {
                            echo " selected";
                        }
                    ?>>Lijeva</option>
                    <option value="desna" <?php 
                    if ($rezultat["noga"] == "desna") {
                            echo " selected";
                        }
                    ?>>Desna</option>
                    <option value="obe"<?php 
                    if ($rezultat["noga"] == "obe") {
                            echo " selected";
                        }
                    ?>>Igrač s dvije noge</option>
                </select>
                <button type="dodaj" class="btn btn-primary">Dodaj</button>
            </form>
        </div>

    </div>
</div>


<?php
####### kraj sadrzaja create-a
require_once(__DIR__ . "/../inc/footer.php");
