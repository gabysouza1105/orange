<?php
namespace App;
require_once __DIR__ . "/../vendor/autoload.php";
session_start();
class Editar{
    public function atualizar($id)
    {

        if (!isset($_SESSION['logado'])){
            header('Location: /Orange/home.php');
        }
        if (isset($_POST['btn-editar-produto'])) {

            $produto = mysqli_escape_string(Conexao::conn(), $_POST['produto']);
            $descricao = mysqli_escape_string(Conexao::conn(), $_POST['descricao']);
            $preco = mysqli_escape_string(Conexao::conn(), $_POST['preco']);

            $sql = "UPDATE produtos SET nome = '$produto', descricao = '$descricao', precoVenda = '$preco' WHERE id = '$id'";
            mysqli_query(Conexao::conn(), $sql);
            header('Location: /Orange/produtos.php');
        }

        if (isset($_POST['btn-editar-categoria'])) {

            $categoria = mysqli_escape_string(Conexao::conn(), $_POST['categoria']);

            $sql = "UPDATE categorias SET nome = '$categoria' WHERE id = '$id'";
            mysqli_query(Conexao::conn(), $sql);
            header('Location: /Orange/categorias.php');
        }
    }
}

$editar = new Editar();
$editar->atualizar($_POST['id']);
