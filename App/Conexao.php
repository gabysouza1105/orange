<?php

namespace App;

class Conexao {

    private static $conexao;

    public static function conn()
    {
        if (!isset(self::$conexao)) {
            self::$conexao = mysqli_connect('localhost', 'gabriela', '123', 'pdo');
        }

        return self::$conexao;
    }
}
