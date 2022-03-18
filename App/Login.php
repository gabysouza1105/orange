<?php

namespace App;
require_once __DIR__ . "/../vendor/autoload.php";
session_start();

class Login
{
    public function logar($email, $senha)
    {
        if (isset($_POST['btn-entrar'])) {
            if (!empty($email) && !empty($senha)) {
                $email1 = mysqli_escape_string(Conexao::conn(), $email);
                $email = htmlspecialchars($email1);

                $senha1 = mysqli_escape_string(Conexao::conn(), $senha);
                $senha = htmlspecialchars($senha1);

                $sql = "SELECT id FROM usuarios WHERE email = '$email' and senha = MD5('$senha')";
                $resultado = mysqli_query(Conexao::conn(), $sql);
                $dados = mysqli_fetch_array($resultado);

                if (!empty($dados)) {
                    $_SESSION['logado'] = true;
                    header('Location: /Orange/home.php');
                } else {
                    echo 'Dados inválidos';
                }
            } else {
                echo 'Os campos devem ser preenchidos.';
            }
        }else{
            header('Location: /Orange/index.php');
        }
    }
}

$login = new Login();
$login->logar($_POST['email'], $_POST['senha']);