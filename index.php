<?php
    include_once("application/templates/header.php");

    // echo "<pre>";
    // var_dump($_SERVER);
    // echo "</pre>";
?>
<div class="container ">
    <div class="row">
        <div class="col-12 text-center form-container">
            <form action="core/services/formService.php" method="POST">
                <input type="hidden" value="order" name="type">
                <div class="form-group">
                    <input placeholder="Nome" type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <input placeholder="Email" type="email" class="form-control" id="email" name="email" required>
                </div>
                <div id="checkbox-div" class="form-group checkbox-div d-flex justify-content-center">
                    <input type="radio" class="btn-check" value="canal" id="checkbox-canal" name="category" autocomplete="off">
                    <label for="checkbox-canal" class="btn btn-outline-danger checkbox-label">Canal</label>

                    <input type="radio" class="btn-check" value="serie" id="checkbox-serie" name="category" autocomplete="off">
                    <label for="checkbox-serie" class="btn btn-outline-danger checkbox-label">Série</label>

                    <input type="radio" class="btn-check" value="filme" id="checkbox-filme" name="category" autocomplete="off">
                    <label for="checkbox-filme" class="btn btn-outline-danger checkbox-label">Filme</label>

                    <input type="radio" class="btn-check" value="novela" id="checkbox-novela" name="category" autocomplete="off">
                    <label for="checkbox-novela" class="btn btn-outline-danger checkbox-label">Novela</label>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="content" id="content" rows="6" placeholder="Conteúdo Desejado" required></textarea>
                </div>
                <div class="form-group date-div">
                    <input type="date" id="date" name="date" required>
                </div>
                <input type="submit" class="btn btn-outline-success" value="Enviar">
            </form>
        </div>
    </div>
</div>
<?php
    include_once("application/templates/footer.php");
?>