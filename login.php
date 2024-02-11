<?php
    include_once("application/templates/header.php");
?>
    <div class="container ">
    <div class="row">
        <div class="col-12 text-center form-container">
            <form action="core/services/formService.php" method="POST">
                <input type="hidden" value="login" name="type">
                <div class="form-group">
                    <input placeholder="Email" type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
                </div>
                <input type="submit" class="btn btn-outline-success" value="Login">
            </form>
        </div>
    </div>
</div>
<?php
    include_once("application/templates/close.php");
?>