<?php

namespace App;
require_once __DIR__ . "/../vendor/autoload.php";

class Usuarios
{
    public function criarUsuario($email, $senha)
    {
        if (!isset($_SESSION['logado'])) {
            header('Location: /Orange/usuarios.php');
        }
        $email = mysqli_escape_string(Conexao::conn(), $email);
        $senha = mysqli_escape_string(Conexao::conn(), $senha);

        $sql = "INSERT INTO usuarios (email, senha, ativo, admin) VALUES ('$email', '$senha', '1', '0')";
        mysqli_query(Conexao::conn(), $sql);
    }

    public function display($id = null)
    {
        $sql = "SELECT * FROM usuarios WHERE ativo = '1'";
        if ($id !== null) {
            $sql .= " and id = $id";
        }
        $resultado = mysqli_query(Conexao::conn(), $sql);
        return $resultado;
    }

    public function atualizarUsuario($id)
    {
        if (!isset($_SESSION['logado'])) {
            header('Location: /Orange/categorias.php');
        }
        $email = mysqli_escape_string(Conexao::conn(), $_POST['email']);
        $senha = mysqli_escape_string(Conexao::conn(), $_POST['senha']);

        $sql = "UPDATE usuarios SET email = '$email', senha = MD5('$senha') WHERE id = '$id'";
        mysqli_query(Conexao::conn(), $sql);
        header('Location: /Orange/usuarios.php');
    }


    public
    function deletaUsuario($id)
    {
        if (!isset($_SESSION['logado'])){
            header('Location: /Orange/categorias.php');
        }
        $sql = "UPDATE usuarios SET ativo = '0' WHERE id = '$id'";
        if (mysqli_query(Conexao::conn(), $sql)) {
            header('Location: /Orange/usuarios.php');
        } else {
            echo "Erro ao excluir";
        }
    }
}

$usuario = new Usuarios();
if (isset($_POST['btn-adicionar-usuario'])) {
    $usuario->criarUsuario($_POST['email'], $_POST['senha']);
}

if (isset($_POST['btn-editar-usuario'])) {
    $usuario->atualizarUsuario($_GET['id']);
}

if (isset($_POST['btn-deletar-usuario'])) {
    $usuario->deletaUsuario($_POST['id']);
}
