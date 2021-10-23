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
                    <h1 class="display-4">Nova liga</h1>
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
            <form action="/admin/nova_liga.php" method="POST">
                <div class="mb-3">
                    <label for="naziv" class="form-label">Naziv</label>
                    <input name="naziv" type="text" class="form-control" id="naziv">
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input name="logo" type="text" class="form-control" id="logo">
                </div>
                <button type="dodaj" class="btn btn-primary">Dodaj</button>
            </form>
        </div>

    </div>
</div>


<?php
####### kraj sadrzaja create-a
require_once(__DIR__ . "/../inc/footer.php");
