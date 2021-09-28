<?php
namespace App;
require_once __DIR__ . "/../vendor/autoload.php";

class Categorias{
    public function categoria($id=null)
    {
        $sql = "SELECT * FROM categorias";
        if ($id !== null) {
            $sql .=  " WHERE id = $id";
        }
        $resultado = mysqli_query(Conexao::conn(), $sql);
        return $resultado;
    }

}
