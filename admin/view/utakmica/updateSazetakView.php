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
            <h2>Sažetak</h2>
            <?php
                if (!empty($greskaPoruka)) 
                {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo  $greskaPoruka;
                    echo '</div>';
                }
            ?>
            <form action="/admin/uredi_sazetak.php?id=<?php echo $sazetak["id"] ?>&utakmica_id=<?php echo $_GET["utakmica_id"] ?>" method="POST" name="sazetak">
                <div class="mb-3">
                    <label for="igrac_id">Igrač</label>
                    <select class="form-select form-select-lg mb-3" name="igrac_id">
                        <option value=""> - </option>
                        <?php
                        foreach ($igraci as $igrac) 
                        {
                            $selected = "";
                            if ($igrac["id"] == $sazetak["igrac_id"]) {
                                $selected = " selected";
                            }
                            
                            echo "s<option value='{$igrac["id"]}' $selected>{$igrac["ime"]} {$igrac["prezime"]}</option>";
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
                    <textarea name="tekst" id="" cols="40" rows="5"><?php 
                    if(!empty($sazetak["tekst"]))
                    {
                        echo $sazetak["tekst"];
                    }
                    ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Uredi</button>
            </form>
        </div>

    </div>
    <div class="my-5"></div>

</div>

<?php
####### kraj sadrzaja create-a
require_once(__DIR__ . "/../inc/footer.php");
?>