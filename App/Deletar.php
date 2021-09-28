<?php

namespace App;
require_once __DIR__ . "/../vendor/autoload.php";
session_start();

class Deletar{
    public function delete($id)
    {
        var_dump($_GET['id']);
        exit();
        if (isset($_GET['id'])) {
            $sql = "UPDATE produtos SET ativo = '0' WHERE id = '$id'";
            if (mysqli_query(Conexao::conn(), $sql)) {
                header('Location: /Orange/produtos.php');
            } else {
                echo "Erro ao excluir";
            }
        }else{
            header('Location: /Orange/produtos.php');
        }
    }
}
$deletar = new Deletar();
$deletar->delete($_GET['id']);