<?php
namespace App;
require_once __DIR__ . "/../vendor/autoload.php";

class Adicionar{
    public function criarProduto($produto, $descricao, $preco)
    {
        if (!isset($_SESSION['logado'])){
            header('Location: /Orange/produtos.php');
        }
            $produto = mysqli_escape_string(Conexao::conn(), $produto);
            $descricao = mysqli_escape_string(Conexao::conn(), $descricao);
            $preco = mysqli_escape_string(Conexao::conn(), $preco);

            $sql = "INSERT INTO produtos (nome, descricao, precoVenda, ativo) VALUES ('$produto', '$descricao', '$preco', '1')";
            mysqli_query(Conexao::conn(), $sql);
    }

    public function criarCategoria($categoria)
    {
        if (!isset($_SESSION['logado'])){
            header('Location: /Orange/categorias.php');
        }
            $categoria = mysqli_escape_string(Conexao::conn(), $categoria);

            $sql = "INSERT INTO categorias (nome) VALUE ('$categoria')";
            mysqli_query(Conexao::conn(), $sql);
    }
}

$adicionar = new Adicionar();
if (isset($_POST['btn-adicionar-produto'])) {
    $adicionar->criarProduto($_POST['produto'], $_POST['descricao'], $_POST['preco']);
}
if (isset($_POST['btn-adicionar-categoria'])) {
    $adicionar->criarCategoria($_POST['categoria']);
}