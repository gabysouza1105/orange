<?php
$pagina = 'CSS/adicionar-produto.css';
$title = 'Pagina inicial';
include_once 'top.php';
require_once __DIR__ . "/vendor/autoload.php";
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: /Orange/index.php');
}
?>

<div class="row">
    <div class="col-md-12" id="adicionar-produto">
        <h1>Adicionar Produto</h1>
        <form action="App/Adicionar.php" method="post">
            <div class="col-md-6 form-floating mb-4">
                <input type="text" class="form-control" name="produto" placeholder="Produto">
                <label>Produto</label>
            </div>
            <div class="col-md-6 form-floating mb-4">
                <input type="text" class="form-control" name="descricao" placeholder="Descrição">
                <label>Descrição</label>
            </div>
            <div class="col-md-6 form-floating mb-4">
                <input type="text" class="form-control" name="preco" placeholder="Preço">
                <label>Preço</label>
            </div>
            <div class="col-md-6">
                <button class="btn btn-outline-primary" name ="btn-adicionar-produto">Adicionar</button>
            </div>
        </form>
    </div>
</div>