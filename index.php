<?php
    include_once("application/templates/header.php");
?>
<div class="container ">
    <div class="row">
        <div class="col-12 text-center form-container">
            <form action="<?= $BASE_URL ?>core/services/formService.php" method="POST">
                <div class="form-group">
                    <input placeholder="Nome" type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <input placeholder="Email" type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group checkbox-div">
                    <input type="checkbox" class="btn-check" value="canal" id="checkbox-canal" name="categories[]" autocomplete="off">
                    <label for="checkbox-canal" class="btn btn-outline-danger">canal</label>

                    <input type="checkbox" class="btn-check" value="serie" id="checkbox-serie" name="categories[]" autocomplete="off">
                    <label for="checkbox-serie" class="btn btn-outline-danger">série</label>

                    <input type="checkbox" class="btn-check" value="filme" id="checkbox-filme" name="categories[]" autocomplete="off">
                    <label for="checkbox-filme" class="btn btn-outline-danger">filme</label>

                    <input type="checkbox" class="btn-check" value="novela" id="checkbox-novela" name="categories[]" autocomplete="off">
                    <label for="checkbox-novela" class="btn btn-outline-danger">novela</label>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="content" id="content" rows="3" placeholder="Conteúdo Desejado"></textarea>
                </div>
                <div class="form-group date-div">
                    <input type="date" id="date" name="date">
                </div>
                <input type="submit" class="btn btn-outline-success" value="Enviar">
            </form>
        </div>
    </div>
</div>
<?php
    include_once("application/templates/footer.php");
?>