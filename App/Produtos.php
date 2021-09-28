<?php
namespace App;
require_once __DIR__ . "/../vendor/autoload.php";

class Produtos{
    public function produto($id=null)
    {
        $sql = "SELECT * FROM produtos";
        if ($id !== null) {
            $sql .=  " WHERE id = $id";
        }
        $resultado = mysqli_query(Conexao::conn(), $sql);
        return $resultado;
    }

}