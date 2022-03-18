<?php
$pagina = 'CSS/adicionar-categoria.css';
$title = 'Pagina inicial';
include_once 'top.php';
require_once __DIR__ . "/vendor/autoload.php";
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: /Orange/index.php');
}
?>

<div class="row">
    <div class="col-md-12" id="adicionar-categoria">
        <h1>Adicionar Categoria</h1>
        <form action="App/Categorias.php" method="post">
            <div class="col-md-6 form-floating mb-4">
                <input type="text" class="form-control" name="categoria" placeholder="Categoria">
                <label>Categoria</label>
            </div>
            <div class="col-md-6">
                <button class="btn btn-outline-primary" name ="btn-adicionar-categoria">Adicionar</button>
            </div>
        </form>
    </div>
</div>

<?php
include_once 'bottom.php';
?>