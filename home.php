<?php
$pagina = 'CSS/home.css';
$title = 'Pagina inicial';
include_once 'top.php';
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: /Orange/index.php');
}
?>

<div class="row">
    <div class="col-md-3" id="menu">
        <div>
            <h1>Orange</h1>
        </div>
        <div class="d-grid gap-2">
            <a href="home.php" role="button" class="btn btn-dark">Home</a>
            <a href="produtos.php" role="button" class="btn btn-dark">Produtos</a>
            <a href="categorias.php" role="button" class="btn btn-dark">Categorias</a>
        </div>
    </div>
    <div class="col-md-9" id="corpo">
    </div>
</div>

<?php
include_once 'bottom.php';
?>
