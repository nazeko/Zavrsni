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
            <div class="my-5"></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <?php
            if (!empty($greskaPoruka)) {
                echo '<div class="alert alert-danger" role="alert">';
                echo  $greskaPoruka;
                echo '</div>';
            }
            ?>
            <form action="/admin/uredi_utakmicu.php?id=<?php echo $rezultat["id"] ?>" method="POST">
                <div class="mb-3">
                    <label for="datum">Datum:</label>
                    <input style="width:100%; margin-bottom:30px" type="date" id="start" name="datum" value="<?php
                    $timestamp = strtotime($rezultat["datum"]);
                    echo date("Y-m-d", $timestamp);
                ?>">
                </div>

                <div class="mb-3">
                    <label for="domacin_id">Domaćin</label>
                    <select class="form-select form-select-lg mb-3" name="domacin_id">
                        <?php
                        foreach ($klubovi as $klub) {
                            $selected = "";
                            if($klub["id"] == $rezultat["domacin_id"])
                            {
                                $selected = " selected";
                            }
                            echo "<option value='{$klub["id"]}'$selected>{$klub["naziv"]}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="gost_id">Gost</label>
                    <select class="form-select form-select-lg mb-3" name="gost_id">
                        <?php
                        foreach ($klubovi as $klub) {
                            $selected = "";
                            if($klub["id"] == $rezultat["gost_id"])
                            {
                                $selected = " selected";
                            }
                            echo "<option value='{$klub["id"]}'$selected>{$klub["naziv"]}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="sudac" class="form-label">Sudac:</label>
                    <input name="sudac" type="text" class="form-control" id="sudac" value="<?php echo $rezultat["sudac"] ?>">
                </div>

                <div class="mb-3">
                    <label for="stadion" class="form-label">Stadion:</label>
                    <input name="stadion" type="text" class="form-control" id="stadion" value="<?php echo $rezultat["stadion"] ?>">
                </div>

                <div class="mb-3">
                    <label for="gledatelji" class="form-label">Gledatelji:</label>
                    <input name="gledatelji" type="text" class="form-control" id="gledatelji" value="<?php echo $rezultat["gledatelji"] ?>">
                </div>
                <button type="dodaj" class="btn btn-primary">Uredi</button>
            </form>
        </div>
        <div class="col">
            Sažetak
        </div>
        <div class="col">
            Statistika
        </div>
    </div>
    <div class="my-5"></div>
</div>

<?php
####### kraj sadrzaja create-a
require_once(__DIR__ . "/../inc/footer.php");
