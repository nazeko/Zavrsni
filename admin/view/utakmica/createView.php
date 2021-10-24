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
                    <h1 class="display-4">Nova utakmica</h1>
                </div>
            </div>
            <div class="my-5"></div>
            
            <?php
            if(!empty($greskaPoruka))
            {
                echo '<div class="alert alert-danger" role="alert">';
                echo  $greskaPoruka;
                echo '</div>';
            }
            ?>
            <form action="/admin/nova_utakmica.php" method="POST">
                <div class="mb-3">
                    <label for="datum">Datum:</label>
                    <input style="width:100%; margin-bottom:30px" type="date" id="start" name="datum" value="">
                </div>

                <div class="mb-3">
                    <label for="domacin_id">Domaćin</label>
                    <select class="form-select form-select-lg mb-3" name="domacin_id">
                        <?php
                        foreach ($klubovi as $klub) {
                            // var_dump($klub);
                            // die();
                            echo "<option value='{$klub["id"]}'>{$klub["naziv"]}</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="gost_id">Gost</label>
                    <select class="form-select form-select-lg mb-3" name="gost_id">
                        <?php
                        foreach ($klubovi as $klub) {
                            // var_dump($klub);
                            // die();
                            echo "<option value='{$klub["id"]}'>{$klub["naziv"]}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="sudac" class="form-label">Sudac:</label>
                    <input name="sudac" type="text" class="form-control" id="sudac">
                </div>
                
                <div class="mb-3">
                    <label for="stadion" class="form-label">Stadion:</label>
                    <input name="stadion" type="text" class="form-control" id="stadion">
                </div>

                <div class="mb-3">
                    <label for="gledatelji" class="form-label">Gledatelji:</label>
                    <input name="gledatelji" type="text" class="form-control" id="gledatelji">
                </div>

                

                <button type="dodaj" class="btn btn-primary">Dodaj</button>
            </form>
        </div>

    </div>
</div>


<?php
####### kraj sadrzaja create-a
require_once(__DIR__ . "/../inc/footer.php");
