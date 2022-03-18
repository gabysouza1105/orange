<?php
namespace App;
require_once __DIR__ . "/../vendor/autoload.php";

class Categorias{

    public function criarCategoria($categoria)
    {
        if (!isset($_SESSION['logado'])){
            header('Location: /Orange/categorias.php');
        }
        $categoria = mysqli_escape_string(Conexao::conn(), $categoria);

        $sql = "INSERT INTO categorias (nome) VALUE ('$categoria')";
        mysqli_query(Conexao::conn(), $sql);
    }

    public function display($id=null)
    {
        $sql = "SELECT * FROM categorias WHERE ativo = '1'";
        if ($id !== null) {
            $sql .=  " and id = $id";
        }
        $resultado = mysqli_query(Conexao::conn(), $sql);
        return $resultado;
    }

    public function atualizarCategoria($id)
    {
        if (!isset($_SESSION['logado'])){
            header('Location: /Orange/categorias.php');
        }
            $categoria = mysqli_escape_string(Conexao::conn(), $_POST['categoria']);

            $sql = "UPDATE categorias SET nome = '$categoria' WHERE id = '$id'";
            mysqli_query(Conexao::conn(), $sql);
            header('Location: /Orange/categorias.php');
    }

    public function deletaCategoria($id)
    {
        if (!isset($_SESSION['logado'])){
            header('Location: /Orange/categorias.php');
        }
        $sql = "UPDATE categorias SET ativo = '0' WHERE id = '$id'";
            if (mysqli_query(Conexao::conn(), $sql)) {
                header('Location: /Orange/categorias.php');
            } else {
                echo "Erro ao excluir";
            }
    }
}
$categoria = new Categorias();
if (isset($_POST['btn-adicionar-categoria'])) {
    $categoria->criarCategoria($_POST['categoria']);
}

if (isset($_POST['btn-editar-categoria'])) {
    $categoria->atualizarCategoria($_POST['id']);
}

if (isset($_POST['btn-deletar-categoria'])) {
    $categoria->deletaCategoria($_GET['id']);
}