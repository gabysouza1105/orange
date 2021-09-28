<?php

namespace App;
require_once __DIR__ . "/../vendor/autoload.php";

class Cadastrar
{

    public function cadastro($nome, $telefone, $endereco, $profissao,$site, $email, $senha)
    {
        if (isset($_POST['btn-cadastrar'])) {
            if (!empty($nome) && !empty($telefone) && !empty($endereco) && !empty($email) && !empty($senha)) {

                $nome1 = mysqli_escape_string(Conexao::conn(), $nome);
                $nome = htmlspecialchars($nome1, ENT_QUOTES, 'UTF-8');

                $telefone1 = mysqli_escape_string(Conexao::conn(), $telefone);
                $telefone = htmlspecialchars($telefone1, ENT_QUOTES, 'UTF-8');

                $endereco1 = mysqli_escape_string(Conexao::conn(), $endereco);
                $endereco = htmlspecialchars($endereco1, ENT_QUOTES, 'UTF-8');

                $profissao1 = mysqli_escape_string(Conexao::conn(), $profissao);
                $profissao = htmlspecialchars($profissao1, ENT_QUOTES, 'UTF-8');

                $site1 = mysqli_escape_string(Conexao::conn(), $site);
                $site = htmlspecialchars($site1, ENT_QUOTES, 'UTF-8');

                $email1 = mysqli_escape_string(Conexao::conn(), $email);
                $email = htmlspecialchars($email1, ENT_QUOTES, 'UTF-8');

                $senha1 = mysqli_escape_string(Conexao::conn(), $senha);
                $senha = htmlspecialchars($senha1, ENT_QUOTES, 'UTF-8');

                $sql = "INSERT INTO usuarios (nome, sobrenome, idade, telefone, email, senha) VALUE('$nome', '$sobrenome', '$idade', '$telefone', '$email', MD5('$senha'))";
                if (mysqli_query(Conexao::conn(), $sql)){
                    header('Location: /Orange/index.php');
                }else{
                    echo "Erro ao cadastrar";
                }

            } else {
                echo 'Todos os campos devem ser preenchidos.';
            }
        }
    }
}
$cadastro = new Cadastrar();
$cadastro->cadastro($_POST['nome'], $_POST['telefone'], $_POST['endereco'], $_POST['profissao'], $_POST['site'], $_POST['email'], $_POST['senha']);