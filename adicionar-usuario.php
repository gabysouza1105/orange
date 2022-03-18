<?php
$pagina = 'CSS/adicionar-usuario.css';
$title = 'Adicionar Usuário';
include_once 'top.php';
require_once __DIR__ . "/vendor/autoload.php";
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: /Orange/index.php');
}
?>

    <div class="row">
        <div class="col-md-12" id="adicionar-usuario">
            <h1>Adicionar Usuário</h1>
            <form action="App/Usuarios.php" method="post">
                <div class="col-md-6 form-floating mb-4">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <label>Email</label>
                </div>
                <div class="col-md-6 form-floating mb-4">
                    <input type="password" class="form-control" name="senha" placeholder="Senha">
                    <label>Senha</label>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-outline-primary" name ="btn-adicionar-usuario">Adicionar</button>
                </div>
            </form>
        </div>
    </div>

<?php
include_once 'bottom.php';
?>