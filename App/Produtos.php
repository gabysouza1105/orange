<?php
namespace App;
require_once __DIR__ . "/../vendor/autoload.php";

class Produtos{

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

    public function display($id=null)
    {
        $sql = "SELECT * FROM produtos WHERE ativo = '1'";
        if ($id !== null) {
            $sql .=  " and produtoId = '$id'";
        }
        $resultado = mysqli_query(Conexao::conn(), $sql);
        return $resultado;
    }

    public function atualizarProduto($id)
    {
        if (!isset($_SESSION['logado'])) {
            header('Location: /Orange/home.php');
        }
        $produto = mysqli_escape_string(Conexao::conn(), $_POST['produto']);
        $descricao = mysqli_escape_string(Conexao::conn(), $_POST['descricao']);
        $preco = mysqli_escape_string(Conexao::conn(), $_POST['preco']);

        $sql = "UPDATE produtos SET nome = '$produto', descricao = '$descricao', precoVenda = '$preco' WHERE id = '$id'";
        mysqli_query(Conexao::conn(), $sql);
        header('Location: /Orange/produtos.php');
    }

    public function deletaProduto($produtoId)
    {
        if (!isset($_SESSION['logado'])){
            header('Location: /Orange/categorias.php');
        }
        $sql = "UPDATE produtos SET ativo = '0' WHERE produtoId = '$produtoId'";
        if (mysqli_query(Conexao::conn(), $sql)) {
            header('Location: /Orange/produtos.php');
        } else {
            echo "Erro ao excluir";
        }
    }

}
$produto = new Produtos();
if (isset($_POST['btn-adicionar-produto'])) {
    $produto->criarProduto($_POST['produto'], $_POST['descricao'], $_POST['preco']);
}

if (isset($_POST['btn-deletar-produto'])) {
    $produto->deletaProduto($_POST['id']);
}

if (isset($_POST['btn-editar-produto'])) {
    $produto->atualizarProduto($_POST['produtoId']);
}