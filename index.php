<?php
$title = 'Login';
$pagina = 'CSS/index.css';
include_once 'top.php';
?>

    <div class="row" id="inicial">
        <div id="lateral" class="col-md-7">
            <h1>Orange</h1>
            <p>Bem vindo</p>
        </div>
        <div id="login" class="col-md-3">
            <form action="App/Login.php" method="post">
                <div class="form-floating mb-4">
                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
                    <label for="floatingEmail">Email</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Senha">
                    <label for="floatingPassword">Senha</label>
                </div>
                <button class="btn btn-success" name="btn-entrar">Entrar</button>
            </form>
        </div>
    </div>

<?php
include_once 'bottom.php';
?>